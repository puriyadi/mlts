<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use App\Counters;

class FunctionController extends Controller
{
    public function GetAutoNumberMaster($code, $branchid) {
         
        $counter = Counters::where("code",$code)
        ->where("branch_id",$branchid)
        ->where("year",date("Y"))
        ->get();
    
        if($counter->isEmpty()) {
            $angka = 1;
        } else {
            if($counter[0]['digit'] == null || $counter[0]['digit'] == 0) {
                $angka = 1;
            } else {
                $angka = $counter[0]['digit'] + 1;
            }   
        }

        if(strlen($angka) == 1) {
            $digit = "0000".$angka;
        } else if(strlen($angka) == 2) {
            $digit = "000".$angka;
        } else if(strlen($angka) == 3) {
            $digit = "00".$angka;
        } else if(strlen($angka) == 4) {
            $digit = "0".$angka;
        } else if(strlen($angka) == 5) {
            $digit = $angka;
        }

        $run_number = $code.$branchid.date("y").$digit;
       
        if($angka == 1) {
            $data = new Counters;
            $data->code = $code;
            $data->branch_id = $branchid;
            $data->year = date("Y");
            $data->digit = $angka;
            $data->save();
        } else {
            $data = Counters::where("code",$code)->where("branch_id",$branchid)->where("year",date("Y"))
            ->update([
                'digit' => $angka
            ]);
        }
        return $run_number;
    }

    public function GetAutoNumberTrans($code, $branchid) {
        $counter = Counters::where("code",$code)
        ->where("branch_id",$branchid)
        ->where("year",date("Y"))
        ->where("month",date("m"))
        ->get();
    
        if($counter->isEmpty()) {
            $angka = 1;
        } else {
            if($counter[0]['digit'] == null || $counter[0]['digit'] == 0) {
                $angka = 1;
            } else {
                $angka = $counter[0]['digit'] + 1;
            }   
        }

        if(strlen($angka) == 1) {
            $digit = "0000".$angka;
        } else if(strlen($angka) == 2) {
            $digit = "000".$angka;
        } else if(strlen($angka) == 3) {
            $digit = "00".$angka;
        } else if(strlen($angka) == 4) {
            $digit = "0".$angka;
        } else if(strlen($angka) == 5) {
            $digit = $angka;
        }

        $run_number = $branchid.$code.date("Ym").$digit;
        
        if($angka == 1) {
            $data = new Counters;
            $data->code = $code;
            $data->branch_id = $branchid;
            $data->year = date("Y");
            $data->month = date("m");
            $data->digit = $angka;
            $data->save();
        } else {
            $data = Counters::where("code",$code)->where("branch_id",$branchid)
            ->where("year",date("Y"))
            ->where("month",date("m"))
            ->update([
                'digit' => $angka
            ]);
        }
        return $run_number;
    }
}
