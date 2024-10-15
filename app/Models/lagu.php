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

    protected $table = 'lagu';
    protected $fillable = [
        'name',
        'audio',
        'audio_length',
        'thumb',
        'slug',
    ];

    protected $with =[
        'plagu',
        'lgenre',
        'playlagu'
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
        return $this->belongsToMany(playlist::class, 'playlsit_lagu', 'lagu_id','playlist_id');
    }
    public function user()
    {
        return $this->belongsToMany(playlist::class, 'liked_songs', 'lagu_id','user_id');
    }
}
