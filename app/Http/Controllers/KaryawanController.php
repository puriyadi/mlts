<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apps_mst_employees;
use Auth;
use DataTables;
use Carbon\Carbon;
use File;
use App\User;
use Hash;
use App\Http\Controllers\FunctionController;

class KaryawanController extends Controller
{
    protected $FunctionController;
    public function __construct(FunctionController $FunctionController)
    {
        $this->FunctionController = $FunctionController;
    }

    public function index() {
        return view('karyawan.index');
    }

    public function store(Request $request) {
        $check = Apps_mst_employees::where('empl_id', $request->empl_id)->first();
        if($check) {
            return "Data Sudah Ada";
        } else {
            $data = new Apps_mst_employees;
            $id = $this->FunctionController->GetAutoNumberMaster("K", "01");
            //$data->empl_id = $request->empl_id;
            $data->empl_id = $id;
            $data->empl_fullname = trim($request->empl_fullname);
            $data->empl_shortname = trim($request->empl_shortname);
            $data->empl_birthday = $request->empl_birthday;
            $data->empl_placebirth = trim($request->empl_placebirth);
            $data->empl_gender = trim($request->empl_gender);
            $data->empl_on_id = trim($request->empl_on_id);
            $data->doc_id = "KTP";
            $data->empl_address_on_id = trim($request->empl_address_on_id);
            $data->empl_address_current = trim($request->empl_address_current);
            $data->empl_phone1 = trim($request->empl_phone1);
            $data->empl_phone2 = trim($request->empl_phone2);            
            $data->empl_handphone1 = trim($request->empl_handphone1);
            $data->empl_handphone2 = trim($request->empl_handphone2);
            $data->empl_email1 = trim($request->empl_email1);
            $data->empl_email2 = trim($request->empl_email2);
            $data->empl_hobbies = trim($request->empl_hobbies);
            $data->empl_blood = trim($request->empl_blood);            
            $data->relg_id = trim($request->relg_id);
            $data->empl_start_work = trim($request->empl_start_work); 
            if($request->empl_resign_date <> "") {
                $data->empl_resign = "Y";
                $data->empl_resign_date = $request->empl_resign_date; 
            } else {
                $data->empl_resign = "N";
            }
            $data->active = "Y";
            $data->create_by = auth()->user()->username; 

            if($request->hasFile('inputFile')) {
                $img = $request->file('inputFile');
                //$img_name = time().'.'.$img->getClientOriginalExtension();
                $img_name = date('YmdHis', strtotime(Carbon::now())).'.'.$img->getClientOriginalExtension();
                $dest_path = public_path('/img');
                $img->move($dest_path, $img_name);
                $data->empl_photo = 'img/'.$img_name;
            }

            /*
            if($request->file('inputFile')) {
                $uploadedFile = $request->file('inputFile');  
                $path = $uploadedFile->store('public/img');
                //$path = Storage::putFileAs('public/img', $request->file('inputFile'), $imgname);    
                //Storage::putFileAs('photos', new File('/path/to/photo'), 'photo.jpg');
                $data->empl_photo = $path;
            }
            */
            
            $data->save();
            
            if($data) {
                $user = new User;
                //$user->username = $request->empl_id;
                $user->username = $id;
                $user->password = Hash::make("1234");
                $user->name = $request->empl_fullname;
                $user->role = "Karyawan";
                $user->save();

                return "Save";
            } else {
                return "Failed Save";
            }
        }
    }

    public function datakaryawan() {
        $data = Apps_mst_employees::select('*');
        return DataTables::of($data)
        ->addColumn('action', function($data) {
            return '<button value="'.$data->empl_id.'" onclick="editemployee(this.value)"  class="btn btn-info btn-sm">
            <i class="fa fa-edit"></i></button>
            <button value="'.$data->empl_id.'" onclick="deleteemployee(this.value)"  class="btn btn-danger btn-sm">
            <i class="fa fa-trash"></i></button>';
        })->make(true);
    }

    public function edit($id) {
        $data = Apps_mst_employees::select('*')->where('empl_id','=',$id)->get()->toArray();
        return $data;
    }

    public function update(Request $request) {

        if($request->empl_resign_date != "" || $request->empl_resign_date <> "") {
            $empl_resign = "Y";
            $empl_resign_date = $request->empl_resign_date;
        } else {
            $empl_resign = "N";
            $empl_resign_date = NULL;
        }
        
        try {
            //$data = Apps_mst_employees::where('empl_id',$request->empl_id)->get();
            if($request->hasFile('inputFile')) {
                !empty($request->oldFile) ? File::delete(public_path($request->oldFile)):null;
                $img = $request->file('inputFile');
                //$img_name = time().'.'.$img->getClientOriginalExtension();
                $img_name = date('YmdHis', strtotime(Carbon::now())).'.'.$img->getClientOriginalExtension();
                $dest_path = public_path('/img');
                $img->move($dest_path, $img_name);
                $empl_photo = 'img/'.$img_name;
            }
            
            $data = Apps_mst_employees::where('empl_id',$request->empl_id)
            ->update([
            'empl_fullname' => $request->empl_fullname,
            'empl_shortname' => $request->empl_shortname,
            'empl_placebirth' => $request->empl_placebirth,
            'empl_birthday' => $request->empl_birthday,
            'empl_gender' => $request->empl_gender,
            'empl_on_id' => $request->empl_on_id,
            'empl_address_on_id' => $request->empl_address_on_id,
            'empl_address_current' => $request->empl_address_current,
            'empl_phone1' => $request->empl_phone1,
            'empl_phone2' => $request->empl_phone2,
            'empl_handphone1' => $request->empl_handphone1,
            'empl_handphone2' => $request->empl_handphone2,
            'empl_email1' => $request->empl_email1,
            'empl_email2' => $request->empl_email2,
            'empl_hobbies' => $request->empl_hobbies,
            'empl_blood' => $request->empl_blood,
            'relg_id' => $request->relg_id,
            'empl_start_work' => $request->empl_start_work,
            'empl_resign' => $empl_resign,
            'empl_resign_date' => $empl_resign_date,
            'update_by' => auth()->user()->username,
            'active' => $request->active,
            'empl_photo' => !empty($empl_photo) ? $empl_photo : $request->oldFile
            ]);
            
            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            } 
        } catch (Throwable $e) {
            return "Error ".$e->getMessage();
        }  
         
    }

    public function destroy(Request $request) {
        $data = Apps_mst_employees::where('empl_id', $request->id)->delete();
        if($data) {
            return "Success";
        } else {
            return "Failed Deleted";
        }
    }

    public function getemployee($id) {
        $data = Apps_mst_employees::select('*')->where('empl_id','=',$id)->get()->toArray();
        return $data;
    }
}
