<?php

namespace App\Http\Controllers;

use App\Models\penyanyi;
use App\Models\playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class playlistController extends Controller
{
    //
    function store(){
        playlist::create([
            'user_id'=>Auth::user()->id,
            'name'=>request('name')
        ]);
        
        return redirect()->back();
    }

    function playlistedit(Request $request,playlist $playlist){
        
        if($request->hasFile('thumb')){
            Storage::delete('public/'.$playlist->thumb);
            $thumbPath = $request->file('thumb')->store('artist-images');
        }

        if($playlist->thumb == null){
            if($request->hasFile('thumb')){
                $thumbPath = $request->file('thumb')->store('artist-images');
                // Membuat slug berdasarkan nama

                // Menyusun data yang akan disimpan
                $data = [
                    'name' => $request->input('name'),
                    'thumb'=>$thumbPath
                ];
                $play = playlist::where('id',request('id'))->update($data);
                if ($play) {
                    return response()->json(['status' => 'success', 'message' => 'Song view count updated', 'name' => request('name')]);
                } else {
                    return response()->json(['status' => 'error', 'message' => 'Failed to update song view count'], 500);
                }
            }
        }
        $play = playlist::where('id',request('id'))->update([
            'name' => request('name'),
        ]);
        return redirect()->route('user.playlist',$request->input('name'));
    }
}
