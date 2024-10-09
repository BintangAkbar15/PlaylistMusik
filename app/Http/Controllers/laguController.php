<?php

namespace App\Http\Controllers;

use App\Models\lagu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class laguController extends Controller
{
    //
    function store(){
        

    }
    function index(){
        return view('admin.lagu.kelola',['lagu'=>lagu::all()]);
    }
    function update(){

    }
    function destroy(string $id){
        lagu::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
