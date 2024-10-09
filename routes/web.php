<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('guest')->group(function () {
    Route::get('/sign/email', function () {
        return view('user.registerwithemail');
    })->name('register.email.tampil');
    
    Route::post('/register',[AuthController::class,'submitRegis'])->name('regis.submit');
    
    Route::get('/login', function () {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                return view('admin.dashboard');
            }
            return view('user.dashboard');
        }
        return view('user.login');
    })->name('login.tampil');
    
    Route::post('/login',[AuthController::class,'submitLogin'])->name('login.submit');
});

Route::middleware('auth')->group(function(){
    Route::middleware('access:false')->group(function(){
        Route::get('/', function () {
            return view('user.dashboard');
        })->name('userDashboard');
    });
    Route::middleware('access:true')->group(function(){
        Route::get('/admin/dashboard', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');
    });
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});

Route::get('/sign/phone', function(){
    return view('user.registerwithphonenum');
})->name('register.phone.tampil');