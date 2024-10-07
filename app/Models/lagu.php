<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lagu extends Model
{
    /** @use HasFactory<\Database\Factories\LaguFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'audio',
        'thumb',
        'slug',
    ];
    
    public function plagu()
    {
        return $this->belongsToMany(Penyanyi::class, 'penyanyi_lagu', 'lagu_id','penyanyi_id');
    }
    public function lgenre()
    {
        return $this->belongsToMany(Genre::class, 'lagu_genre', 'lagu_id','genre_id');
    }
    public function playlagu()
    {
        return $this->belongsToMany(Playlist::class, 'playlsit_lagu', 'lagu_id','playlist_id');
    }
}
