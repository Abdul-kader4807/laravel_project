<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandsController extends Controller
{
    public function index(Request $request)
    {
        $query = Brand::query();

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
            $brand = new Brand();
            $brand->brand_name = $request->brand_name ;
            $brand->contact_info = $request->contact_info;
            $brand->status_id = $request->status_id;
            $brand->address = $request->address;


            date_default_timezone_set("Asia/Dhaka");
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->updated_at = date('Y-m-d H:i:s');



            $brand->save();
            return response()->json(["brand" =>  $brand]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $brand =  Brand::find($id);
            return response()->json(["brand" =>  $brand]);
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
            $brand =  Brand::find($id);
            $brand->brand_name = $request->brand_name ;
            $brand->contact_info = $request->contact_info;
            $brand->status_id = $request->status_id;
            $brand->address = $request->address;


            date_default_timezone_set("Asia/Dhaka");
            $brand->created_at = date('Y-m-d H:i:s');
            $brand->updated_at = date('Y-m-d H:i:s');



            $brand->save();
            return response()->json(["brand" =>  $brand]);
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
            $deleteBrand =  Brand::destroy($id);
            return response()->json(["deleted" =>  $deleteBrand]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
