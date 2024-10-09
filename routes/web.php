<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


Route::middleware('guest')->group(function () {
    //menampilkan bagian register user
    Route::get('/register/email', function () {
        return view('user.emailregister');
    })->name('register.email.tampil');
    
        
    Route::get('/register/phone', function(){
        return view('user.phoneregister');
    })->name('register.phone.tampil');
    
    //submit register
    Route::post('/register',[AuthController::class,'submitRegisEmail'])->name('regis.email.submit');
    Route::post('/register',[AuthController::class,'submitRegisPhone'])->name('regis.phone.submit');
    
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