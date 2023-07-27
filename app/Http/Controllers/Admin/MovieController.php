<?php

namespace App\Http\Controllers\Admin;

use App\Models\Movie;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sevices\Admin\MovieService;
use App\Sevices\Client\CategoryService;
use App\Sevices\Client\CountryService;
use App\Sevices\Client\GenreService;

class MovieController extends Controller
{
    private $movieService;
    protected $categoryService;
    protected $countryService;
    protected $genreService;

    public function __construct(MovieService $movieService, CategoryService $categoryService, CountryService $countryService, GenreService $genreService)
    {
        $this->movieService = $movieService;
        $this->categoryService = $categoryService;
        $this->countryService = $countryService;
        $this->genreService = $genreService;
    }

    public function index()
    {

        $movies = $this->movieService->getAll();


        return view('admin.movie.index', compact('movies'));
    }


    public function create()
    {

        $categories = $this->categoryService->getAll();
        $countries = $this->countryService->getAll();
        $genres = $this->genreService->getAll();
        return view('admin.movie.create', compact('categories', 'countries', 'genres'));

    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make(
                $input,
                [
                    'title' => 'required|max:70|unique:movies,title',
                    'slug' => 'required|max:70|unique:movies,slug',
                    'desc' => 'required',
                    'status' => 'required|in:1,0',
                    'subtitles' => 'required|in:Viet Sub,Thuyết minh',
                    'definition' => 'required|in:HD,Full HD',
                    'feature' => 'required|in:1,0',
                    'image' => 'required|image|max:2048',
                    'category_id' => 'required',
                    'genre_id' => 'required',
                    'country_id' => 'required',
                ],
                [],
                [
                    'title' => 'Tên',
                    'desc' => 'Mô tả',
                    'subtitles' => 'Phụ đề',
                    'definition' => 'Định dạng phim',
                    'feature' => 'Movie Nổi bật',
                    'status' => 'Trạng thái',
                    'category_id' => 'Danh mục',
                    'genre_id' => 'Thể loại',
                    'country_id' => 'Quốc gia',
                ]
            );

            if ($validator->fails()) {
                throw new \Exception('Movie Created Error');
            }

            // image

            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $filename = $request->slug . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->move('public/uploads/movies', $filename);
                $img = "public/uploads/movies/" . $filename;
                $input['image'] = $img;
            }

            $this->movieService->create($input);

            return redirect()->route('admin.movies.create')
                ->with('success', 'movie Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($validator)->with('error', $e->getMessage())->withInput();
        }
    }

    public function show($id)
    {

    }
    public function edit($id)
    {
        try {
            $categories = $this->categoryService->getAll();
            $countries = $this->countryService->getAll();
            $genres = $this->genreService->getAll();
            $movie = $this->movieService->edit($id);
            if (!$movie) {
                throw new \Exception('movie Not Found');
            }
            return view('admin.movie.show', compact('movie', 'categories', 'countries', 'genres'));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        //
        try {
            $input = $request->all();
            $validator = Validator::make(
                $input,
                [
                    'title' => 'required|max:70|unique:movies,slug,' . Movie::find($id)->id,
                    'slug' => 'required|max:70|unique:movies,slug,' . Movie::find($id)->id,
                    'desc' => 'required',
                    'status' => 'required|in:1,0',
                    'subtitles' => 'required|in:Viet Sub,Thuyết minh',
                    'definition' => 'required|in:HD,Full HD',
                    'feature' => 'required|in:1,0',
                    'image' => 'image|max:2048',
                    'category_id' => 'required',
                    'genre_id' => 'required',
                    'country_id' => 'required',
                ],
                [],
                [
                    'title' => 'Tên',
                    'desc' => 'Mô tả',
                    'subtitles' => 'Phụ đề',
                    'definition' => 'Định dạng phim',
                    'feature' => 'Movie Nổi bật',
                    'status' => 'trạng thái',
                    'category_id' => 'Danh mục',
                    'genre_id' => 'Thể loại',
                    'country_id' => 'Quốc gia',
                ]
            );
            if ($validator->fails()) {
                throw new \Exception('Movie Created Error');
            }
            // image
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                if (!empty($file)) {
                    unlink(Movie::find($id)->image);
                }
                $filename = $request->slug . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->move('public/uploads/movies', $filename);
                $img = "public/uploads/movies/" . $filename;
                $input['image'] = $img;

            }

            $update = $this->movieService->update($id, $input);
            $message = 'Update movie successfully <b>' . '<br>' . $update->title . '</br>';
            return redirect(route('admin.movies.index'))->with('success', $message);
        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage())->withErrors($validator)->withInput();
        }
    }

    public function destroy($id)
    {

        try {

            $this->movieService->destroy($id);
            return redirect()->back()->with('success', 'movie Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }



    function updateYear(Request $request)
    {
        $data = $request->all();
        $id = $data['id_movies'];
        $movie = Movie::find($id);
        if (!$movie) {
            return response()->json(['message' => 'Movie not found.'], 404);
        }
        $movie->year = $data['year'];
        $movie->save();
        return response()->json(['message' => 'Year updated successfully.'], 200);

    }

}