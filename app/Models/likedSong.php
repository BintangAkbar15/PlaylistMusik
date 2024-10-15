<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likedSong extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsToMany( User::class, 'users', 'user_id', 'lagu_id');
    }
    public function lagu()
    {
        return $this->belongsToMany(Lagu::class, 'lagu', 'lagu_id', 'user_id');
    }
}
