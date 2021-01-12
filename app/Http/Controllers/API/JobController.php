<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trc_trn_schedule_hdrs;
use App\Trc_trn_schedule_dtls;
use App\Trc_trn_schedule_tracks;
use App\Trc_trn_driver_hist_jobs;
use DB;
use Auth;
use App\Trc_trn_order_status;
use Carbon\Carbon;

class JobController extends Controller
{
    public function receivejob(Request $request) {
        /*
        $data = Trc_trn_schedule_dtls::select('*')
        ->where("drv_id", $request->drv_id)
        ->where("assign_driver","Y")
        ->whereRaw(DB::raw("ifnull(receive_assign,'N') = 'N' "))
        ->get(); 
        */
        $curdate = date("Y-m-d");
        $data = DB::select('SELECT d.sched_id, d.line, d.si_id, d.buss_unit, d.depo, c.cust_name,
        d.cust_address, c.cust_phone1, c.cust_handphone1, c.cust_pic,
        d.pickup_name, d.pickup_contact, d.pickup_address, 
        d.dest_name, d.dest_contact, d.dest_address, 
        d.cont_id, d.cont_no, d.padlock, d.seal_no, s.drv_name, v.vhc_plat_no 
        FROM trc_trn_schedule_dtls d, ord_mst_customers c, trc_mst_drivers s, trc_mst_vehicles v
        WHERE d.cust_id = c.cust_id and d.drv_id = s.drv_id and d.vhc_id = v.vhc_id
        and s.empl_id = "'.$request->empl_id.'" 
        and d.assign_driver = "'.'Y'.'" AND IFNULL(d.receive_assign,"'.'N'.'") = "'.'N'.'"
        and d.status = "'.'AS'.'" 
        AND EXISTS(select 1 from trc_trn_schedule_hdrs h where sched_id = d.sched_id and sched_date = "'.date('Y-m-d', strtotime('+1 days', strtotime($curdate))).'")
        ');
        return response()->json(['status' => 'OK', 'data' => $data]);
    }

    public function listorder(Request $request)
    {
        $data=Trc_trn_schedule_dtls::select('*')->where('drv_id',$request->drv_id)
        ->where('status','CL')
        ->offset($request->index)
        ->limit('10')->get();
        return response()->json($data);
    }
    public function progress(Request $request)
    {
        $data=Trc_trn_schedule_dtls::select('*')->where('drv_id',$request->drv_id)
        ->where('status','!=','NW')
        ->where('status','!=','AS')
        ->where('status','!=','CL')
        ->where('status','!=','')
        ->limit('1')->get();
        return response()->json($data);
    }
    public function btnreceivejob(Request $request) {
        $data = Trc_trn_schedule_dtls::where('sched_id',$request->sched_id)->where('line', $request->line)
        ->update([
            'receive_assign' => 'Y',
            'status' => 'RJ',
            'update_by' => $request->username
        ]);

        if($data) {
            $stt = new Trc_trn_order_status;
            $stt->sched_id = $request->sched_id;
            $stt->line = $request->line;
            $stt->si_id = $request->si_id;
            $stt->is_public = 'Y';
            $stt->jobtime = Carbon::now();
            $stt->description = "Job Siap Dijalankan Sopir";
            $stt->create_by = $request->username;
            $stt->save();

            $tracks = new Trc_trn_schedule_tracks;
            $tracks->sched_id = $request->sched_id;
            $tracks->line = $request->line;
            $tracks->receivejob_time = Carbon::now();
            $tracks->receivejob_lat = $request->latitude;
            $tracks->receivejob_long = $request->longitude;
            $tracks->save();

            $max = DB::table('trc_trn_driver_hist_jobs')->where("sched_id", $request->sched_id)->where("line", $request->line)->max("seqno");
            if($max == "" || $max == NULL) {
                $max = 1;
            } else {
                $max = $max + 1;
            }   

            $job = new Trc_trn_driver_hist_jobs;  
            $job->sched_id = $request->sched_id;
            $job->line = $request->line;
            $job->seqno = $max;
            $job->empl_id = $request->username;
            $job->si_id = $request->si_id;
            $job->status = 'Receive';
            $job->date_action = Carbon::now();
            $job->create_by = $request->username;
            $job->save();
        }
        
        return response()->json(['status' => 'OK']);
    }

    public function btnrefusejob(Request $request) {
        $data = Trc_trn_schedule_dtls::where('sched_id',$request->sched_id)->where('line', $request->line)
        ->update([
            'assign_driver' => 'N',
            'receive_assign' => null,
            'drv_id' => '',
            'vhc_id' => '',
            'status' => 'NW',
            'update_by' => $request->username
        ]);

        if($data) {
            $stt = new Trc_trn_order_status;
            $stt->sched_id = $request->sched_id;
            $stt->line = $request->line;
            $stt->si_id = $request->si_id;
            $stt->is_public = 'N';
            $stt->jobtime = Carbon::now();
            $stt->description = "Sopir ".$request->username." menolak Job yang telah di Assign";
            $stt->create_by = $request->username;
            $stt->save();
            
            $max = DB::table('trc_trn_driver_hist_jobs')->where("sched_id", $request->sched_id)->where("line", $request->line)->max("seqno");
            if($max == "" || $max == NULL) {
                $max = 1;
            } else {
                $max = $max + 1;
            }
             
            $job = new Trc_trn_driver_hist_jobs;  
            $job->sched_id = $request->sched_id;
            $job->line = $request->line;
            $job->seqno = $max;
            $job->empl_id = $request->username;
            $job->si_id = $request->si_id;
            $job->status = 'Refuse';
            $job->date_action = Carbon::now();
            $job->create_by = $request->username; 
            $job->save();
        }
        return response()->json(['status' => 'OK']);
    }
    
    public function btnupdatetrack(Request $request) {
           
        if($request->status == 'OG') {
            $is_public = 'Y';
            $desc = 'Sopir berangkat dari Garasi menjalankan Order';
        } else if($request->status == 'AD') {
            $is_public = 'N';
            $desc = 'Sopir sampai pada tempat Depo';
        } else if($request->status == 'OD') {
            $is_public = 'N';
            $desc = 'Sopir keluar dari tempat Depo';
        } else if($request->status == 'AP') {
            $is_public = 'Y';
            $desc = 'Sopir Tiba pada Tempat Pickup';
        } else if($request->status == 'LP') {
            $is_public = 'Y';
            $desc = 'Proses Muat Sedang Berlangsung';
        } else if($request->status == 'OP') {
            $is_public = 'Y';
            $desc = 'Sopir bersiap keluar dari tempat Muat';
        } else if($request->status == 'AU') {
            $is_public = 'Y';
            $desc = 'Sopir Tiba pada Tempat Bongkar';
        } else if($request->status == 'UL') {
            $is_public = 'Y';
            $desc = 'Proses Bongkar Sedang Berlangsung';
        } else if($request->status == 'OU') {
            $is_public = 'Y';
            $desc = 'Sopir bersiap keluar dari tempat Bongkar';
        } else if($request->status == 'CL') {
            $is_public = 'Y';
            $desc = 'Sopir telah kembali ke Garansi dan menyelesaikan Order';
        } else {
            return response()->json(['status' => 'Failed', 'data' => 'Error status']);
        }

        $data = Trc_trn_schedule_tracks::where('sched_id', $request->sched_id)->where('line',$request->line)
        ->update([
            $request->fieldtable.'_time' => Carbon::now(),
            $request->fieldtable.'_lat' => $request->latitude,
            $request->fieldtable.'_long' => $request->longitude,
        ]);

        if($data) {
            $dtls = Trc_trn_schedule_dtls::where('sched_id', $request->sched_id)->where('line',$request->line)
            ->update([
                'status' => $request->status,
                'update_by' => $request->username
            ]);
            

            $stt = new Trc_trn_order_status;
            $stt->sched_id = $request->sched_id;
            $stt->line = $request->line;
            $stt->si_id = $request->si_id;
            $stt->is_public = $is_public;
            $stt->jobtime = Carbon::now();
            $stt->description = $desc;
            $stt->create_by = $request->username;
            $stt->save();

            return response()->json(['status' => 'OK']);
        } else {
            return response()->json(['status' => 'Failed']);
        }
    }
}
