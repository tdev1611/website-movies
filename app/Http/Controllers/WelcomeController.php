<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sevices\Client\CategoryService;
use App\Sevices\Client\CountryService;
use App\Sevices\Client\GenreService;
use App\Sevices\Client\MovieService;

class WelcomeController extends Controller
{
    protected $categoryService;
    protected $countryService;
    protected $genreService;
    protected $movieService;
    public function __construct(MovieService $movieService, CategoryService $categoryService, CountryService $countryService, GenreService $genreService)
    {
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->genreService = $genreService;
        $this->movieService = $movieService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAll();
        $countries = $this->countryService->getAll();
        $genres = $this->genreService->getAll();

        $movies_feature = $this->movieService->moviesFeature();




        return view('welcome', compact('categories', 'countries', 'genres','movies_feature'));
    }


}