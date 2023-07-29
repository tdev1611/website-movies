<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_eng',
        'desc',
        'status',
        'definition',
        'feature',
        'year',
        'subtitles',
        'slug',
        'image',
        'category_id',
        'genre_id',
        'country_id'
    ];


    function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    function genre()
    {
        return $this->belongsTo(Genre::class, 'genre_id', 'id');
    }
    function country()
    {
        return $this->belongsTo(Country::class, 'country_id', 'id');
    }


    // movuie count
    public function movieCount() {

        return $this->hasMany(Movie_views::class);

    }

}