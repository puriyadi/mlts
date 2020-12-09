<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Trc_trn_schedule_hdrs;
use App\Trc_trn_schedule_dtls;
use DB;
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
        
        $data = DB::select('SELECT d.sched_id, d.line, d.si_id, d.buss_unit, d.depo, c.cust_name,
        d.cust_address, c.cust_phone1, c.cust_handphone1, c.cust_pic,
        d.pickup_name, d.pickup_contact, d.pickup_address, 
        d.dest_name, d.dest_contact, d.dest_address, 
        d.cont_id, d.cont_no, d.padlock, d.seal_no, s.drv_name, v.vhc_plat_no 
        FROM trc_trn_schedule_dtls d, ord_mst_customers c, trc_mst_drivers s, trc_mst_vehicles v
        WHERE d.cust_id = c.cust_id and d.drv_id = s.drv_id and d.vhc_id = v.vhc_id
        and s.empl_id = "'.$request->empl_id.'"
        and d.assign_driver = "'.'Y'.'" AND IFNULL(d.receive_assign,"'.'N'.'") = "'.'N'.'" 
        AND EXISTS(select 1 from trc_trn_schedule_hdrs h where sched_id = d.sched_id and sched_date = "'.date("Y-m-d").'")
        ');

        return response()->json(['status' => 'OK', 'data' => $data]);
    }
    public function listorder(Request $request)
    {
        $data=Trc_trn_schedule_dtls::select('*')->where('drv_id',$request->drv_id)->offset($request->index)
        ->limit('10')->get();
        return response()->json($data);
    }
}
