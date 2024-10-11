<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\playlist;
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
            $data = Auth::user()->is_admin == true ? true : false;
            if($data == true){
                return redirect()->route('adminDashboard')->with('success','Login Berhasil');
            }
            return redirect()->route('userDashboard')->with('success','Login Berhasil');
        }else{
            return back()->with('error','Username/Password salah');
        }
    }

    function logout(){
        Auth::logout();
        return redirect()->route('login.tampil');
    }

    function submitRegisEmail(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:100',
            'email'=>'required|email|unique:users',
            'password'=>'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/'
        ]);

        if(request('password') === request('c_password')){
            $data = [
                'name'=>request('name'),
                'email'=>request('email'),
                'password'=>request('password')
            ];
    
            $userId = User::create($data);

            playlist::create([
                'name'=>'MyPlaylist',
                'user_id'=>$userId->id,
            ]);
            return redirect()->route('login.tampil')->with('success','akun anda berhasil dibuat');
        }
        else{
            return redirect()->route('register.tampil')->with('error','password dan konfirmasinya harus sama');
        }
    }

    function submitRegisPhone(Request $request){
        $request->validate([
            'name'=>'required|min:3|max:100',
            'telp'=>'required|numeric|regex:/^08[0-9]{9,10}$/',
            'password'=>'required|min:8|regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/'
        ]);

        if(request('password') === request('c_password')){
            $data = [
                'name'=>request('name'),
                'telp'=>request('telp'),
                'password'=>request('password')
            ];
    
            $userId = User::create($data);

            playlist::create([
                'name'=>'MyPlaylist',
                'user_id'=>$userId->id,
            ]);
            return redirect()->route('login.tampil')->with('success','akun anda berhasil dibuat');
        }
        else{
            return redirect()->route('register.tampil')->with('error','password dan konfirmasinya harus sama');
        }
    }
}
