<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sevices\Admin\CountryService;
use Illuminate\Support\Facades\Validator;


class CountryController extends Controller
{

    private $countryService;


    function __construct(CountryService $countryService)
    {
        $this->countryService = $countryService;
    }

    public function index()
    {
        $countries = $this->countryService->getAll();
        return view('admin.country.index', compact('countries'));
    }


    public function create()
    {

        return view('admin.country.create');
    }

    public function store(Request $request)
    {
        try {
            $input = $request->all();
            $validator = Validator::make(
                $input,
                [
                    'title' => 'required|max:70|unique:countries,slug',
                    'slug' => 'required|max:70|unique:countries,slug',
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
                throw new \Exception('country Created Error');
            }

            $this->countryService->create($input);

            return redirect()->route('admin.countries.create')
                ->with('success', 'country Created Successfully');
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
            $country = $this->countryService->edit($id);
            if (!$country) {
                throw new \Exception('country Not Found');
            }
            return view('admin.country.show', compact('country'));
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
                    'title' => 'required|max:70|unique:countries,slug',
                    'slug' => 'required|max:70|unique:countries,slug',
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
                throw new \Exception('country Updated Error');
            }
            $update = $this->countryService->update($id, $data);
            $message = 'Update country successfully <b>' . '<br>' . $update->title . '</br>';
            return redirect(route('admin.countries.index'))->with('success', $message);

        } catch (\Exception $e) {

            return redirect()->back()->with('error', $e->getMessage())->withErrors($validator);
        }

    }


    public function destroy($id)
    {
        try {
            $this->countryService->destroy($id);
            return redirect()->back()->with('success', 'country Deleted Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }
}