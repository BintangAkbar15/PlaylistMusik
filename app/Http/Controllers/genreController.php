<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class genreController extends Controller
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
        genre::create($data);
        return redirect()->route('kelola.genre')->with('success','genre Berhasil Ditambahkan');
    }
    function index(){
        return view('admin.genre.kelola',['data'=>genre::all()]);
    }
    function update(Request $request,string $id){
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
        genre::where('id',$id)->update($data);
        return redirect()->route('kelola.genre')->with('success','genre Berhasil Diubah');
    }
    function destroy(string $id){
        genre::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
