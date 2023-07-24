<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'desc',
        'status',
        'slug',
        'updated_at'
    ];

    function movies()
    {
        return $this->hasMany(Movie::class)->where('status', 1)->limit(10);
    }

}