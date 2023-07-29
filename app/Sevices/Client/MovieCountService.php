<?php

namespace App\Sevices\Client;

use App\Models\Movie_views;
use App\Models\Movie;

class MovieCountService
{
    function getMoviesCount()
    {

        $movies = Movie_views::orderBy('view_count', 'desc')->take(6)->get();

        return $movies;
    }

    //by slug


}


?>