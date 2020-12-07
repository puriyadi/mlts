<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Ord_mst_documents;
use App\Trc_mst_vehicle_docs;
use Auth;
use DataTables;
use DB;

class OrdDocumentController extends Controller
{
    public function index() {
        return view('orddocument.index');
    }
    
    public function store(Request $request) {
        $check = Ord_mst_documents::where('doc_id', $request->doc_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $data = new Ord_mst_documents;
                $data->doc_id = $request->doc_id;
                $data->doc_name = $request->doc_name;
                $data->doc_type = $request->doc_type;
                $data->remark = $request->remark;
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

    public function dataorddocument() {        
        $data = DB::table('ord_mst_documents as d')
        ->select('d.doc_id','d.doc_name','d.doc_type','d.remark','d.active')
        ->get();
        
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->doc_id.'" onclick="editdokumen(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->doc_id.'" onclick="deletedokumen(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data = DB::table('ord_mst_documents as d')
        ->select('d.doc_id','d.doc_name','d.doc_type','d.remark','d.active')
        ->where(['d.doc_id' => $id])
        ->get()->toArray();
        return $data; 
    }

    public function update(Request $request) {
        try{
            $data = Ord_mst_documents::where('doc_id',$request->doc_id)
            ->update([
            'doc_name' => $request->doc_name,
            'doc_type' => $request->doc_type,
            'remark' => $request->remark,
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
        $check1 = Trc_mst_vehicle_docs::where('doc_id', $request->id)->first();
        if($check1) {
            return "Data Dokumen Sudah Ada di Master Vehicle";
        } else {
            $data = Ord_mst_documents::where('doc_id', $request->id)->delete();
            if($data) {
                return "Success";
            } else {
                return "Failed Deleted";
            }
        }        
    }
}
