<?php

namespace App\Sevices\Admin;

use Illuminate\Http\Request;
use App\Models\Movie;

class MovieService
{
    function getAll()
    {
        return Movie::all();
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
       

        $Movie->update($data);
        return $Movie;
    }
    function destroy($id)
    {
        $Movie = Movie::find($id);
        if (!$Movie) {
            throw new \Exception('not found Movie');
        }
     
        return $Movie->delete();

    }
}

?>