<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\laguController;

//Jika sebagai user
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
    
    //menampilkan bagian login
    Route::get('/login', function () {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                return view('admin.dashboard');
            }
            return view('user.dashboard');
        }
        return view('user.login');
    })->name('login.tampil');
    
    //submit login
    Route::post('/login',[AuthController::class,'submitLogin'])->name('login.submit');
});


//Jika Sudah Terautentikasi
Route::middleware('auth')->group(function(){
    //Rute User
    Route::middleware('access:false')->group(function(){
        //dashboard user
        Route::get('/', function () {
            return view('user.dashboard');
        })->name('userDashboard');
    });

    //Rute Admin
    Route::middleware('access:true')->group(function(){
        //dashboard admin
        Route::get('/admin', function () {
            return view('admin.dashboard');
        })->name('adminDashboard');

        //genre section
        Route::get('/admin/genre', function(){
            return view('admin.genre.kelola');
        })->name('kelola.genre');

        Route::get('/admin/genre/tambah', function(){
            return view('admin.genre.add');
        })->name('genre.add');
        //end genre section

        //lagu section
        Route::get('/admin/lagu', [laguController::class,'index'])->name('kelola.lagu');
        
        Route::get('/admin/lagu/delete/{id}', [laguController::class,'destroy'])->name('delete.lagu');

        Route::get('/admin/lagu/tambah', function(){
            return view('admin.lagu.add');
        })->name('lagu.add');
        //end lagu section

        //penyanyi section
        Route::get('/admin/penyanyi', function(){
            return view('admin.penyanyi.kelola');
        })->name('kelola.penyanyi');

        Route::get('/admin/penyanyi/tambah', function(){
            return view('admin.penyanyi.add');
        })->name('penyanyi.add');
        //end penyanyi section

        Route::get('/admin/log', function(){
            return view('log');
        })->name('log.user');


    });

    //Logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});