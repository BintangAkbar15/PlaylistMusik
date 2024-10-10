<?php

namespace App\Http\Controllers;

use App\Models\lagu;
use App\Models\genre;
use App\Models\penyanyi;
use App\Models\lagu_genre;
use Illuminate\Http\Request;
use App\Models\penyanyi_lagu;
use FFMpeg\FFMpeg as FFMpegFacade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

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

    public function store(Request $request)
{
    // Validasi input
    $request->validate([
        'name' => 'required',
        'audio' => 'required|mimes:mp3,wav,aac,flac,ogg,aiff,wma,alac,opus,amr,m4a',
        'thumb' => 'required|image|mimes:jpg,jpeg,png,gif,bmp,tiff,webp,svg,heic,raw,psd|max:5012',
        'genre' => 'required|array', // Validasi genre sebagai array
        'genre.*' => 'exists:genres,id', // Pastikan setiap genre ada di database
        'penyanyi.*' => 'exists:penyanyi,id', // Pastikan setiap genre ada di database
    ], [
        // Pesan kesalahan khusus dapat ditambahkan di sini jika diinginkan
    ]);

    // Simpan file
    $thumbPath = $request->file('thumb')->store('song-images');
    $audioPath = $request->file('audio')->store('song');

    // Buat slug untuk nama lagu
    $slug = $this->createSlug($request->input('name'));

    // Buat array untuk menyimpan lagu
    $lagu = [
        'name' => $request->input('name'),
        'audio' => $audioPath,
        'audio_length' => $request->input('track'),
        'thumb' => $thumbPath,
        'slug' => $slug,
    ];

    // Simpan lagu ke database
    $laguModel = lagu::create($lagu);

    // Simpan genre yang dipilih
    // Pastikan Anda menggunakan ID dari genre yang dipilih
    foreach ($request->input('genre') as $genreId) {
        lagu_genre::create([
            'lagu_id' => $laguModel->id,
            'genre_id' => $genreId,
        ]);
    }

    penyanyi_lagu::create([
        'penyanyi_id' => $request->input('penyanyi'),
        'lagu_id' => $laguModel->id
    ]);

    return redirect()->route('kelola.lagu')->with('success', 'Lagu Berhasil Ditambahkan');
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
    function index(lagu $lagu){
        if (request('search-field')){
            $lag = lagu::with(['lgenre','plagu'])->where('name','like','%'.request('search-field').'%')->get();
        }else{
            $lag = lagu::with(['lgenre','plagu'])->get();
        }
        return view('admin.lagu.kelola',['data'=>$lag]);
    }

    function update(Request $request,string $id,lagu $lagu){
        $validate = $request->validate([
            'name' =>'required',
            'audio' =>'extensions:mp3, wav, aac, flac, ogg, aiff, wma, alac, opus, amr, m4a',
            'thumb' =>'extensions:jpg, jpeg, png, gif, bmp, tiff, webp, svg, heic, raw, psd',
            'slug' => $this->createSlug($request->input('slug'))
        ],[

        ]);

        $request->validate([
            'genre' => 'required|array', // Validasi genre sebagai array
            'genre.*' => 'exists:genres,id', // Pastikan setiap genre ada di database
            'penyanyi' => 'required', // Pastikan setiap genre ada di database
            'penyanyi.*' => 'exists:penyanyi,id', // Pastikan setiap genre ada di database
        ], [
            // Pesan kesalahan khusus dapat ditambahkan di sini jika diinginkan
        ]);

        $slug = $this->createSlug($request->input('slug'));
        if($request->hasFile('thumb')){
            Storage::delete('public/'.$lagu->thumb);
            $thumbPath = $request->file('thumb')->store('song-images');
        }
        if($request->hasFile('audio')){
            Storage::delete('public/'.$lagu->audio);
            $audioPath = $request->file('audio')->store('song-images');
        }
        
        lagu::where('id',$id)->update($validate);

        lagu_genre::where('lagu_id',$id)->delete();

        foreach ($request->input('genre') as $genreId) {
            lagu_genre::create([
                'lagu_id' => $id,
                'genre_id' => $genreId,
            ]);
        }
    
        penyanyi_lagu::where('lagu_id',$id)->update([
            'penyanyi_id' => $request->input('penyanyi'),
        ]);

        return redirect()->route('kelola.lagu')->with('success','Lagu Berhasil Diubah');
    }
    function destroy(string $id){
        lagu::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
