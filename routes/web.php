<?php

use App\Http\Controllers\AuthCustomController;
use App\Http\Controllers\ForgetPassController;
use App\Http\Controllers\ProfileController;
use http\Cookie;
use Illuminate\Support\Facades\Auth;
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

Route::get('test', function (){
    return null;
});
Route::get('/', function () {
//      $job =  \App\Jobs\SendEmail::dispatch()->delay(now()->addMinutes(1));
      return view('welcome');
});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware('admin')->group(function () {
    Route::resource('discount',\App\Http\Controllers\DiscountController::class);
    Route::get('/coupon/{locale}',[\App\Http\Controllers\CouponController::class,'create']);
    Route::post('/coupon',[\App\Http\Controllers\CouponController::class,'use'])->name('coupon');
});

Route::get('jobs',[\App\Http\Controllers\JobsController::class,'index']);


Route::prefix('{locale}')->group(function () {
    Route::get('dashboard-user', [AuthCustomController::class, 'dashboard'])->name('dashboard-user');
    Route::get('login-user', [AuthCustomController::class, 'index'])->name('login-user');
    Route::post('custom-login', [AuthCustomController::class, 'customLogin'])->name('login.custom');
    Route::get('registration', [AuthCustomController::class, 'registration'])->name('register-user');
    Route::post('custom-registration', [AuthCustomController::class, 'customRegistration'])->name('register.custom');
    Route::get('signout-user', [AuthCustomController::class, 'signOut'])->name('signout-user');
    Route::get('forget-pass', [ForgetPassController::class, 'forget'])->name('pass.request');
    Route::post('forget-pass', [ForgetPassController::class, 'forgetPass'])->name('pass.email');
    Route::get('reset-pass/{token}', [ForgetPassController::class, 'showResetPasswordForm'])->name('reset.pass.get');
    Route::post('reset-pass', [ForgetPassController::class, 'submitResetPasswordForm'])->name('reset.pass.post');

});


Route::middleware('customAuth')->resource('todo', \App\Http\Controllers\TodoController::class);

Route::get('khedmat', function (){
   return view('khedmat');
});
