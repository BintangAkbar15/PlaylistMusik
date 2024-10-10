<?php

namespace App\Http\Controllers;

use App\Models\lagu;
use App\Models\genre;
use App\Models\penyanyi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use FFMpeg\FFMpeg as FFMpegFacade;

class laguController extends Controller
{
    //
    function createSlug($string) {
        // Tambahkan strip sebelum huruf besar yang tidak di awal string
        $string = preg_replace('/([a-z])([A-Z])/', '$1-$2', $string);
        // Ubah ke huruf kecil
        $string = strtolower($string);
        // Hapus karakter selain huruf, angka, dan spasi
        $string = preg_replace('/[^a-z0-9\s]/', '', $string);
        // Ganti satu atau lebih spasi dengan strip
        $string = preg_replace('/\s+/', '-', $string);
        // Hapus strip di awal atau akhir (jika ada)
        $string = trim($string, '-');
        
        return $string;
    }

    function store(Request $request){
        //create lagu
        $request->validate([
            'name' =>'required',
            'audio' =>'required|mimes:mp3, wav,aac,flac,ogg,aiff,wma,alac,opus,amr,m4a',
            'thumb' =>'required|image|mimes:jpg,jpeg,png,gif,bmp,tiff,webp,svg,heic,raw,psd|max:5012',
        ],[

        ]);
        
        $thumbPath = $request->file('thumb')->store('song-images');
        $audioPath = $request->file('audio')->store('song');

        $slug = $this->createSlug($request->input('name'));
        $data = [
            'name'=>$request->input('name'),
            'audio'=>$audioPath,
            'audio_length'=>$request->input('track'),
            'thumb'=>$thumbPath,
            'slug'=>$slug,
        ];
        lagu::create($data);


        return redirect()->route('kelola.lagu')->with('success','Lagu Berhasil Ditambahkan');
    }
    function storeGenre(Request $request){
        $request->validate([
            'name' =>'required|unique:genres',
            'color'=>'required|unique:genres',
        ],[
        
        ]);
        $slug = $this->createSlug($request->input('name'));

        $data = [
            'name'=>$request->input('name'),
            'color'=>$request->input('color'),
            'slug'=>$slug,
        ];
        $genre = genre::create($data);
        return response()->json($genre);
    }
    function storePenyanyi(Request $request){
            $request->validate([
                'name' =>'required',
                'negara'=>'required',
                'debut'=>'required',
            ],[
    
            ]);
    
            // Membuat slug berdasarkan nama
            $slug = $this->createSlug($request->input('name'));
    
            // Menyusun data yang akan disimpan
            $data = [
                'name' => $request->input('name'),
                'negara' => $request->input('negara'),
                'debut' => $request->input('debut'),
                'slug' => $slug,
            ];
            $penyanyi = penyanyi::create($data);
            return response()->json($penyanyi);
    }
    function index(){
        return view('admin.lagu.kelola',['data'=>lagu::all()]);
    }

    function update(Request $request,string $id){
        $request->validate([
            'name' =>'required',
            'audio' =>'required|extensions:mp3, wav, aac, flac, ogg, aiff, wma, alac, opus, amr, m4a',
            'thumb' =>'required|extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
        ],[

        ]);
        $slug = $this->createSlug($request->input('slug'));

        $data = [
            'name'=>$request->input('name'),
            'audio'=>$request->input('audio'),
            'thumb'=>$request->input('thumb'),
            'slug'=>$slug,
        ];
        lagu::where('id',$id)->update($data);
        return redirect()->route('kelola.lagu')->with('success','Lagu Berhasil Diubah');
    }
    function destroy(string $id){
        lagu::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
