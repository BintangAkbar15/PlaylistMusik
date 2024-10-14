<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lagu_genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'lagu_id',
        'genre_id',
    ];

    protected $table = 'lagu_genres';

    public function lagu()
    {
        return $this->belongsToMany(Lagu::class, 'lagu', 'lagu_id', 'genre_id');
    }
    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'genres', 'genre_id', 'lagu_id');
    }
}
