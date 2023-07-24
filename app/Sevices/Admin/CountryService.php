<?php

namespace App\Sevices\Admin;

use App\Models\Country;


class CountryService
{
    function getAll()
    {
        return Country::paginate(10);

    }

    //store
    function create($data)
    {
        Country::create($data);
        return true;
    }

    function edit($id)
    {
        return Country::find($id);

    }

    function update($id, $data)
    {
        $Country = Country::find($id);
        if (!$Country) {
            throw new \Exception('not found Country');
        }

        $Country->update($data);
        return $Country;
    }

    function destroy($id)
    {
        $Country = Country::find($id);
        if (!$Country) {
            throw new \Exception('not found Country');
        }
        return $Country->delete();


    }


}


?>