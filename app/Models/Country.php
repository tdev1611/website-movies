<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'desc',
        'status',
        'slug'
    ];
    function movies()
    {
        return $this->hasMany(Movie::class)->where('status', 1)->limit(10);
    }
}
