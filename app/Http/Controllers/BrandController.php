<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\status;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        // $brands = brand::get();
        // print_r($brands);


        // $brands = Brand::with('status')->paginate(3); // Status name er sathe data load korchi

        // $brands = Brand::all();
        $brands = Brand::paginate(10);

          //print_r( Brand::with('status')->get());


       return view('pages.brands.index', compact('brands'));
    }


    public function create()
    {
        $status = Status::all();
        return view('pages.brands.create', compact('status'));
    }


    public function store(Request $request)
    {

        $request->validate([
            'brand_name'   => 'required|min:3',
            'contact_info'   => 'required|min:3',
            'status_id' => 'required|exists:status,id',
            'address'   => 'required|min:3',

        ]);
        $brand = new Brand();

        $brand->brand_name = $request->brand_name;
        $brand->contact_info = $request->contact_info;
        $brand->status_id = $request->status_id;
        $brand->address = $request->address;

        if ($brand->save()) {
            return redirect('brand')->with('success', "Brand has been registered");
        };
    }


    public function show($id)
    {
        $brand = Brand::find($id);
        return view('pages.brands.show', compact('brand'));
    }



    public function edit($id)
    {
        $brand = Brand::find($id);
        $status = Status::all();
        return view('pages.brands.update', compact('brand', 'status'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name'   => 'required|min:3',
            'contact_info'   => 'required|min:3',
            'status_id' => 'required|exists:status,id',
            'address'   => 'required|min:3',

        ]);
        // print_r($request->all());

        $brand = Brand::find($id);
        $brand->brand_name = $request->brand_name;
        $brand->contact_info = $request->contact_info;
        $brand->status_id = $request->status_id;
        $brand->address = $request->address;

        if ($brand->save()) {
            return redirect('brand')->with('success', "Brand has been updated");
        };
    }


    public function destroy_view($id)
    {
        $brand = Brand::find($id);
        return view('pages.brands.delete', compact('brand'));
    }

    public function destroy(string $id)
    {
        if (Brand::destroy($id)) {
            return redirect('brand')->with('success', "Brand has been deleted");
        }
    }

    public function search(Request $request)
    {
        $brands = Brand::where('brand_name', "like", "%{$request->name}%")->paginate(3);
        $requestdata = $request->name;

        return view('pages.brands.index', compact('brands', 'requestdata'));

        if ($brands) {
            return view('pages.brands.index', compact('brands'));
        } else {
            $brands = [];
        }
    }
}
