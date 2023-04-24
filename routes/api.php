<?php

use App\Http\Resources\JobResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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
