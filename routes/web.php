<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('discount',\App\Http\Controllers\DiscountController::class);

Route::get('/coupon',[\App\Http\Controllers\CouponController::class,'create']);
Route::post('/coupon',[\App\Http\Controllers\CouponController::class,'use'])->name('coupon');
