<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
