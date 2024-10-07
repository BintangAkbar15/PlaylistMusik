<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;

class AuthController extends Controller
{
    function submitLogin(Request $request){
        $data = $request->only('name','password');

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->route('userDashboard');
        }else{
            return back()->with('error',$data);
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login.tampil');
    }

    function submitRegis(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:100',
            'email'=>'required|email',
            'password'=>'required|min:8'
        ]);

        if(request('password') === request('c_password')){
            $data = [
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>request('password')
            ];
    
            User::create($data);
            return redirect()->route('login.tampil')->with('success','akun anda berhasil dibuat');
        }
        else{
            return redirect()->route('register.tampil')->with('error','password dan konfirmasinya harus sama');
        }
    }
}
