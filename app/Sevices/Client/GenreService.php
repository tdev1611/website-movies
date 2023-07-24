<?php

namespace App\Sevices\Client;

use App\Models\Genre;

class GenreService
{
    function getAll()
    {
        return Genre::where('status', 1)->orderBy('id', 'desc')->get();
    }

    function getCategory($slug)
    {

        $category = Genre::where('slug', $slug)->first();
        if(!$category) {
            abort(404);
        }
         return $category;
    
    }

}


?>