<?php

namespace App\Sevices\Admin;

use App\Models\Genre;

class GenreService
{
    function getAll()
    {
        return Genre::paginate(10);

    }

    //store
    function create($data)
    {
        Genre::create($data);
        return true;
    }

    function edit($id)
    {
        return Genre::find($id);

    }

    function update($id, $data)
    {
        $Genre = Genre::find($id);
        if (!$Genre) {
            throw new \Exception('not found Genre');
        }

        $Genre->update($data);
        return $Genre;
    }

    function destroy($id)
    {
        $Genre = Genre::find($id);
        if (!$Genre) {
            throw new \Exception('not found Genre');
        }
        return $Genre->delete();


    }


}


?>