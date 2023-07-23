<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sevices\Admin\CategoryService;
use App\Models\Category;

use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{

    private $categoryService;


    function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index()
    {

        $categories = $this->categoryService->getAll();


        return view('admin.category.index', compact('categories'));
    }


    public function create()
    {



        return view('admin.category.create');
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make(
                $input,
                [
                    'title' => 'required|max:70',
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
                throw new \Exception('Category Created Error');
            }

            $this->categoryService->create($input);

            return redirect()->route('admin.categories.create')
                ->with('success', 'Category Created Successfully');
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
            $category = $this->categoryService->edit($id);
            if (!$category) {
                throw new \Exception('Category Not Found');
            }
            return view('admin.category.show', compact('category'));
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
                    'title' => 'required|max:70',
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
                throw new \Exception('Category Updated Error');
            }
            $update = $this->categoryService->update($id, $data);
            $message = 'Update category successfully <b>' . $update->title . '</b>';
            return redirect(route('admin.categories.index'))->with('success', $message);

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage())->withErrors($validator);
        }

    }


    public function destroy($id)
    {
      
        try {
            $this->categoryService->destroy($id);
            return redirect()->back()->with('success', 'Category Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}