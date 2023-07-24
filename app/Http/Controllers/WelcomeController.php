<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sevices\Client\CategoryService;
use App\Sevices\Client\CountryService;
use App\Sevices\Client\GenreService;

class WelcomeController extends Controller
{
    protected $categoryService;
    protected $countryService;
    protected $genreService;
    public function __construct(CategoryService $categoryService, CountryService $countryService, GenreService $genreService)
    {
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->genreService = $genreService;
    }
    public function index()
    {
        $categories = $this->categoryService->getAll();
        $countries = $this->countryService->getAll();
        $genres = $this->genreService->getAll();


        return view('welcome', compact('categories', 'countries', 'genres'));
    }
    

}