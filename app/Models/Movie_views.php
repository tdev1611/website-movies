<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie_views extends Model
{
    use HasFactory;
    protected $table = 'movie_views';

    protected $fillable = [
        'view_count',
        'movie_id',
    ];

    public function movies()
    {

        return $this->belongsTo(Movie::class,'movie_id','id');

    }
}