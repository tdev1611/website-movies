<?php

namespace App\Sevices\Client;

use App\Models\Category;

class CategoryService
{
    function getAll()
    {
        return Category::where('status', 1)->orderBy('id', 'desc')->paginate(4);
    }

    function getCategory($slug)
    {

        $category = Category::where('slug', $slug)->first();
        if(!$category) {
            abort(404);
        }
         return $category;
    
    }


}


?>