<?php

namespace App\Http\Controllers;

use App\Models\lagu;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class laguController extends Controller
{
    //
    function store(Request $request){
        $request->validate([
            'name' =>'required',
            'audio' =>'required|extensions:mp3, wav, aac, flac, ogg, aiff, wma, alac, opus, amr, m4a',
            'thumb' =>'required|extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
            'color'=>'required',
            'negara'=>'required',
            'debut'=>'required',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'audio'=>$request->input('audio'),
            'thumb'=>$request->input('thumb'),
            'negara'=>$request->input('negara'),
            'color'=>$request->input('color'),
            'debut'=>$request->input('debut'),
            'slug'=>$request->input('slug'),
        ];
        lagu::create($data);
        return redirect()->route('kelola.lagu')->with('success','Lagu Berhasil Ditambahkan');
    }
    function index(){
        return view('admin.lagu.kelola',['lagu'=>lagu::all()]);
    }
    function update(Request $request,string $id){
        $request->validate([
            'name' =>'required',
            'audio' =>'required|extensions:mp3, wav, aac, flac, ogg, aiff, wma, alac, opus, amr, m4a',
            'thumb' =>'required|extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'audio'=>$request->input('audio'),
            'thumb'=>$request->input('thumb'),
            'negara'=>$request->input('negara'),
            'color'=>$request->input('color'),
            'debut'=>$request->input('debut'),
            'slug'=>$request->input('slug'),
        ];
        lagu::where('id',$id)->update($data);
        return redirect()->route('kelola.lagu')->with('success','Lagu Berhasil Diubah');
    }
    function destroy(string $id){
        lagu::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
