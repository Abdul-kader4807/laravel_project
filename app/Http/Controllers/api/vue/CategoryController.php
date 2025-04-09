<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        $query = Category::query();

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $category = new Category();
            $category->name = $request->name;

            $category->description = $request->description;
            date_default_timezone_set("Asia/Dhaka");
            $category->created_at = date('Y-m-d H:i:s');
            $category->updated_at = date('Y-m-d H:i:s');



            $category->save();

            return response()->json(["category" =>  $category]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try {
            $category =  Category::find($id);
            return response()->json(["category" =>  $category]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $category = Category::find($id);
            $category->name = $request->name;

            $category->name = $request->name;

            $category->description = $request->description;
            date_default_timezone_set("Asia/Dhaka");
            $category->created_at = date('Y-m-d H:i:s');
            $category->updated_at = date('Y-m-d H:i:s');

            $category->save();

            return response()->json([ 'message' => 'Category updated successfully','category' =>  $category]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deleteCategory =  Category::destroy($id);
            return response()->json(["deleted" =>  $deleteCategory]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
    

}
