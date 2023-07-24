<?php

namespace App\Sevices\Admin;

use App\Models\Movie;

class MovieService
{
    function getAll()
    {
        return Movie::paginate(10);
    }
    //store
    function create($data)
    {
        Movie::create($data);
        return true;
    }
    function edit($id)
    {
        return Movie::find($id);
    }
    function update($id, $data)
    {
        $Movie = Movie::find($id);
        if (!$Movie) {
            throw new \Exception('not found Movie');
        }
        if (!empty($Movie->image)) {
            unlink($Movie->image);
        }

        $Movie->update($data);
        return $Movie;
    }
    function destroy($id)
    {
        $Movie = Movie::find($id);
        if (!$Movie) {
            throw new \Exception('not found Movie');
        }
        if (!empty($Movie->image)) {
            unlink($Movie->image);
        }
        return $Movie->delete();

    }
}

?>