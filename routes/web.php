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

Route::get('/admin/genre/add', function(){
    return view('admin.genre.add');
})->name('admin.genre.add');

Route::get('/admin/genre', function(){
    return view('admin.genre.kelola');
})->name('admin.genre');

Route::get('/admin/lagu/add', function(){
    return view('admin.lagu.add');
})->name('admin.lagu.add');

Route::get('/admin/lagu', function(){
    return view('admin.lagu.kelola');
})->name('admin.lagu');

Route::get('/admin/artis/add', function(){
    return view('admin.penyanyi.add');
})->name('admin.artis.add');

Route::get('/admin/artis', function(){
    return view('admin.penyanyi.kelola');
})->name('admin.artis');