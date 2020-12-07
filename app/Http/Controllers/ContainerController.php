<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ord_mst_containers;
use App\Trc_trn_schedule_dtls;
use Auth;
use DataTables;
use DB;

class ContainerController extends Controller
{
    public function index() {
        return view('container.index');
    }
    
    public function store(Request $request) {
        $check = Ord_mst_containers::where('cont_id', $request->cont_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $data = new Ord_mst_containers;
                $data->cont_id = $request->cont_id;
                $data->cont_name = $request->cont_name;
                $data->cont_length = $request->cont_length;
                $data->cont_width = $request->cont_width;
                $data->cont_height = $request->cont_height;
                $data->active = "Y";
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

    public function datacontainer() {        
        $data = DB::table('ord_mst_containers as c')
        ->select('c.cont_id','c.cont_name','c.cont_length','c.cont_width','c.cont_height','c.active')
        ->get();
        
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->cont_id.'" onclick="editcontainer(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->cont_id.'" onclick="deletecontainer(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data =  DB::table('ord_mst_containers AS c')
        ->select('c.cont_id','c.cont_name','c.cont_length','c.cont_width','c.cont_height','c.active')
        ->where(['c.cont_id' => $id])
        ->get()->toArray();
        return $data; 
    }

    public function update(Request $request) {
        try{
            $data = Ord_mst_containers::where('cont_id',$request->cont_id)
            ->update([
            'cont_name' => $request->cont_name,
            'cont_length' => $request->cont_length,
            'cont_width' => $request->cont_width,
            'cont_height' => $request->cont_height,
            'update_by' => auth()->user()->username,
            'active' => $request->active
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
        $check1 = Trc_trn_schedule_dtls::where('cont_id', $request->id)->first();
        if($check1) {
            return "Data Container Sudah Ada Transaksi";
        } else {
            $data = Ord_mst_containers::where('cont_id', $request->id)->delete();
            if($data) {
                return "Success";
            } else {
                return "Failed Deleted";
            }
        }        
    }
}
