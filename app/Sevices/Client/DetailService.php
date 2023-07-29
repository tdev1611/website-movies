<?php

namespace App\Sevices\Client;

use App\Models\Movie;
use App\Models\Movie_views;


class DetailService
{


    function show($slug)
    {
        $movie = Movie::where('slug', $slug)->where('status', 1)->first();
        if (!$movie) {
            abort(404);
        }


        // viewCount
        $movieId = $movie->id;
        $movieCount = Movie_views::where('movie_id', $movieId)->first();
        if ($movieCount) {
            $movieCount->increment('view_count');
        } else {
            Movie_views::create(
                [
                    'movie_id' => $movieId,
                    'view_count' => 1,
                ]
            );
        }

        return $movie;
    }



}


?>