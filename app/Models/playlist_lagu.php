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

    protected $with =[
        'penyanyi',
        'playlist'
    ];
    public function penyanyi()
    {
        return $this->belongsToMany(Penyanyi::class, 'penyanyi', 'penyanyi_id', 'playlist_id');
    }
    public function playlist()
    {
        return $this->belongsToMany(Playlist::class, 'playlists', 'playlist_id', 'penyanyi_id');
    }
}
