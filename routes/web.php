<?php

use Illuminate\Support\Facades\Route;

Route::get('/login', function () {
    return view('login');
});

Route::get('/dashboard', function () {
    return view('user.dashboard');
});