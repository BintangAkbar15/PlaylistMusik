<?php

namespace App\Models;

use App\Models\lagu;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class genre extends Model
{
    /** @use HasFactory<\Database\Factories\GenreFactory> */
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'color',
    ];

    
    public function lgenre()
    {
        return $this->belongsToMany(lagu::class, 'lagu_genres', 'genre_id','lagu_id');
    }
}
