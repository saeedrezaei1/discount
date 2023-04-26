<?php

use App\Http\Controllers\AuthController;
use App\Http\Resources\JobResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Api\ForgetPassController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::controller(ForgetPassController::class)->group(function () {
    Route::post('forget-pass', 'forget');
    Route::post('reset-pass', 'submitResetPasswordForm')->name('api.reset.pass.post');
});
Route::middleware('auth')->get('/user',function (){
   return \Illuminate\Support\Facades\Auth::user()->toArray();
});

Route::controller(AuthController::class)->group(function () {
    Route::post('login', 'login');
    Route::post('register', 'register');
    Route::post('logout', 'logout');
    Route::post('refresh', 'refresh');
});


Route::get('/job-list',function (){
    $jobs = JobResource::collection(DB::table('jobs')->get());
return response()->json([
    'status' => true,
    'jobs'=> $jobs
]);
});
Route::get('/job-list/{id}',function ($id){
    $job = DB::table('jobs')->where('id', $id)->first();
    return response()->json([
        'status' => true,
        'job'=> $job
    ]);
});

Route::get('/job-list/{id}/{time}',function ($id,$time){
    $job = DB::table('jobs')->where('id', $id)
    ->increment('available_at', $time);
    return response('seconds add to job', 200);
});
