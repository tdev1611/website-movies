<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sevices\Admin\GenreService;
use Illuminate\Support\Facades\Validator;


class GenreController extends Controller
{

    private $genreService;


    function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function index()
    {

        $genres = $this->genreService->getAll();


        return view('admin.genre.index', compact('genres'));
    }


    public function create()
    {

        return view('admin.genre.create');
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make(
                $input,
                [
                    'title' => 'required|max:70|unique:genres,slug',
                    'slug' => 'required|max:70|unique:genres,slug',
                    'desc' => 'required|max:200',
                    'status' => 'required',
                ],
                [],
                [
                    'title' => 'Tên',
                    'desc' => 'Mô tả',
                    'status' => 'trạng thái',
                ]
            );

            if ($validator->fails()) {
                throw new \Exception('genre Created Error');
            }

            $this->genreService->create($input);

            return redirect()->route('admin.genres.create')
                ->with('success', 'genre Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($validator)->with('error', $e->getMessage());
        }
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        try {
            $genre = $this->genreService->edit($id);
            if (!$genre) {
                throw new \Exception('genre Not Found');
            }
            return view('admin.genre.show', compact('genre'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }


    public function update(Request $request, $id)
    {
        //
        try {
            $data = $request->all();
            $validator = Validator::make(
                $data,
                [
                    'title' => 'required|max:70|unique:genres,slug',
                    'slug' => 'required|max:70|unique:genres,slug',
                    'desc' => 'required|max:200',
                    'status' => 'required',
                ],
                [],
                [
                    'title' => 'Tên',
                    'desc' => 'Mô tả',
                    'status' => 'trạng thái',
                ]
            );

            if ($validator->fails()) {
                throw new \Exception('genre Updated Error');
            }
            $update = $this->genreService->update($id, $data);
            $message = 'Update genre successfully <b>' . '<br>'.  $update->title . '</br>';
            return redirect(route('admin.genres.index'))->with('success', $message);

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage())->withErrors($validator);
        }

    }


    public function destroy($id)
    {

        try {
            $this->genreService->destroy($id);
            return redirect()->back()->with('success', 'genre Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}