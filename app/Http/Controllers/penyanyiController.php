<?php

namespace App\Http\Controllers;

use App\Models\penyanyi;
use Illuminate\Http\Request;

class penyanyiController extends Controller
{
    function store(Request $request){
        $request->validate([
            'name' =>'required',
            'thumb' =>'required|extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
            'negara'=>'required',
            'debut'=>'required',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'thumb'=>$request->input('thumb'),
            'negara'=>$request->input('negara'),
            'debut'=>$request->input('debut'),
            'slug'=>$request->input('slug'),
        ];
        penyanyi::create($data);
        return redirect()->route('kelola.penyanyi')->with('success','penyanyi Berhasil Ditambahkan');
    }
    function index(){
        return view('admin.penyanyi.kelola',['penyanyi'=>penyanyi::all()]);
    }
    function update(Request $request,string $id){
        $request->validate([
            'name' =>'required',
            'thumb' =>'required|extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
            'negara'=>'required',
            'debut'=>'required',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'thumb'=>$request->input('thumb'),
            'negara'=>$request->input('negara'),
            'debut'=>$request->input('debut'),
            'slug'=>$request->input('slug'),
        ];
        penyanyi::where('id',$id)->update($data);
        return redirect()->route('kelola.penyanyi')->with('success','penyanyi Berhasil Diubah');
    }
    function destroy(string $id){
        penyanyi::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
