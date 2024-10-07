<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyanyi_lagu extends Model
{
    use HasFactory;
    protected $table = 'penyanyi_lagu';
    protected $fillable = [
        'penyanyi_id',
        'lagu_id',
    ];
}
