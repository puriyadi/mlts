<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\FromQuery;
//use Maatwebsite\Excel\Concerns\Exportable;
use DB;

class RptScheduleExport implements FromCollection
{
    //use Exportable;
    protected $from;
    protected $to;
    protected $branch_id;

    function __construct($from, $to, $branch_id)
    {
        $this->from = $from;
        $this->to = $to;
        $this->branch_id = $branch_id;
    }

    public function collection()
    {
        /*
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
        ->where('h.sched_date','>=',$this->from)
        ->where('h.sched_date','<=',$this->to)
        ->where('h.branch_id','=',$this->branch_id)
        ->where(DB::raw('IFNULL(d.assign_driver,\'N\')'), '=', 'Y')
        ->where('d.status','CL') 
        ->get();
        
        return $datas;
        */
        return $this->from;

    }
}
