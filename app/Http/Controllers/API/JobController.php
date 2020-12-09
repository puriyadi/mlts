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
        $data = Trc_trn_schedule_hdrs::select('*');
        //->where("drv_id", $request->drv_id);
        //$data = $request->drv_id;
        return response()->json(['status' => 'OK', 'data' => $data]);
        //return response()->json(['status' => 'OK', 'data' => compact($data)]);
        //return response()->json(['status' => 'OK', 'data' => compact('token')]);
    }
    public function listorder(Request $request)
    {
        $data=Trc_trn_schedule_dtls::select('*')->where('drv_id',$request->drv_id)->offset($request->index)
        ->limit('10')->get();
        return response()->json($data);
    }
}
