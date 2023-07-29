<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Sevices\Client\CategoryService;
use App\Sevices\Client\CountryService;
use App\Sevices\Client\GenreService;
use App\Sevices\Client\YearService;


class MenuController extends Controller
{
    //
    protected $categoryService;
    protected $countryService;
    protected $genreService;
    protected $yearService;
    public function __construct(YearService $yearService, CategoryService $categoryService, CountryService $countryService, GenreService $genreService)
    {
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->genreService = $genreService;
        $this->yearService = $yearService;
    }



    public function category($slug)
    {
        try {
            $category = $this->categoryService->getCategory($slug);
            $movies = $category->movies()->paginate(12);

            return view('category', compact('category', 'movies'));
        } catch (\Exception $e) {
            abort(404)->$e->getMessage();
        }

    }



    function years($year)
    {
        $year = $year;
        $movies = $this->yearService->getMovies($year);
        return view('year', compact('movies', 'year'));
    }


    public function genre(Request $request, $slug)
    {
        try {
            $category = $this->genreService->getCategory($slug);
            $movies = $category->movies()->paginate(12);

            return view('genre', compact('category', 'movies'));
        } catch (\Exception $e) {
            abort(404)->$e->getMessage();
        }
    }


    public function country(Request $request, $slug)
    {
        try {
            $category = $this->countryService->getCategory($slug);
            $movies = $category->movies()->paginate(12);
            return view('country', compact('category', 'movies'));
        } catch (\Exception $e) {
            abort(404)->$e->getMessage();
        }

    }


}