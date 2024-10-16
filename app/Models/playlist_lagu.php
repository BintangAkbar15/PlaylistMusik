<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist_lagu extends Model
{
    use HasFactory;
    protected $table = 'playlist_lagu';
    protected $fillable = [
        'playlist_id',
        'lagu_id',
    ];
    public function lagu()
    {
        return $this->belongsToMany(lagu::class, 'playlist_lagu', 'penyanyi_id', 'playlist_id');
    }
    public function playlist()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_lagu', 'playlist_id', 'penyanyi_id');
    }
}
