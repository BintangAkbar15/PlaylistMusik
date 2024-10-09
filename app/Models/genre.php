<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsToMany(Lagu::class, 'lagu_genre', 'genre_id','lagu_id');
    }
}
