<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::get('/register', function () {
        return view('user.register');
    })->name('register.tampil');
    
    Route::post('/register',[AuthController::class,'submitRegis'])->name('regis.submit');
    
    Route::get('/login', function () {
        return view('user.login');
    })->name('login.tampil');

    Route::post('/login',[AuthController::class,'submitLogin'])->name('login.submit');
});

Route::get('user/dashboard', function () {
    return view('user.dashboard');
})->name('userDashboard');

Route::get('admin/login', function () {
    return view('admin.login');
})->name('adminLogin');


Route::get('admin/dashboard', function () {
    return view('admin.dashboard');
})->name('adminDasboard');