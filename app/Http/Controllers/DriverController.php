<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use Session;
use App\Apps_mst_employees;
use App\Apps_mst_branchs;
use App\Trc_mst_drivers;
use App\Trc_mst_driver_branchs;
use App\User;

class DriverController extends Controller
{
    public function index() {
        $employees = Apps_mst_employees::select('empl_id', 'empl_fullname')->where('active','=','Y')->get();
        $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
        return view('driver.index',compact('employees','branchs'));
    }

    public function store(Request $request) {
        $check = Trc_mst_drivers::where('drv_id', $request->drv_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $data = new Trc_mst_drivers;
                $data->drv_id = $request->drv_id;
                $data->empl_id = $request->empl_id;
                $data->drv_name = $request->drv_name;
                $data->drv_handphone = $request->drv_handphone;
                $data->active = "Y";
                $data->create_by = auth()->user()->username; 
                
                $branchs = new Trc_mst_driver_branchs;
                $branchs->drv_id = $request->drv_id;
                $branchs->branch_id = $request->branch_id;
                $branchs->create_by = auth()->user()->username; 
                    
                $data->save();
                $branchs->save();
                    
                if($data) {
                    $user = User::where('username', $request->empl_id)
                    ->update([
                        'role' => 'Driver'
                    ]);
                    return "Save";
                } else {
                    return "Failed Save";
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function datadriver() {        
        if(session('usercabang') != "01") {
            $data = DB::table('trc_mst_drivers')
            ->select('trc_mst_drivers.drv_id','trc_mst_driver_branchs.branch_id','trc_mst_drivers.empl_id','trc_mst_drivers.drv_name','trc_mst_drivers.drv_handphone','trc_mst_drivers.active')
            ->join('trc_mst_driver_branchs','trc_mst_drivers.drv_id','=','trc_mst_driver_branchs.drv_id')
            ->where('trc_mst_driver_branchs.branch_id',session('usercabang'))
            ->get();            
        } else {
            $data = DB::table('trc_mst_drivers')
            ->select('trc_mst_drivers.drv_id','trc_mst_driver_branchs.branch_id','trc_mst_drivers.empl_id','trc_mst_drivers.drv_name','trc_mst_drivers.drv_handphone','trc_mst_drivers.active')
            ->join('trc_mst_driver_branchs','trc_mst_drivers.drv_id','=','trc_mst_driver_branchs.drv_id')
            ->get(); 
        }
        
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->drv_id.'" onclick="editdriver(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->drv_id.'" onclick="deletedriver(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data =  DB::table('trc_mst_drivers')
        ->select('trc_mst_drivers.drv_id','trc_mst_driver_branchs.branch_id','trc_mst_drivers.empl_id','trc_mst_drivers.drv_name','trc_mst_drivers.drv_handphone','trc_mst_drivers.active')
        ->join('trc_mst_driver_branchs','trc_mst_drivers.drv_id','=','trc_mst_driver_branchs.drv_id')
        ->where(['trc_mst_drivers.drv_id' => $id])
        ->get()->toArray();
        return $data; 
    }

    public function update(Request $request) {
        try{
            $data = Trc_mst_drivers::where('drv_id',$request->drv_id)
            ->update([
            'empl_id' => $request->empl_id,
            'drv_name' => $request->drv_name,
            'drv_handphone' => $request->drv_handphone,
            'update_by' => auth()->user()->username,
            'active' => $request->active
            ]);

            $data = Trc_mst_driver_branchs::where('drv_id',$request->drv_id)
            ->update([
            'branch_id' => $request->branch_id,
            'update_by' => auth()->user()->username
            ]);

            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            }
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }

    public function destroy(Request $request) {

        $check1 = Trc_mst_driver_branchs::where('drv_id', $request->id)->first();
        $check2 = Trc_mst_drivers::where('drv_id', $request->id)->first();
        
        if($check1) {
            return "Data Driver Sudah Terdapat Pada Master Lain";
        } elseif($check2) {
            return "Data Driver Sudah Terdapat Pada Master Lain";
        } else {
            $data = Trc_mst_drivers::where('drv_id', $request->id)->delete();
            $data = Trc_mst_driver_branchs::where('drv_id', $request->id)->delete();
            if($data) {
                $user = User::where('username', $request->empl_id)
                ->update([
                    'role' => 'Karyawan'
                ]);
                return "Success";
            } else {
                return "Failed Deleted";
            }
        }        
    }
}
