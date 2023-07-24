<?php

namespace App\Sevices\Admin;

use App\Models\Category;

class CategoryService
{
    function getAll()
    {
        return Category::paginate(10);

    }

    //store
    function create($data)
    {
        Category::create($data);
        return true;
    }

    function edit($id)
    {
        return Category::find($id);

    }

    function update($id, $data)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new \Exception('not found category');
        }

        $category->update($data);
        return $category;
    }

    function destroy($id)
    {
        $category = Category::find($id);
        if (!$category) {
            throw new \Exception('not found category');
        }
        return $category->delete();


    }


}


?>