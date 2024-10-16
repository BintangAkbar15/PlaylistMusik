<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likedSong extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'lagu_id'
    ];

    public function user()
{
    return $this->belongsToMany(User::class, 'liked_songs', 'lagu_id', 'user_id');
}

public function lagu()
{
    return $this->belongsToMany(Lagu::class, 'liked_songs', 'user_id', 'lagu_id');
}

}
