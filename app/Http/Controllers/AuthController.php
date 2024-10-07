<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    function submitLogin(Request $request){
        $data = $request->only('username','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('dashboard.tampil');
        }else{
            return back()->with('error','Username atau Password salah');
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login.tampil');
    }
}
