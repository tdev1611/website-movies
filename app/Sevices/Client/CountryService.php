<?php

namespace App\Sevices\Client;

use App\Models\Country;


class CountryService
{
    function getAll()
    {
        return Country::where('status', 1)->orderBy('id', 'desc')->get();
    }

    function getCategory($slug)
    {

        $category = Country::where('slug', $slug)->first();
        if(!$category) {
            abort(404);
        }
         return $category;
    
    }

}


?>