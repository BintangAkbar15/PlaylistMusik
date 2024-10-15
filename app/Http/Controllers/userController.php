<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\lagu;
use App\Models\penyanyi;
use App\Models\playlist;
use App\Models\likedSong;
use Illuminate\Http\Request;
use App\Models\playlist_lagu;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    function index(){
        $playlist = playlist::where('user_id',Auth::user()->id)->get();
        $artists = penyanyi::all();
        $hour = Carbon::now('Asia/Jakarta')->format('H');
        $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
        $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
        return view('user.dashboard',['playlists'=>$playlist,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'artists'=>$artists]);
    }

    function songs(){
        $lagu = lagu::all();

        return view('user.artist', ['lagu' => $lagu]);
    }
}
