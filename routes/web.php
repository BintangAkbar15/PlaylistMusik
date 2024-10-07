<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;


Route::middleware('guest')->group(function(){
    Route::get('/register', function () {
        return view('register');
    })->name('register.tampil');
    
    Route::post('/register',[AuthController::class,'submitRegis'])->name('regis.submit');
    
    Route::get('/login', function () {
        return view('login');
    })->name('login.tampil');

    Route::post('/login',[AuthController::class,'submitLogin'])->name('login.submit');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
})->name('userDashboard');