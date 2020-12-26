<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@showFormLogin')->name('login');
Route::get('login', 'AuthController@showFormLogin')->name('login');
Route::post('login', 'AuthController@login');
//Route::get('register', 'AuthController@showFormRegister')->name('register');
//Route::post('register', 'AuthController@register');
    

Route::group(['middleware' => 'auth'], function () { 
    Route::get('home', 'HomeController@index')->name('home');
    Route::get('logout', 'AuthController@logout')->name('logout');

    //------------------------------- BRANCH -------------------------------
    Route::get('branch', 'BranchController@index')->name('branch');
    Route::post('branch', 'BranchController@store');
    Route::get('branch/data', 'BranchController@datacabang')->name('datacabang'); 
    Route::get('branch/{id}/edit', 'BranchController@edit');
    Route::patch('branch', 'BranchController@update');
    Route::delete('branch', 'BranchController@destroy');

    //------------------------------- Karyawan -------------------------------
    Route::get('karyawan', 'KaryawanController@index')->name('karyawan');
    Route::post('karyawan', 'KaryawanController@store');
    Route::get('karyawan/data', 'KaryawanController@datakaryawan')->name('datakaryawan');    
    Route::get('karyawan/{id}/edit', 'KaryawanController@edit');
    Route::post('karyawan/update', 'KaryawanController@update');
    Route::delete('karyawan', 'KaryawanController@destroy');

    //------------------------------- Driver -------------------------------
    Route::get('driver', 'DriverController@index')->name('driver');
    Route::post('driver', 'DriverController@store');
    Route::get('driver/data', 'DriverController@datadriver')->name('datadriver');
    Route::get('driver/{id}/edit', 'DriverController@edit');
    Route::patch('driver', 'DriverController@update');
    Route::delete('driver', 'DriverController@destroy');

    //------------------------------- Customer -------------------------------
    Route::get('customer', 'CustomerController@index')->name('customer');
    Route::post('customer', 'CustomerController@store');
    Route::get('customer/data', 'CustomerController@datacustomer')->name('datacustomer');
    Route::get('customer/{id}/edit', 'CustomerController@edit');
    Route::patch('customer', 'CustomerController@update');
    Route::delete('customer', 'CustomerController@destroy');
    
    //------------------------------- Container -------------------------------
    Route::get('container', 'ContainerController@index')->name('container');
    Route::post('container', 'ContainerController@store');
    Route::get('container/data', 'ContainerController@datacontainer')->name('datacontainer');
    Route::get('container/{id}/edit', 'ContainerController@edit');
    Route::patch('container', 'ContainerController@update');
    Route::delete('container', 'ContainerController@destroy');
    
    //------------------------------- Document -------------------------------
    Route::get('orddocument', 'OrdDocumentController@index')->name('orddocument');
    Route::post('orddocument', 'OrdDocumentController@store');
    Route::get('orddocument/data', 'OrdDocumentController@dataorddocument')->name('dataorddocument');
    Route::get('orddocument/{id}/edit', 'OrdDocumentController@edit');
    Route::patch('orddocument', 'OrdDocumentController@update');
    Route::delete('orddocument', 'OrdDocumentController@destroy');
    
    //------------------------------- Kendaraan -------------------------------
    Route::get('kendaraan', 'VehicleController@index')->name('kendaraan');
    Route::post('kendaraan', 'VehicleController@store');
    Route::post('kendaraan/docs', 'VehicleController@vehicledocs_save');
    Route::post('kendaraan/docs/update', 'VehicleController@vehicledocs_update');
    Route::delete('kendaraan/docs/delete', 'VehicleController@vehicledocs_delete');
    Route::get('kendaraan/data', 'VehicleController@datavehicle')->name('datavehicle');    
    Route::get('kendaraan/{id}/docs', 'VehicleController@datavehicledocs');
    Route::get('kendaraan/{id}/edit', 'VehicleController@edit');
    Route::get('kendaraan/{id}/editdocs', 'VehicleController@editdocs');
    Route::patch('kendaraan', 'VehicleController@update');
    Route::delete('kendaraan', 'VehicleController@destroy');

    //------------------------------- Schedule -------------------------------
    Route::get('schedule', 'ScheduleController@index')->name('schedule');
    Route::get('schedule/tambah', 'ScheduleController@add');
    Route::post('schedule/tambah', 'ScheduleController@store');
    Route::patch('schedule/tambah', 'ScheduleController@updateschedulesi'); 
    Route::delete('schedule/tambah', 'ScheduleController@deleteschedulesi'); 
    Route::get('schedule/data', 'ScheduleController@dataschedule')->name('dataschedule');
    Route::get('schedule/{id}/edit', 'ScheduleController@edit');
    Route::patch('schedule/{id}/edit', 'ScheduleController@updateschedulesi');
    Route::delete('schedule/{id}/edit', 'ScheduleController@deleteschedulesi');
    Route::get('schedule/{id}/editschedulesi', 'ScheduleController@editschedulesi');
    Route::get('schedule/{id}/silist', 'ScheduleController@silist');
    Route::delete('schedule','ScheduleController@destroy');
    Route::get('assign', 'ScheduleController@assign')->name('assign');
    Route::post('assign/list', 'ScheduleController@assigndriver');
    Route::post('assign/submit','ScheduleController@assignsubmit');
    Route::get('changedriver','ScheduleController@changedriver')->name('changedriver');
    Route::get('changedriverlist','ScheduleController@changedriverlist')->name('changedriverlist');
    Route::get('changedriver/{id}/edit', 'ScheduleController@changedriveredit');
    Route::post('changedriver','ScheduleController@changedriversubmit');

    //------------------------------- User -------------------------------
    Route::get('userbranch', 'AuthController@viewuserbranch')->name('userbranchs');
    Route::post('user/branchs', 'AuthController@saveuserbranch');

    //------------------------------- Function -------------------------------
    Route::get('karyawan/{id}/getemployee', 'KaryawanController@getemployee');
    Route::get('customer/{id}/getcustaddress', 'CustomerController@getCustAddress');
    Route::get('customer/{id}/getcust', 'CustomerController@getCust');
    
});