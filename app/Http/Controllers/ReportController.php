<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Apps_mst_branchs;
use App\Trc_mst_drivers;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\RptScheduleExport;

class ReportController extends Controller
{
    public function index() {
        if(session('usercabang') != "01") {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->where('branch_id',session('usercabang'))->get();
        } else {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
        }
        return view('report.rpt_schedule',compact('branchs'));
    }

    public function rptschedulelist(Request $request) {
        $datas = DB::table('trc_trn_schedule_hdrs as h')
        ->select('h.sched_id','d.line','d.si_id','d.buss_unit','c.cust_name','d.pickup_name','d.dest_name','s.drv_name','v.vhc_plat_no',
        't.receivejob_time','t.outgarasi_time','t.arrivedepo_time','t.outdepo_time','t.arrivepickup_time','t.loadpickup_time',
        't.outpickup_time','t.arriveunload_time','t.unload_time','t.outunload_time','t.close_time')
        ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id')
        ->join('trc_trn_schedule_tracks as t', function($join) {
            $join->on('d.sched_id','=','t.sched_id')->on('d.line','=','t.line');
        })
        ->join('ord_mst_customers as c', 'd.cust_id','=','c.cust_id')
        ->join('trc_mst_drivers as s','d.drv_id','=','s.drv_id')
        ->join('trc_mst_vehicles as v','d.vhc_id','=','v.vhc_id')
        ->where('h.sched_date','>=',$request->from)
        ->where('h.sched_date','<=',$request->to)
        ->where('h.branch_id','=',$request->branch_id)
        ->where(DB::raw('IFNULL(d.assign_driver,\'N\')'), '=', 'Y')
        ->where('d.status','CL') 
        ->get()->toArray();

        $html = '<div class="row">
          <div class="card"> 
            <div class="card-body  table-responsive" style="height:450px;">
              <table class="table table-bordered table-striped text-nowrap">
                <thead>
                  <tr>
                    <th>SchedID</th>
                    <th>SI No</th>
                    <th>Job</th>
                    <th>Customer</th>
                    <th>Muat</th>
                    <th>Bongkar</th>
                    <th>Sopir</th>
                    <th>Plat</th>
                    <th>Terima Job</th>
                    <th>Keluar Garasi</th>
                    <th>Tiba Depo</th>
                    <th>Keluar Depo</th>
                    <th>Tiba Muat</th>
                    <th>Proses Muat</th>
                    <th>Keluar Muat</th>
                    <th>Tiba Bongkar</th>
                    <th>Proses Bongkar</th>
                    <th>Keluar Bongkar</th>
                    <th>Selesai</th>
                  </tr>
                </thead>
                <tbody>';
            
                foreach($datas as $p) {
                    $html .= '<tr>
                        <td>'.$p->sched_id.'</td>
                        <td>'.$p->si_id.'</td>
                        <td>'.$p->buss_unit.'</td>
                        <td>'.$p->cust_name.'</td>
                        <td>'.$p->pickup_name.'</td>
                        <td>'.$p->dest_name.'</td>
                        <td>'.$p->drv_name.'</td>
                        <td>'.$p->vhc_plat_no.'</td> 
                        <td>'.$p->receivejob_time.'</td> 
                        <td>'.$p->outgarasi_time.'</td> 
                        <td>'.$p->arrivedepo_time.'</td> 
                        <td>'.$p->outdepo_time.'</td> 
                        <td>'.$p->arrivepickup_time.'</td> 
                        <td>'.$p->loadpickup_time.'</td> 
                        <td>'.$p->outpickup_time.'</td> 
                        <td>'.$p->arriveunload_time.'</td> 
                        <td>'.$p->unload_time.'</td> 
                        <td>'.$p->outunload_time.'</td> 
                        <td>'.$p->close_time.'</td>  
                    </tr>';
                }
        $html .= '</tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>';     
        return $html;
	}
	
	public function rptscheduleexcel(Request $request) {
		return Excel::download(new RptScheduleExport($request->from, $request->to, $request->branch_id), 'Schedule.xlsx');
  }
  
  public function formritase() {
    if(session('usercabang') != "01") {
        $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->where('branch_id',session('usercabang'))->get();
    } else {
        $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
    }

    if(session('usercabang') != "01") {
        $drivers = DB::table('trc_mst_drivers as d')
        ->select('d.drv_id','d.drv_name','b.branch_name')
        ->join('trc_mst_driver_branchs as db','d.drv_id','=','db.drv_id') 
        ->join('apps_mst_branchs as b','db.branch_id','=','b.branch_id')
        ->where('d.active','Y')
        ->where('db.branch_id',session('usercabang'))
        ->get();
    } else {
        $drivers = DB::table('trc_mst_drivers as d')
        ->select('d.drv_id','d.drv_name','b.branch_name')
        ->join('trc_mst_driver_branchs as db','d.drv_id','=','db.drv_id') 
        ->join('apps_mst_branchs as b','db.branch_id','=','b.branch_id')
        ->where('d.active','Y') 
        ->get();
    }
    return view('report.rpt_ritase',compact('branchs','drivers'));
  }

  public function rptritaselist(Request $request) {
    $data = DB::table('trc_trn_schedule_hdrs as h')
    ->select('h.sched_id','h.sched_date','d.si_id','drv.drv_name','v.vhc_plat_no', 'd.pickup_name', 'd.dest_name', 'd.status')
    ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id') 
    ->join('trc_mst_drivers as drv','d.drv_id','=','drv.drv_id')
    ->join('trc_mst_vehicles as v','d.vhc_id','=','v.vhc_id')
    ->where('h.sched_date','>=',$request->from)
    ->where('h.sched_date','<=',$request->to)
    ->where('h.branch_id',$request->branch_id)
    ->where('d.drv_id',$request->drv_id)
    ->get();

    $html = '<div class="row">
      <div class="card"> 
        <div class="card-body  table-responsive" style="height:450px;">
          <table class="table table-bordered table-striped text-nowrap">
            <thead>
              <tr>
                <th>No</th>
                <th>SchedID</th>
                <th>Tanggal</th>
                <th>SI No</th>
                <th>Sopir</th>
                <th>Plat No</th>
                <th>Muat</th>
                <th>Bongkar</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>';
            $no = 1;
            foreach($data as $p) {
              $html .= '<tr>
                <td align="center">'.$no.'</td>          
                <td>'.$p->sched_id.'</td>
                <td>'.$p->sched_date.'</td>
                <td>'.$p->si_id.'</td>
                <td>'.$p->drv_name.'</td>
                <td>'.$p->vhc_plat_no.'</td>
                <td>'.$p->pickup_name.'</td>
                <td>'.$p->dest_name.'</td>
                <td>'.$p->status.'</td>
              </tr>';
              $no++;
            }
        $html .= '</tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card --> 
        </div>';     
        return $html;
  }
}
