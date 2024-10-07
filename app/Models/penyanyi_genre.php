<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class penyanyi_genre extends Model
{
    use HasFactory;
    protected $fillable = [
        'penyanyi_id',
        'genre_id',
    ];

    public function penyanyi()
    {
        return $this->belongsToMany(Penyanyi::class, 'penyanyi', 'penyanyi_id', 'genre_id');
    }
    public function genre()
    {
        return $this->belongsToMany(Genre::class, 'genres', 'genre_id', 'penyanyi_id');
    }
}
