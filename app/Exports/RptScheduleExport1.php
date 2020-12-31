<?php

namespace App\Exports;

use App\Trc_trn_schedule_dtls;
use Maatwebsite\Excel\Concerns\FromCollection;

class RptScheduleExport1 implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Trc_trn_schedule_dtls::all();
    }
}
