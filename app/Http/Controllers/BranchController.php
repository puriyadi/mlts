<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Apps_mst_branchs;
use Auth;
use DataTables;
use Session;

class BranchController extends Controller
{
    public function index() {
        $items = Apps_mst_branchs::select('branch_id', 'branch_name')
        ->where('branch_parent')
        ->orWhere('branch_parent','=','')
        ->get();
        return view('branch.index',compact('items'));
    }

    public function store(Request $request) {
        $check = Apps_mst_branchs::where('branch_id', $request->branch_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            $data = new Apps_mst_branchs;
            $data->branch_id = $request->branch_id;
            $data->branch_name = trim($request->branch_name);
            $data->branch_address = trim($request->branch_address);
            $data->branch_phone1 = trim($request->branch_phone1);
            $data->branch_phone2 = trim($request->branch_phone2);            
            $data->branch_fax1 = trim($request->branch_fax1);
            $data->branch_fax2 = trim($request->branch_fax2);            
            $data->branch_handphone1 = trim($request->branch_handphone1);
            $data->branch_handphone2 = trim($request->branch_handphone2);
            $data->branch_pic = trim($request->branch_pic);
            $data->branch_parent = trim($request->branch_parent); 
            $data->branch_email1 = trim($request->branch_email1);
            $data->branch_email2 = trim($request->branch_email2);
            $data->active = "Y";
            $data->create_by = auth()->user()->username;
            $data->save();
            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            }
        }
    }

    public function datacabang() {
        if(session('usercabang') != "01") {
            $data = Apps_mst_branchs::select('*')->where('branch_id',session('usercabang'));
        } else {
            $data = Apps_mst_branchs::select('*');
        }

        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->branch_id.'" onclick="editbranch(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->branch_id.'" onclick="deletebranch(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data = Apps_mst_branchs::select('*')->where('branch_id','=',$id)->get()->toArray();
        return $data;
    }

    public function update(Request $request) {
        $data = Apps_mst_branchs::where('branch_id',$request->branch_id)
        ->update([
            "branch_name" => $request->branch_name,
            "branch_address" => $request->branch_address,
            "branch_phone1" => $request->branch_phone1,
            "branch_phone2" => $request->branch_phone2,
            "branch_fax1" => $request->branch_fax1,
            "branch_fax2" => $request->branch_fax2,
            "branch_handphone1" => $request->branch_handphone1,
            "branch_handphone2" => $request->branch_handphone2,
            "branch_email1" => $request->branch_email1,
            "branch_email2" => $request->branch_email2,
            "branch_pic" => $request->branch_pic,
            "branch_parent" => $request->branch_parent,
            "active" => $request->active
        ]);

        if($data) {
            return "Save";
        } else {
            return "Failed Save";
        }
    }

    public function destroy(Request $request) {
        $data = Apps_mst_branchs::where('branch_id', $request->id)->delete();
        if($data) {
            return "Success";
        } else {
            return "Failed Deleted";
        }
    }
}
