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
    public function penyanyi()
    {
        return $this->belongsToMany(Penyanyi::class, 'penyanyi', 'penyanyi_id', 'lagu_id');
    }
    public function lagu()
    {
        return $this->belongsToMany(Lagu::class, 'lagu', 'lagu_id', 'penyanyi_id');
    }
}
