<?php

namespace App\Models;

use App\Models\genre;
use App\Models\penyanyi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class lagu extends Model
{
    /** @use HasFactory<\Database\Factories\LaguFactory> */
    use HasFactory;

    public function getRouteKeyName()
    {
        return 'slug'; // Menggunakan kolom slug untuk binding
    }
    protected $table = 'lagu';
    protected $fillable = [
        'name',
        'audio',
        'audio_length',
        'thumb',
        'slug',
    ];
    
    public function plagu()
    {
        return $this->belongsToMany(penyanyi::class, 'penyanyi_lagu', 'lagu_id','penyanyi_id');
    }
    public function lgenre()
    {
        return $this->belongsToMany(genre::class, 'lagu_genres', 'lagu_id','genre_id');
    }
    public function playlagu()
    {
        return $this->belongsToMany(Playlist::class, 'playlsit_lagu', 'lagu_id','playlist_id');
    }
}
