<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    /** @use HasFactory<\Database\Factories\PlaylistFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'user_id',
    ];

    protected $with =[
        'playlagu',
        'user'
    ];
    public function playlagu()
    {
        return $this->belongsToMany(Lagu::class, 'playlist_lagu', 'playlist_id','lagu_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
