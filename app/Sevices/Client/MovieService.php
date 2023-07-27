<?php

namespace App\Sevices\Client;

use App\Models\Movie;

class MovieService
{
    function getAll()
    {
        return Movie::where('status', 1)->orderBy('id', 'desc')->get();
    }


    public function moviesFeature  () {
        $movies = Movie::where('status', 1)->where('feature',1)->orderBy('id', 'desc')->get();
        
        return $movies;
    }

    function getCategory($slug)
    {

        $category = Movie::where('slug', $slug)->first();
        if(!$category) {
            abort(404);
        }
         return $category;
    
    }

}


?>