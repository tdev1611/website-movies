<?php

namespace App\Sevices\Client;

use App\Models\Movie;


class DetailService
{
 

    function show($slug)
    {
        $movie = Movie::where('slug', $slug)->where('status',1)->first();
        if (!$movie) {
             abort(404);
        }
        return $movie;
    }



}


?>