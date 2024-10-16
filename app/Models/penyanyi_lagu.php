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

    public function penyanyis()
    {
        return $this->belongsToMany(penyanyi::class, 'penyanyi', 'penyanyi_id', 'lagu_id');
    }
    public function lagus()
    {
        return $this->belongsToMany(lagu::class, 'lagu', 'lagu_id', 'penyanyi_id');
    }
}
