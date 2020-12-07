<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use Session;
use App\Trc_mst_vehicles;
use App\Trc_mst_vehicle_branchs;
use App\Trc_mst_vehicle_docs;
use App\Ord_mst_documents;
use App\Apps_mst_branchs;

class VehicleController extends Controller
{
    public function index() {
        $branchs = Apps_mst_branchs::select('branch_id', 'branch_name')->where('active','=','Y')->get();
        $docs = Ord_mst_documents::select('doc_id','doc_name')->where('active','=','Y')->where('doc_type','=','VC')->get();
        return view('vehicle.index',compact('branchs','docs'));
    }

    public function store(Request $request) {
        
        $check = Trc_mst_vehicles::where('vhc_id', $request->vhc_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $data = new Trc_mst_vehicles;
                $data->vhc_id = $request->vhc_id;
                $data->vhc_name = $request->vhc_name;
                $data->vhc_plat_no = $request->vhc_plat_no;
                $data->vhc_year = $request->vhc_year;
                $data->vhc_cc = $request->vhc_cc;
                $data->vhc_machine_no = $request->vhc_machine_no;
                $data->vhc_frame_no = $request->vhc_frame_no;
                $data->vhc_color = $request->vhc_color;
                $data->vhc_count_ban = $request->vhc_count_ban;
                $data->remark = $request->remark; 
                $data->active = "Y";
                $data->create_by = auth()->user()->username; 

                $branchs = new Trc_mst_vehicle_branchs;
                $branchs->vhc_id = $request->vhc_id;
                $branchs->branch_id = $request->branch_id;
                $branchs->create_by = auth()->user()->username; 
                    
                $data->save();
                $branchs->save();
                    
                if($data) {
                    return "Save";
                } else {
                    return "Failed Save";
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function vehicledocs_save(Request $request) {
        $check = Trc_mst_vehicle_docs::where('vhc_id', $request->id)->where('doc_id',$request->doc_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $data = new Trc_mst_vehicle_docs;
                $data->vhc_id = $request->id;
                $data->doc_id = $request->doc_id;
                $data->doc_no = $request->doc_no;
                $data->doc_name = $request->doc_name;
                $data->doc_exp_date = $request->doc_exp_date;
                $data->type = "Perusahaan";
                $data->owner_id = "L5B";
                $data->remark = $request->remark;
                $data->create_by = auth()->user()->username; 
                $data->save();
                    
                if($data) {
                    return "Save";
                } else {
                    return "Failed Save";
                }
            } catch (\Exception $e) {
                return $e->getMessage();
            }
        }
    }

    public function vehicledocs_update(Request $request) {
        try{
            $data = Trc_mst_vehicle_docs::where('vhc_id', $request->id)->where('doc_id',$request->doc_id)
            ->update([
            'doc_no' => $request->doc_no,
            'doc_name' => $request->doc_name,
            'doc_exp_date' => $request->doc_exp_date,
            'remark' => $request->remark,
            'update_by' => auth()->user()->username,
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

    public function vehicledocs_delete(Request $request) {
        $data = Trc_mst_vehicle_docs::where('vhc_id', $request->id)->where('doc_id', $request->doc_id)->delete();
        if($data) {
            return "Success";
        } else {
            return "Failed Deleted";
        }
    }

    public function datavehicle() { 
        if(session('usercabang') != "01") { 
            $data = DB::table('trc_mst_vehicles')
            ->select('trc_mst_vehicles.vhc_id','trc_mst_vehicle_branchs.branch_id','trc_mst_vehicles.vhc_name','trc_mst_vehicles.vhc_plat_no','trc_mst_vehicles.vhc_year','trc_mst_vehicles.vhc_count_ban','trc_mst_vehicles.active')
            ->join('trc_mst_vehicle_branchs','trc_mst_vehicles.vhc_id','=','trc_mst_vehicle_branchs.vhc_id')
            ->where('trc_mst_vehicle_branchs.branch_id',session('usercabang'))
            ->get();
        } else {
            $data = DB::table('trc_mst_vehicles')
            ->select('trc_mst_vehicles.vhc_id','trc_mst_vehicle_branchs.branch_id','trc_mst_vehicles.vhc_name','trc_mst_vehicles.vhc_plat_no','trc_mst_vehicles.vhc_year','trc_mst_vehicles.vhc_count_ban','trc_mst_vehicles.active')
            ->join('trc_mst_vehicle_branchs','trc_mst_vehicles.vhc_id','=','trc_mst_vehicle_branchs.vhc_id')
            ->get();
        }

        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->vhc_id.'" onclick="editvehicle(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->vhc_id.'" onclick="deletevehicle(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }
    
    public function datavehicledocs($id) {
        
        $data = DB::table('trc_mst_vehicle_docs')
        ->select('vhc_id','doc_id', 'doc_no', 'doc_name', 'doc_exp_date', 'remark')
        ->where('trc_mst_vehicle_docs.vhc_id','=', $id)
        ->get();
         
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->vhc_id.'||'.$data->doc_id.'" onclick="editvehicledocs(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->vhc_id.'||'.$data->doc_id.'" onclick="deletevehicledocs(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }
   
    public function edit($id) {
        $data =  DB::table('trc_mst_vehicles')
        ->select('trc_mst_vehicles.*','trc_mst_vehicle_branchs.branch_id')
        ->join('trc_mst_vehicle_branchs','trc_mst_vehicles.vhc_id','=','trc_mst_vehicle_branchs.vhc_id')
        ->where(['trc_mst_vehicles.vhc_id' => $id])
        ->get()->toArray();
        return $data; 
    }

    public function editdocs($id) {
        $arr = explode("||", $id);
        $data = DB::table('trc_mst_vehicle_docs')
        ->select('*')
        ->where('vhc_id','=', $arr[0])
        ->where('doc_id','=', $arr[1])
        ->get()->toArray();
        return $data; 
    }

    public function update(Request $request) {
        try{
            $data = Trc_mst_vehicles::where('vhc_id',$request->vhc_id)
            ->update([
            'vhc_name' => $request->vhc_name,
            'vhc_plat_no' => $request->vhc_plat_no,
            'vhc_year' => $request->vhc_year,
            'vhc_cc' => $request->vhc_cc,
            'vhc_machine_no' => $request->vhc_machine_no,
            'vhc_frame_no' => $request->vhc_frame_no,
            'vhc_color' => $request->vhc_color,
            'vhc_count_ban' => $request->vhc_count_ban,
            'remark' => $request->remark, 
            'active' => $request->active,
            'update_by' => auth()->user()->username,
            ]);

            $data = Trc_mst_vehicle_branchs::where('vhc_id',$request->vhc_id)
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
        $check1 = Trc_mst_vehicle_docs::where('vhc_id', $request->id)->first();
        $check2 = Trc_mst_vehicle_branchs::where('vhc_id', $request->id)->first();
        $check3 = Trc_mst_vehicles::where('vhc_id', $request->id)->first();
        
        if($check1) {
            return "Data Kendaraan Sudah Terdapat Pada Master Lain";
        } elseif($check2) {
            return "Data Kendaraan Sudah Terdapat Pada Master Lain";
        } elseif($check3) {
            return "Data Kendaraan Sudah Terdapat Pada Master Lain";
        } else {
            $data = Trc_mst_vehicle_docs::where('vhc_id', $request->id)->delete();
            $data = Trc_mst_vehicle_branchs::where('vhc_id', $request->id)->delete();
            $data = Trc_mst_vehicles::where('vhc_id', $request->id)->delete();

            if($data) {
                return "Success";
            } else {
                return "Failed Deleted";
            }
        }
    }
}
