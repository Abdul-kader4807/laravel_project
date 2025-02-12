<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        // $categories= Category::get();

        $categories = Category::paginate(3);
        //  print_r($categories);
        return view('categories.index', compact('categories'));
    }



    public function create()
    {
        return view('categories.create');
    }



    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:3',
        ]);

        $category = new Category();
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('category')->with('success', "Category items has been registred");
        };
    }


    public function show($id)
    {
        $category = Category::find($id);
        return view('categories.show', compact('category'));
    }



    public function edit($id)
    {
        $category = Category::find($id);
        // $category = Category::where('id',$id)->get();
        return view('categories.update', compact('category'));
    }



    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:3',
        ]);

        // print_r($request->all());
        $category = Category::find($id);
        $category->name = $request->name;
        $category->description = $request->description;

        if ($category->save()) {
            return redirect('category')->with('category', "Category items has been update");
        };
    }


    public function destroy_view($id)
    {
        $category = Category::find($id);
        return view('categories.delete', compact('category'));
    }



    public function destroy($id)
    {
        $del = Category::destroy($id);
        if ($del) {
            return redirect('category')->with('success', "Category items has been deleted");
        }
    }


    public function search(Request $request)
    {
        $categories = Category::where('name', "like", "%{$request->name}%")->paginate(3);
        $requestdata = $request->name;
        return view('categories.index', compact('categories', 'requestdata'));

        if ($categories) {
            return view('categories.index', compact('categories'));
        } else {
            $categories = [];
        }
    }
}
