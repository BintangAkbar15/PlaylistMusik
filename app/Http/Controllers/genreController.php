<?php

namespace App\Http\Controllers;

use App\Models\genre;
use Illuminate\Http\Request;

class genreController extends Controller
{
    function store(Request $request){
        $request->validate([
            'name' =>'required',
            'color'=>'required',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'color'=>$request->input('color'),
            'slug'=>$request->input('slug'),
        ];
        genre::create($data);
        return redirect()->route('kelola.genre')->with('success','genre Berhasil Ditambahkan');
    }
    function index(){
        return view('admin.genre.kelola',['genre'=>genre::all()]);
    }
    function update(Request $request,string $id){
        $request->validate([
            'name' =>'required',
            'color'=>'required',
            'slug'=>'required',
        ],[

        ]);
        $data = [
            'name'=>$request->input('name'),
            'color'=>$request->input('color'),
            'slug'=>$request->input('slug'),
        ];
        genre::where('id',$id)->update($data);
        return redirect()->route('kelola.genre')->with('success','genre Berhasil Diubah');
    }
    function destroy(string $id){
        genre::where('id',$id)->delete();
        return redirect()->back()->with('success','berhasil menghapus data');
    }
}
