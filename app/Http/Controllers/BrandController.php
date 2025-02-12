<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\status;
use Illuminate\Http\Request;

class BrandController extends Controller
{

    public function index()
    {
        $brands = Brand::all();
        $brands = Brand::paginate(4);
        return view('brands.index', compact('brands'));
    }


    public function create()
    {
        $status = Status::all();
        return view('brands.create', compact('status'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'brand_name'   => 'required|min:5',
            'contact_info'   => 'required|min:5',
            'status_id' => 'required|exists:status,id',
            'address'   => 'required|min:5',

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


    public function show( $id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.show', compact('brand'));
    }



    public function edit($id)
    {
        $brand = Brand::find($id);
        $status = Status::all();
        return view('brands.update',compact('brand','status'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name'   => 'required|min:5',
            'contact_info'   => 'required|min:5',
            'status_id' => 'required|exists:status,id',
            'address'   => 'required|min:5',

        ]);
        $brand = Brand::findOrFail($id);
        if ($brand->save()) {
            return redirect('brand')->with('success', "Brand has been updated");
        };

    }


    public function destroy_view($id)
    {
        $brand = Brand::findOrFail($id);
        return view('brands.delete', compact('brand'));
    }

    public function destroy(string $id)
    {
        if (Brand::destroy($id)) {
            return redirect('brand')->with('success', "Brand has been deleted");
        }
    }

    public function search(Request $request)
    {
        $brandS = Brand::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;

        return view('brands.index', compact('brands', 'requestdata'));
    }


    

}
