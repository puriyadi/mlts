<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use App\Apps_mst_branchs;
use App\Ord_mst_containers;
use App\Ord_mst_customers;
use App\Trc_mst_drivers;
use App\Trc_mst_vehicles;
use App\Trc_trn_schedule_hdrs;
use App\Trc_trn_schedule_dtls;
use App\Trc_trn_order_status;
use Carbon\Carbon;

class ScheduleController extends Controller
{
    public function index() {
        return view('schedule.index');
    }

    public function add() {
        if(session('usercabang') != "01") {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->where('branch_id',session('usercabang'))->get();
            
            $drivers = DB::table('trc_mst_drivers as d')
            ->join('apps_mst_empl_branchs as e','d.empl_id','=','e.empl_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();
            
            $vehicles = DB::table('trc_mst_vehicles as d')
            ->join('trc_mst_vehicle_branchs as e','d.vhc_id','=','e.vhc_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();

            $containers = Ord_mst_containers::select('cont_id', 'cont_name')->where('active','=','Y')->get();
    
        } else {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
            $drivers = Trc_mst_drivers::select('drv_id', 'drv_name')->where('active','=','Y')->get();
            $vehicles = Trc_mst_vehicles::select('vhc_id', 'vhc_plat_no')->where('active','=','Y')->get();
            $containers = Ord_mst_containers::select('cont_id', 'cont_name')->where('active','=','Y')->get();    
        }
        //$customers = Ord_mst_customers::select('cust_id','cust_name')->where('active','=','Y')->get();
        return view('schedule.add',compact('branchs','drivers','vehicles','containers'));
    }

    public function store(Request $request) {
        $check = Trc_trn_schedule_hdrs::where("sched_id",$request->sched_id)->first();
        if($check) {
            try {
                $hdr = Trc_trn_schedule_hdrs::where("sched_id", $request->sched_id)
                ->update([
                    "sched_date" => $request->sched_date,
                    "branch_id" => $request->branch_id,
                    "update_by" => auth()->user()->username
                ]);
            } catch (Exception $e) {
                return "Err Upd ScheduleHdr => ".$e->getMessage();
            }
        } else {
            try {
                $hdr = new Trc_trn_schedule_hdrs;
                $hdr->sched_id = $request->sched_id;
                $hdr->sched_date = $request->sched_date;
                $hdr->branch_id = $request->branch_id;
                $hdr->create_by = auth()->user()->username;
                $hdr->save();

            } catch (Exception $e) {
                return "Err Ins ScheduleHdr => ".$e->getMessage();
            }
        }

        if($hdr) {
            try {
                $max = DB::table('trc_trn_schedule_dtls')->where("sched_id", $request->sched_id)->max("line");
                if($max == "" || $max == NULL) {
                    $max = 1;
                } else {
                    $max = $max + 1;
                }
                $data = new Trc_trn_schedule_dtls;
                $data->sched_id = $request->sched_id;
                $data->line = $max;
                $data->si_id = $request->si_id;
                $data->buss_unit = $request->buss_unit;
                $data->depo = $request->depo;
                $data->pickup_name = $request->pickup_name;
                $data->latitude_pickup = $request->latitude_muat;
                $data->longitude_pickup = $request->longitude_muat;
                $data->pickup_contact = $request->pickup_contact;
                $data->pickup_address = $request->pickup_address;
                $data->dest_name = $request->dest_name;
                $data->dest_contact = $request->dest_contact;
                $data->dest_address = $request->dest_address;
                $data->latitude_dest = $request->latitude_bongkar;
                $data->longitude_dest = $request->longitude_bongkar;
                $data->cust_id = $request->cust_id;
                $data->cust_address = $request->cust_address;                 
                $data->cont_id = $request->cont_id;
                $data->cont_no = $request->cont_no;
                $data->seal_no = $request->seal_no;
                $data->padlock = $request->padlock;
                $data->drv_id = $request->drv_id;
                $data->vhc_id = $request->vhc_id;
                $data->amount = $request->amount;
                $data->status = "OP";
                $data->create_by = auth()->user()->username;
                $data->save();

                $stt = new Trc_trn_order_status;
                $stt->sched_id = $request->sched_id;
                $stt->line = $max;
                $stt->si_id = $request->si_id;
                $stt->is_public = 'N';
                $stt->jobtime = Carbon::now();
                $stt->description = "Schedule Order sudah dibuat";
                $stt->create_by = auth()->user()->username;
                $stt->save();

                if($data) {
                    return "Save"; 
                } else {
                    return "Failed Save";
                }
            } catch (Exception $e) {
                return "Error => ".$e->getMessage();
            }
        }
    }

    public function dataschedule() {
        $data = Trc_trn_schedule_hdrs::select('*');
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<a href="/schedule/'.$data->sched_id.'/edit"><button class="btn btn-info btn-sm"><i class="fa fa-edit"></i></button></a>
            <button value="'.$data->sched_id.'" onclick="deleteschedule(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data = Trc_trn_schedule_hdrs::select('*')->where("sched_id", $id)->get();
        if(session('usercabang') != "01") {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->where('branch_id',session('usercabang'))->get();
            
            $drivers = DB::table('trc_mst_drivers as d')
            ->join('apps_mst_empl_branchs as e','d.empl_id','=','e.empl_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();
            
            $vehicles = DB::table('trc_mst_vehicles as d')
            ->join('trc_mst_vehicle_branchs as e','d.vhc_id','=','e.vhc_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();

            $containers = Ord_mst_containers::select('cont_id', 'cont_name')->where('active','=','Y')->get();
    
        } else {
            $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
            $drivers = Trc_mst_drivers::select('drv_id', 'drv_name')->where('active','=','Y')->get();
            $vehicles = Trc_mst_vehicles::select('vhc_id', 'vhc_plat_no')->where('active','=','Y')->get();
            $containers = Ord_mst_containers::select('cont_id', 'cont_name')->where('active','=','Y')->get();    
        } 
        return view('schedule.edit',compact('data','branchs','drivers','vehicles','containers'));
    }

    public function silist($id) {
        $data = DB::table('trc_trn_schedule_dtls AS a')
        ->join('ord_mst_customers AS c','a.cust_id','=','c.cust_id')
        ->join('trc_mst_drivers AS d','a.drv_id','=','d.drv_id')
        ->join('trc_mst_vehicles AS v','a.vhc_id','=','v.vhc_id')
        ->select('a.*','c.cust_name','v.vhc_plat_no','d.drv_name')
        ->where('a.sched_id','=',$id)
        ->get();

        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->sched_id.'||'.$data->line.'" onclick="editschedulesi(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->sched_id.'||'.$data->line.'||'.$data->si_id.'" onclick="deleteschedulesi(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function editschedulesi($id) {
        $arr = explode("||", $id);
        $data = DB::table('trc_trn_schedule_dtls')
        ->select('*')
        ->where('sched_id','=', $arr[0])
        ->where('line','=', $arr[1])
        ->get()->toArray();
        return $data; 
    }

    public function updateschedulesi(Request $request) {
        try {
            $data = Trc_trn_schedule_dtls::where("sched_id", $request->sched_id)
            ->where("line", $request->line)
            ->update([
                "si_id" => $request->si_id,
                "buss_unit" => $request->buss_unit,
                "depo" => $request->depo,
                "pickup_name" => $request->pickup_name,
                "pickup_contact" => $request->pickup_contact,
                "latitude_pickup" => $request->latitude_muat,
                "longitude_pickup" => $request->longitude_muat,
                "pickup_address" => $request->pickup_address,
                "dest_name" => $request->dest_name,
                "dest_contact" => $request->dest_contact,
                "latitude_dest" => $request->latitude_bongkar,
                "longitude_dest" => $request->longitude_bongkar,
                "dest_address" => $request->dest_address,
                "cust_id" => $request->cust_id,
                "cust_address" => $request->cust_address,
                "cont_id" => $request->cont_id,
                "cont_no" => $request->cont_no,
                "seal_no" => $request->seal_no,
                "padlock" => $request->padlock,
                "drv_id" => $request->drv_id,
                "vhc_id" => $request->vhc_id,
                "amount" => $request->amount,
                "update_by" => auth()->user()->username 
            ]);

            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            }    
        } catch (Exception $e) {
            return "Err => ".$e->getMessage();
        }
    }
    
    public function deleteschedulesi(Request $request) {
        $data = Trc_trn_schedule_dtls::where('sched_id', $request->id)->where('line', $request->line)->delete();
        if($data) {
            return "Success";
        } else {
            return "Failed Deleted";
        }
    }

    public function destroy(Request $request) {
        $data = Trc_trn_schedule_dtls::where('sched_id', $request->id)->delete();
        $data = Trc_trn_schedule_hdrs::where('sched_id', $request->id)->delete();
        
        if($data) {
            return "Success";
        } else {
            return "Failed Deleted";
        }
    }

    public function assign() {
        $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
        return view('assign.index', compact('branchs'));
    }

    public function assigndriver(Request $request) {
        $datas = DB::table('trc_trn_schedule_hdrs as h')
        ->select('h.sched_id','d.line','d.si_id','d.buss_unit','c.cust_name','d.pickup_name','d.dest_name','s.drv_name','v.vhc_plat_no')
        ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id')
        ->join('ord_mst_customers as c', 'd.cust_id','=','c.cust_id')
        ->join('trc_mst_drivers as s', 'd.drv_id','=','s.drv_id')
        ->join('trc_mst_vehicles as v', 'd.vhc_id', '=','v.vhc_id')
        ->where('h.sched_date','=',$request->sched_date)
        ->where('h.branch_id','=',$request->branch_id)
        ->where(DB::raw('IFNULL(d.assign_driver,\'N\')'), '=', 'N') 
        ->get()->toArray();

        $html = '<div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
                <h3 class="card-title">List Schedule Tanggal "'.$request->sched_date.'"</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0" style="height:350px;">
              <table class="table table-head-fixed text-nowrap">
                <thead>
                  <tr>
                    <th width="3"><input type="checkbox" onclick="checkall(this)" ></th>
                    <th>SchedID</th>
                    <th>SI No</th>
                    <th>Unit</th>
                    <th>Customer</th>
                    <th>Muat</th>
                    <th>Bongkar</th>
                    <th>Sopir</th>
                    <th>Kendaraan</th>
                  </tr>
                </thead>
                <tbody>';
            
                foreach($datas as $p) {
                    $html .= '<tr>
                        <td><input type="checkbox" name="assign[]" value='.$p->sched_id.'||'.$p->line.'||'.$p->si_id.'></td>
                        <td>'.$p->sched_id.'</td>
                        <td>'.$p->si_id.'</td>
                        <td>'.$p->buss_unit.'</td>
                        <td>'.$p->cust_name.'</td>
                        <td>'.$p->pickup_name.'</td>
                        <td>'.$p->dest_name.'</td>
                        <td>'.$p->drv_name.'</td>
                        <td>'.$p->vhc_plat_no.'</td> 
                    </tr>';
                }
        $html .= '</tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        </div>';     
        return $html;
    }

    public function assignsubmit(Request $request) {
        try {
            $result = "False";
            //$hasil = "";
            $arr = explode(",", $request->id);            
            foreach ($arr as $v) {
                $val = explode("||",$v);
                //$hasil = $hasil.$val[0]."=".$val[1]."<br>";
                
                $data = Trc_trn_schedule_dtls::where("sched_id",$val[0])->where("line",$val[1]) 
                ->update([
                    'assign_driver' => 'Y',
                    'status' => 'AS',
                    'update_by' => auth()->user()->username
                ]);

                $stt = new Trc_trn_order_status;
                $stt->sched_id = $request->sched_id;
                $stt->line = $max;
                $stt->si_id = $val[2];
                $stt->is_public = 'N';
                $stt->jobtime = Carbon::now();
                $stt->description = "Job Order Sudah Diassign ke Sopir utk dijalankan";
                $stt->create_by = auth()->user()->username;
                $stt->save();

                if($data) {
                    $result = "True";
                } else {
                    $result = "False";
                    break;
                }
            }
            //return $hasil;
            
            if($result == "True") {
                return "Save"; 
            } else {
                return "Failed Save";
            } 
            
        } catch (Exception $e) {
            return "Err => ".$e.getMessage();
        }
    }

    public function changedriver() {
        if(session('usercabang') != "01") { 
            $drivers = DB::table('trc_mst_drivers as d')
            ->join('apps_mst_empl_branchs as e','d.empl_id','=','e.empl_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();   
            $vehicles = DB::table('trc_mst_vehicles as d')
            ->join('trc_mst_vehicle_branchs as e','d.vhc_id','=','e.vhc_id')
            ->select('d.*')->where('e.branch_id','=',session('usercabang'))->where('d.active','=','Y')->get();
        } else { 
            $drivers = Trc_mst_drivers::select('drv_id', 'drv_name')->where('active','=','Y')->get();
            $vehicles = Trc_mst_vehicles::select('vhc_id', 'vhc_plat_no')->where('active','=','Y')->get(); 
        }

        return view('assign.change_driver_list', compact('drivers','vehicles'));        
    }

    public function changedriveredit($id) {
        $arr = explode("||", $id);

        $data = DB::table('trc_trn_schedule_hdrs as h')
        ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id')
        ->select('h.sched_date','h.branch_id','d.*')
        ->where('d.sched_id','=', $arr[0])
        ->where('d.line','=', $arr[1])
        ->get()->toArray();
        return $data;
    }

    public function changedriverlist() {
        if(session('usercabang')!="01") {
            $data = DB::table('trc_trn_schedule_hdrs as h')
            ->select('h.sched_id','h.sched_date','d.line','d.si_id','d.buss_unit','d.pickup_name','d.dest_name','s.drv_name','v.vhc_plat_no')
            ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id')
            ->leftjoin('trc_mst_drivers as s', 'd.drv_id','=','s.drv_id')
            ->leftjoin('trc_mst_vehicles as v', 'd.vhc_id', '=','v.vhc_id')
            ->where(DB::raw('IFNULL(d.assign_driver,\'N\')'), '=', 'N') 
            ->where('status','=','OP')
            //->where('d.drv_id','=','')
            ->get()->toArray();
        } else {
            $data = DB::table('trc_trn_schedule_hdrs as h')
            ->select('h.sched_id','h.sched_date','d.line','d.si_id','d.buss_unit','d.pickup_name','d.dest_name','s.drv_name','v.vhc_plat_no')
            ->join('trc_trn_schedule_dtls as d','h.sched_id','=','d.sched_id')
            ->leftjoin('trc_mst_drivers as s', 'd.drv_id','=','s.drv_id')
            ->leftjoin('trc_mst_vehicles as v', 'd.vhc_id', '=','v.vhc_id')
            ->where('h.branch_id','=',session('usercabang'))
            ->where(DB::raw('IFNULL(d.assign_driver,\'N\')'), '=', 'N') 
            ->where('status','=','OP')
            //->where('d.drv_id','=','')
            ->get()->toArray();
        }

        return  DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->sched_id.'||'.$data->line.'" onclick="formchangedriver(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>';
        })->make(true);
    }

    public function changedriversubmit(Request $request) {
        $data = Trc_trn_schedule_dtls::where('sched_id',$request->sched_id)->where('line',$request->line)
        ->update([
            'drv_id' => $request->drv_id,
            'vhc_id' => $request->vhc_id,
            'assign_driver' => 'Y',
            'status' => 'AS',
            'amount' => $request->amount,
            'update_by' => auth()->user()->username,
        ]);

        if($data) {
            $stt = new Trc_trn_order_status;
            $stt->sched_id = $request->sched_id;
            $stt->line = $request->line;
            $stt->si_id = $request->si_id;
            $stt->is_public = 'N';
            $stt->jobtime = Carbon::now();
            $stt->description = "Job Order Sudah Diassign ke Sopir utk dijalankan";
            $stt->create_by = auth()->user()->username;
            $stt->save();

            return "Save";
        } else {
            return "Failed Save";
        }
    }
}
