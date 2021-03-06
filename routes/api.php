<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::group([
    'middleware' => 'api' 
], function ($router) {
    Route::post('login', 'UserController@login');
    Route::post('logout', 'UserController@logout');
    //Route::post('refresh', 'UserController@refresh');
    Route::get('userprofile', 'UserController@getAuthenticatedUser');

    //--------------------------- JOB --------------------------------
    Route::get('receivejob','API\JobController@receivejob');
    Route::get('jobprogress','API\JobController@progress');
    Route::get('listorder','API\JobController@listorder');
    Route::post('btnreceivejob','API\JobController@btnreceivejob');
    Route::post('btnrefusejob','API\JobController@btnrefusejob');
    Route::post('btnupdatetrack','API\JobController@btnupdatetrack');
}); 
