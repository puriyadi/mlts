<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DataTables;
use DB;
use Session;
use App\Ord_mst_customers;
use App\Apps_mst_branchs;
use App\Trc_trn_schedule_dtls;
use App\Http\Controllers\FunctionController;

class CustomerController extends Controller
{
    protected $FunctionController;
    public function __construct(FunctionController $FunctionController)
    {
        $this->FunctionController = $FunctionController;
    }

    public function index(Request $request) {
        if(session('usercabang') != "01") {
            $branchs = Apps_mst_branchs::where("active","Y")->where("branch_id",session('usercabang'))->get();
        } else {
            $branchs = Apps_mst_branchs::where("active","Y")->get();
        }

        //$userbranchs = $request->session()->has('usercabang');
        //$userbranchs = session('usercabang');
        return view('customer.index', compact('branchs'));
    }

    public function getCust($id) {
        $data = Ord_mst_customers::select('*')->where('branch_id', $id)->get()->toArray();
        return $data;
    }

    public function getCustAddress($id) { 
        $data = Ord_mst_customers::select('*')->where('cust_id','=',$id)->get()->toArray();
        return $data;
    }
    
    public function store(Request $request) {
       
        $check = Ord_mst_customers::where('cust_id', $request->cust_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            try{
                $id = $this->FunctionController->GetAutoNumberMaster("C", "01");

                $data = new Ord_mst_customers;
                //$data->cust_id = $request->cust_id;
                $data->cust_id = $id;
                $data->cust_name = $request->cust_name;
                $data->branch_id = $request->branch_id;
                $data->cust_address = $request->cust_address;
                $data->cust_phone1 = $request->cust_phone1;
                $data->cust_phone2 = $request->cust_phone2;
                $data->cust_phone3 = $request->cust_phone3;
                $data->cust_fax1 = $request->cust_fax1;
                $data->cust_fax2 = $request->cust_fax2;
                $data->cust_fax3 = $request->cust_fax3;
                $data->cust_handphone1 = $request->cust_handphone1;
                $data->cust_handphone2 = $request->cust_handphone2;
                $data->cust_handphone3 = $request->cust_handphone3;
                $data->cust_pic = $request->cust_pic;
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

    public function datacustomer() {   
        if(session('usercabang') != "01") {
            $data = DB::table('ord_mst_customers as c')
            ->select('c.cust_id','c.branch_id','c.cust_name','c.cust_phone1','c.cust_handphone1','c.cust_pic','c.active')
            ->where('c.branch_id',session('usercabang'))
            ->get();
        } else {
            $data = DB::table('ord_mst_customers as c')
            ->select('c.cust_id','c.branch_id','c.cust_name','c.cust_phone1','c.cust_handphone1','c.cust_pic','c.active')
            ->get();
        }
        
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->cust_id.'" onclick="editcustomer(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->cust_id.'" onclick="deletecustomer(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data = DB::table('ord_mst_customers as c')
        ->select('c.*')
        ->where(['c.cust_id' => $id])
        ->get()->toArray();
        return $data; 
    }

    public function update(Request $request) {
        try{
            $data = Ord_mst_customers::where('cust_id',$request->cust_id)
            ->update([
            'cust_name' => $request->cust_name,
            'branch_id' => $request->branch_id,
            'cust_address' => $request->cust_address,
            'cust_phone1' => $request->cust_phone1,
            'cust_phone2' => $request->cust_phone2,
            'cust_phone3' => $request->cust_phone3,
            'cust_fax1' => $request->cust_fax1,
            'cust_fax2' => $request->cust_fax2,
            'cust_fax3' => $request->cust_fax3,
            'cust_handphone1' => $request->cust_handphone1,
            'cust_handphone2' => $request->cust_handphone2,
            'cust_handphone3' => $request->cust_handphone3,
            'cust_pic' => $request->cust_pic,
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
        $check1 = Trc_trn_schedule_dtls::where('cust_id', $request->id)->first();
        if($check1) {
            return "Data Customer Sudah Ada di Transaksi";
        } else {
            $data = Ord_mst_customers::where('cust_id', $request->id)->delete();
            if($data) {
                return "Success";
            } else {
                return "Failed Deleted";
            }
        }        
    }
}
