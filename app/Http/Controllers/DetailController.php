<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sevices\Client\DetailService;
use App\Sevices\Client\CategoryService;

class DetailController extends Controller
{
    protected $detailService;
    protected $categoryService;
    public function __construct(DetailService $detailService, CategoryService $categoryService)
    {
        $this->detailService = $detailService;
        $this->categoryService = $categoryService;
    }

    public function index($slug)
    {

        try {
            $movie = $this->detailService->show($slug);
            $cateId = $movie->category->id;
            $category = $this->categoryService->getCategoryById($cateId);

            return view('detail', compact('movie', 'category'));

        } catch (\Exception $e) {
            abort(404);
        }




    }

}