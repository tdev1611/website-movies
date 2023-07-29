<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sevices\Client\CategoryService;
use App\Sevices\Client\CountryService;
use App\Sevices\Client\GenreService;
use App\Sevices\Client\MovieService;
use App\Sevices\Client\MovieCountService;

class WelcomeController extends Controller
{
    protected $categoryService;
    protected $countryService;
    protected $genreService;
    protected $movieService;
    protected $movieCountService;
    public function __construct(MovieCountService $movieCountService, MovieService $movieService, CategoryService $categoryService, CountryService $countryService, GenreService $genreService)
    {
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->genreService = $genreService;
        $this->movieService = $movieService;
        $this->movieCountService = $movieCountService;
    }
    public function index()
    {
        // categories
        $categories = $this->categoryService->getAll();
        // countries
        $countries = $this->countryService->getAll();
        //genres
        $genres = $this->genreService->getAll();
        // movies_feature
        $movies_feature = $this->movieService->moviesFeature();
        // movies count
        $movies_count = $this->movieCountService->getMoviesCount();



        return view('welcome', compact('categories', 'countries', 'genres', 'movies_feature','movies_count'));
    }


}