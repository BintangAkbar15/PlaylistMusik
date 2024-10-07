<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class histori extends Model
{
    use HasFactory;

    protected $table = 'histori';
    protected $fillable = [
        'search',
        'date',
    ];
}
