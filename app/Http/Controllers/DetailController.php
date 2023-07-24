<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sevices\Client\DetailService;

class DetailController extends Controller
{
    protected $detailService;
    public function __construct(DetailService $detailService)
    {
        $this->detailService = $detailService;
    }

    public function index($slug)
    {

        try {
             $movie = $this->detailService->show($slug);
            return view('detail', compact('movie'));

        } catch (\Exception $e) {
            abort(404);
        }



        return view('detail');
    }

}