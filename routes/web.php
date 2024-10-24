<?php

use Carbon\Carbon;
use App\Models\log;
use App\Models\lagu;
use App\Models\User;
use App\Models\genre;
use App\Models\penyanyi;
use App\Models\playlist;
use App\Models\playlist_lagu;
use App\Models\likedSong;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\laguController;
use App\Http\Controllers\userController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\penyanyiController;
use App\Http\Controllers\playlistController;


Route::middleware('guest')->group(function () {

    Route::get('/', function(){
        return view('welcome');
    })->name('landing-page');
    
    //menampilkan bagian register user
    Route::get('/register/email', function () {
        return view('user.emailregister');
    })->name('register.email.tampil');
    
        
    Route::get('/register/phone', function(){
        return view('user.phoneregister');
    })->name('register.phone.tampil');
    
    //submit register
    Route::post('/register',[AuthController::class,'submitRegisEmail'])->name('regis.email.submit');
    Route::post('/register',[AuthController::class,'submitRegisPhone'])->name('regis.phone.submit');
    
    Route::get('/login', function () {
        if(Auth::check()){
            if(Auth::user()->is_admin){
                return view('admin.dashboard');
            }
            return view('user.dashboard');
        }
        return view('user.login');
    })->name('login.tampil');
    
    Route::post('/login',[AuthController::class,'submitLogin'])->name('login.submit');
});

Route::middleware('auth')->group(function(){
    Route::middleware('access:false')->group(function(){
        Route::get('/user/dashboard', [userController::class,'index'])->name('userDashboard');

        Route::post('/user/search', [userController::class,'search'])->name('user.search');

        Route::get('/user/artist/{slug}', [userController::class, 'songs'])->name('artist');
        Route::get('/user/artist', [userController::class, 'Asongs'])->name('artist.all');

        Route::get('/user/genre', [userController::class, 'gsongs'])->name('genre.all');
        
        Route::post('/user/like', [userController::class, 'likedsong'])->name('like.song');
        Route::post('/user/unlike', [userController::class, 'unlikesong'])->name('like.song');

        Route::get('/user/playlist/edit/{name}', function($name, playlist $playlist){
            $playlists = playlist::where('user_id',Auth::user()->id)->get();
            $artists = penyanyi::all();
            $hour = Carbon::now('Asia/Jakarta')->format('H');
            $jLagu = playlist_lagu::whereIn('playlist_id',$playlist->pluck('id'))->count();
            $lLagu = likedSong::where('user_id',Auth::user()->id)->count();
            $lagulike = likedSong::with('user')->where('user_id',Auth::user()->id)->pluck('id');
            $genre = genre::all();
    
    
            $playlist = playlist::where('name', $name)->firstOrFail();
            return view('user.edit',['id'=>$playlist->id,'data'=>$playlist,'playlists'=>$playlists,'hour'=>$hour,'jlagu'=>$jLagu,'lLagu'=>$lLagu,'like'=>$lagulike]);
        })->name('playlist.change');
        
        Route::get('/user/genre/{slug}', [userController::class, 'genre'])->name('user.genre');
        
        Route::get('/user/playlist/{name}', [userController::class, 'playlist'])->name('user.playlist');

        Route::post('/user/playlist/{id}', [playlistController::class, 'playlistedit'])->name('playlist.edit');
        
        Route::post('/song/seen', [userController::class, 'seen'])->name('playlist');

        Route::post('/user/playlist/new', [playlistController::class,'store'])->name('playlist.add');

        Route::get('/user/genre/{name}', [userController::class, 'genre'])->name('user.genre');
    });

    Route::middleware('access:true')->group(function(){
        Route::get('/admin/dashboard', function () {
            $lagu =  lagu::with('plagu')->orderBy('dilihat','asc')->take(3)->get();
            $data = [lagu::all()->count(), User::where('is_admin',0)->get()->count(),log::where('status','login')->count(),penyanyi::all()->count()];
            return view('admin.dashboard',['data'=>$data,'rank'=>$lagu]);
        })->name('adminDashboard');

        //genre section
        Route::get('/admin/genre', [genreController::class,'index'])->name('kelola.genre');
        
        Route::get('/admin/genre/tambah', function(){
            do {
                $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                $colorExists = genre::where('color', $color)->exists(); // Check if the color exists
            } while ($colorExists); // Repeat the loop if the color already exists
            return view('admin.genre.add',['color'=>$color]);
        })->name('genre.add');

        Route::get('/admin/genre/edit/{genre:slug}', function(genre $genre){
            $gen = genre::find($genre['id']);
            return view('admin.genre.edit',['id'=>$genre->id,'data'=>$gen]);
        })->name('genre.edit');

        Route::post('/admin/genre/edit/{id}', [genreController::class,'update'])->name('genre.editNew');

        Route::post('/admin/genre/tambah', [genreController::class,'store'])->name('genre.addNew');

        Route::get('/admin/genre/delete/{id}', [genreController::class,'destroy'])->name('genre.delete');
        //end genre section

        //lagu section
        Route::get('/admin/lagu', [laguController::class,'index'])->name('kelola.lagu');
        
        Route::get('/admin/lagu/delete/{id}', [laguController::class,'destroy'])->name('delete.lagu');

        Route::post('/admin/lagu/tambah', [laguController::class,'store'])->name('lagu.addNew');

        Route::post('/admin/lagu/edit/new/{id}', [laguController::class,'update'])->name('lagu.editNew');

        //menambahkan genre dari lagu
        Route::post('/admin/lagu/genre/add', [laguController::class,'storeGenre'])->name('lagu.add.genre');

        //menambahkan penyanyi dari lagu
        Route::post('/admin/lagu/penyanyi/add', [laguController::class,'storePenyanyi'])->name('lagu.add.penyanyi');

        Route::get('/admin/lagu/tambah', function(){
            do {
                $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
                $colorExists = genre::where('color', $color)->exists(); // Check if the color exists
            } while ($colorExists); // Repeat the loop if the color already exists
            return view('admin.lagu.add',['data'=>genre::all(),'penyanyi'=>penyanyi::all(),'color'=>$color]);
        })->name('lagu.add');

        Route::get('/admin/lagu/edit/{lagu:slug}', function(lagu $lagu){
            $lag = lagu::with(['lgenre','plagu'])->find($lagu['id']);
            return view('admin.lagu.edit',['lagu'=>$lag,'data'=>genre::all(),'penyanyi'=>penyanyi::all()]);
        })->name('lagu.edit');
        
        //end lagu section

        //penyanyi section
        Route::get('/admin/penyanyi', [penyanyiCOntroller::class,'index'])->name('kelola.penyanyi');
        
        Route::get('/admin/penyanyi/delete/{id}', [penyanyiCOntroller::class,'destroy'])->name('penyanyi.delete');

        Route::post('/admin/penyanyi/tambah', [penyanyiController::class,'store'])->name('penyanyi.addNew');

        Route::post('/admin/penyanyi/edit/{id}', [penyanyiController::class,'update'])->name('penyanyi.editNew');

        Route::get('/admin/penyanyi/tambah', function(){
            return view('admin.penyanyi.add');
        })->name('penyanyi.add');

        Route::get('/admin/penyanyi/edit/{penyanyi:slug}', function(penyanyi $penyanyi){
            $singer = penyanyi::find($penyanyi['id']);
            return view('admin.penyanyi.edit',['id'=>$penyanyi->id,'data'=>$singer]);
        })->name('penyanyi.edit');
        //end penyanyi section

        Route::get('/admin/log', function(){
            return view('log');
        })->name('log.user');


    });

    //Logout
    Route::post('/logout',[AuthController::class,'logout'])->name('logout');
});
