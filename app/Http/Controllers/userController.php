<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\lagu;
use App\Models\genre;
use App\Models\penyanyi;
use App\Models\penyanyi_lagu;
use App\Models\playlist;
use App\Models\playlist_lagu;
use App\Models\lagu_genre;
use App\Models\likedSong;
use Illuminate\Http\Request;
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
        $genre = genre::all();
        
        
        if($lLagu > 0){
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $genreLagu = lagu_genre::whereIn('lagu_id',$likedSongs)->pluck('genre_id');
            $laguGenre = lagu_genre::whereIn('genre_id',$genreLagu)->pluck('lagu_id');
            $rec = lagu::with(['plagu'])->whereIn('id',$laguGenre)->get();
        }
        else{
            $rec = lagu::where('dilihat','>','0')->orderBy('dilihat','asc')->get();
        }
        return view('user.dashboard',['playlists'=>$playlist,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'artists'=>$artists,'genre'=>$genre,'recomend'=>$rec]);
    }

    function songs(penyanyi $artist, string $slug) {
        // Ambil penyanyi berdasarkan slug
        $artist = penyanyi::where('slug', $slug)->firstOrFail();
        $playlist = playlist::where('user_id',Auth::user()->id)->get();
        $artists = penyanyi::all();
        $hour = Carbon::now('Asia/Jakarta')->format('H');
        $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
        $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
        $lagulike = likedSong::with('user')->where('user_id',Auth::user()->id)->pluck('id');
        $genre = genre::all();
        if($lLagu > 0){
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $genreLagu = lagu_genre::whereIn('lagu_id',$likedSongs)->pluck('genre_id');
            $laguGenre = lagu_genre::whereIn('genre_id',$genreLagu)->pluck('lagu_id');
            $rec = lagu::with(['plagu'])->whereIn('id',$laguGenre)->get();
        }
        else{
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $rec = lagu::where('dilihat','>','0')->orderBy('dilihat','asc')->get();
        }
    
        // Ambil lagu-lagu yang terkait dengan penyanyi tersebut
        $lagu = penyanyi::with(['plagu'])->where('id', $artist->id)->get();
    
        // Kirimkan data lagu ke view
        return view('user.artist', ['lagu' => $lagu,'playlists'=>$playlist,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'like'=>$lagulike,'recomend'=>$rec,'liked'=>$likedSongs]);
    
    }
    function Asongs() {
        // Ambil penyanyi berdasarkan slug
        $playlist = playlist::where('user_id',Auth::user()->id)->get();
        $artists = penyanyi::all();
        $hour = Carbon::now('Asia/Jakarta')->format('H');
        $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
        $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
        $lagulike = likedSong::with('user')->where('user_id',Auth::user()->id)->pluck('id');
        $genre = genre::all();
        if($lLagu > 0){
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $genreLagu = lagu_genre::whereIn('lagu_id',$likedSongs)->pluck('genre_id');
            $laguGenre = lagu_genre::whereIn('genre_id',$genreLagu)->pluck('lagu_id');
            $rec = lagu::with(['plagu'])->whereIn('id',$laguGenre)->get();
        }
        else{
            $rec = lagu::where('dilihat','>','0')->orderBy('dilihat','asc')->get();
        }

        // Kirimkan data lagu ke view
        return view('user.artistsong', ['artists' => $artists,'playlists'=>$playlist,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'like'=>$lagulike]);
    }

    function genre(string $slug) {
        // Ambil penyanyi berdasarkan slug
        $genres = genre::where('slug', $slug)->firstOrFail();
        $playlist = playlist::where('user_id',Auth::user()->id)->get();
        $hour = Carbon::now('Asia/Jakarta')->format('H');
        $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
        $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
        $lagulike = likedSong::with('user')->where('user_id',Auth::user()->id)->pluck('id');
        $genre = genre::all();
        $laguGen = lagu_genre::where('genre_id',$genres->id)->pluck('lagu_id');
        $plagu = penyanyi_lagu::whereIn('lagu_id',$laguGen)->pluck('penyanyi_id'); 
        $artists = penyanyi::whereIn('id',$plagu)->get();
        if($lLagu > 0){
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $genreLagu = lagu_genre::whereIn('lagu_id',$likedSongs)->pluck('genre_id');
            $laguGenre = lagu_genre::whereIn('genre_id',$genreLagu)->pluck('lagu_id');
            $rec = lagu::with(['plagu'])->whereIn('id',$laguGenre)->get();
        }
        else{
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $rec = lagu::where('dilihat','>','0')->orderBy('dilihat','asc')->get();
        }
    
        // Ambil lagu-lagu yang terkait dengan penyanyi tersebut
        $lagu = lagu_genre::with(['lagu','genre'])->where('genre_id', $genres->id)->get();
    
        // Kirimkan data lagu ke view
        return view('user.genre', ['lagu' => $lagu,'playlists'=>$playlist,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'like'=>$lagulike,'genre'=>$genres,'artist'=>$artists,'recomend'=>$rec]);
    }
    

    function playlist(playlist $playlist, string $slug){
        $playlists = playlist::where('user_id',Auth::user()->id)->get();
        $artists = penyanyi::all();
        $hour = Carbon::now('Asia/Jakarta')->format('H');
        $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
        $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
        $lagulike = likedSong::with('user')->where('user_id',Auth::user()->id)->pluck('id');
        $genre = genre::all();
    
        if($lLagu > 0){
            $likedSongs = likedSong::where('user_id',Auth::user()->id)->pluck('lagu_id');
            $genreLagu = lagu_genre::whereIn('lagu_id',$likedSongs)->pluck('genre_id');
            $laguGenre = lagu_genre::whereIn('genre_id',$genreLagu)->pluck('lagu_id');
            $rec = lagu::with(['plagu'])->whereIn('id',$laguGenre)->get();
        }
        else{
            $rec = lagu::where('dilihat','>','0')->orderBy('dilihat','asc')->get();
        }
         
        // Ambil lagu-lagu yang terkait dengan penyanyi tersebut
        $lagu = playlist_lagu::with(['lagu','playlist'])->where('playlist_id', $playlist->id)
                    ->get();
        $pname = playlist::where('name',$slug)->get();
    
        // Kirimkan data lagu ke view
        return view('user.playlist', ['pname'=>$pname,'lagu' => $lagu,'playlists'=>$playlists,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'like'=>$lagulike]);
    }

    public function likedsong(Request $request)
{
    // Validasi data yang masuk
    $request->validate([
        'song_id' => 'required|exists:lagu,id',  // Pastikan 'lagu_id' ada di tabel lagu
    ]);

    // Simpan data ke tabel likedSong
    $like = likedSong::create([
        'user_id' => Auth::user()->id,
        'lagu_id' => $request->song_id // Ambil song_id dari request
    ]);

    // Kembalikan response JSON
    return response()->json([
        'message' => 'Song liked successfully',
        'like' => $like
    ]);
}


    public function seen(Request $request)
    {
        $songId = $request->input('id'); // Mengambil ID lagu dari request

        // Update nilai 'dilihat' secara langsung
        $see = lagu::where('id', $songId)->increment('dilihat');

        // Cek jika update berhasil
        if ($see) {
            return response()->json(['status' => 'success', 'message' => 'Song view count updated', 'song_id' => $songId]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Failed to update song view count'], 500);
        }
}

}
