<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User_branchs;
use Validator;
use Hash;
use Session;
use App\User;
use App\Apps_mst_branchs;
use App\Apps_mst_empl_branchs;

class AuthController extends Controller
{
    public function showFormLogin()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('layouts.login');
    }

    public function login(Request $request)
    {
        $data = [
            'username'     => $request->input('username'),
            'password'  => $request->input('password'),
        ];
        
        Auth::attempt($data);

        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            
            $userbranch = User_branchs::where('username',$request->input('username'))->first();
            $users = User::where('username', $request->input('username'))->first();
             
            if($userbranch) {
                $branch_id =  $userbranch->branch_id;
                session(['usercabang' => $branch_id, 'role' => $users->role]);
            } else {
                $branch_id = "01";
                session(['usercabang' => $branch_id, 'role' => $users->role]);
            }
            
            //Login Success
            $msg = "Login Success";
            return $msg;
            //return $branch_id;
            //return redirect()->route('home'); 
        } else { // false
            //Login Fail
            $msg = "Login Failed";
            return $msg;
            //Session::flash('error', 'Username / password salah');
            //return redirect()->route('layouts.login');
        }
    }
    
    public function showFormRegister()
    {
        return view('register');
    }
 
    public function register(Request $request)
    {
        $rules = [
            'name'                  => 'required|min:3|max:35',
            'username'                 => 'required|unique:users,username',
            'password'              => 'required|confirmed'
        ];
        
        $messages = [
            'name.required'         => 'Nama Lengkap wajib diisi',
            'username.required'        => 'Email wajib diisi',
            'username.unique'          => 'Email sudah terdaftar',
            'password.required'     => 'Password wajib diisi'
        ];
 
        $validator = Validator::make($request->all(), $rules, $messages);
 
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }
 
        $user = new User;
        $user->name = ucwords(strtolower($request->name));
        $user->email = strtolower($request->email);
        $user->password = Hash::make($request->password);
        $user->email_verified_at = \Carbon\Carbon::now();
        $simpan = $user->save();
 
        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('errors', ['' => 'Register gagal! Silahkan ulangi beberapa saat lagi']);
            return redirect()->route('register');
        }
    }
 
    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        Session::forget('usercabang');
        return redirect()->route('login');
    }

    public function viewuserbranch() {
        if(session('usercabang') != "01") {
            $users = User::select('username','name')->where('username',auth()->user()->username)->get();
            $branchs = Apps_mst_branchs::select('branch_id','branch_name')->where('branch_id',session('usercabang'))->get();
        } else {
            $users = User::select('username','name')->get();
            $branchs = Apps_mst_branchs::select('branch_id','branch_name')->get();
        }
        return view('user.userbranch',compact('users','branchs'));
    }

    public function saveuserbranch(Request $request) {
        $check = User_branchs::where("username",$request->username)->first();
        if($check) {
            $data = User_branchs::where("username", $request->username)->update([
                "branch_id" => $request->branch_id,
                "update_by" => auth()->user()->username
            ]);

            $empl = Apps_mst_empl_branchs::where("empl_id", $request->username)->update([
                "branch_id" => $request->branch_id,
                "update_by" => auth()->user()->username
            ]);

            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            }
        } else {
            $data = new User_branchs;
            $data->username = $request->username;
            $data->branch_id = $request->branch_id;
            $data->create_by = auth()->user()->username;
            $data->save();

            $empl = new Apps_mst_empl_branchs;
            $empl->empl_id = $request->username;
            $empl->branch_id = $request->branch_id;
            $empl->create_by = auth()->user()->username;
            $empl->save();

            if($data) {
                return "Save";
            } else {
                return "Failed Save";
            }
        }
    }
}
