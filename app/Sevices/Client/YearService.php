<?php

namespace App\Sevices\Client;

use App\Models\Movie;

class YearService
{
    function getMovies($year)
    {
        return Movie::where('year', $year)->orderBy('id', 'desc')->paginate(12);
    }

    //by slug
    

}


?>