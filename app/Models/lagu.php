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
}
