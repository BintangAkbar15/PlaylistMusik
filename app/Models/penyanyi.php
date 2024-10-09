<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penyanyi extends Model
{
    /** @use HasFactory<\Database\Factories\PenyanyiFactory> */
    use HasFactory;
    protected $table = 'penyanyi';
    protected $fillable = [
        'name',
        'slug',
        'thumb',
        'negara',
        'debut',
    ];
    public function plagu()
    {
        return $this->belongsToMany(Lagu::class, 'penyanyi_lagu', 'penyanyi_id','lagu_id');
    }
}
