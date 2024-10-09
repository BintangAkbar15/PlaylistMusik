<?php

namespace App\Http\Controllers;

use App\Models\penyanyi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class penyanyiController extends Controller
{
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
        $request->validate([
            'name' =>'required',
            'thumb' =>'required|image|mimes:jpg,jpeg,png,gif,bmp,tiff,webp,svg,heic,raw,psd|max:5012',
            'negara'=>'required',
            'debut'=>'required',
        ],[

        ]);
        $thumbPath = $request->file('thumb')->store('artist-images');

        // Membuat slug berdasarkan nama
        $slug = $this->createSlug($request->input('name'));

        // Menyusun data yang akan disimpan
        $data = [
            'name' => $request->input('name'),
            'thumb' => $thumbPath, // Menggunakan path yang benar
            'negara' => $request->input('negara'),
            'debut' => $request->input('debut'),
            'slug' => $slug,
        ];
        penyanyi::create($data);
        return redirect()->route('kelola.penyanyi')->with('success','penyanyi Berhasil Ditambahkan');
    }
    function index(){
        return view('admin.penyanyi.kelola',['data'=>penyanyi::all()]);
    }
    
    function update(Request $request,string $id,penyanyi $penyanyi){
        $slug = $this->createSlug($request->input('name'));
        $validate = $request->validate([
            'name' =>'required',
            'negara'=>'required',
            'debut'=>'required',
            'thumb' => 'image|mimes:jpeg,png,jpg,gif,svg',
        ]); 
        if($request->hasFile('thumb')){
            Storage::delete('public/'.$penyanyi->thumb);
            $thumbPath = $request->file('thumb')->store('artist-images');
        }
        
        penyanyi::where('id',$id)->update($validate);
        return redirect()->route('kelola.penyanyi')->with('success','penyanyi Berhasil Diubah');
    }
    function destroy(string $id){
        penyanyi::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
