<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        // $query = Product::query();
        $query = Product::with(['category', 'brand', 'uom','manufacturer']);

        if ($request->search) {
            $query->where('name', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));
    }





    public function store(Request $request)
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->generic_name = $request->generic_name;
            $product->dosage = $request->dosage;
            $product->strength = $request->strength;
            $product->unit = $request->unit;
            $product->price = $request->price;
            $product->offer_price = $request->offer_price;
            $product->max_quantity = $request->max_quantity;
            $product->reorder_level = $request->reorder_level;
            $product->expiry_date = $request->expiry_date;
            $product->photo = $request->photo;
            $product->uom_id = $request->uom_id;
            $product->manufacturer_id = $request->manufacturer_id;
            $product->description = $request->description;
//niser golo newa hoy nai vue te
            $product->discount = $request->discount;
            $product->barcode = $request->barcode;
            $product->sku = $request->sku;
            $product->star = $request->star;
            $product->weight = $request->weight;
            $product->size = $request->size;
            $product->is_featured = $request->is_featured;
            $product->is_brand = $request->is_brand;

            date_default_timezone_set("Asia/Dhaka");
            $product->created_at = date('Y-m-d H:i:s');
            $product->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $product->photo = $request->photo;
            }

            $product->save();

            if (isset($request->photo)) {
                $imageName = $product->id . '.' . $request->photo->extension();
                $product->photo = $imageName;
                $product->update();
                $request->photo->move(public_path('photo'), $imageName);
            }
            return response()->json(["product" =>  $product]);
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
            $product =  Product::find($id);
            return response()->json(["product" =>  $product]);
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
            $product = Product::find($id);
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->generic_name = $request->generic_name;
            $product->dosage = $request->dosage;
            $product->strength = $request->strength;
            $product->unit = $request->unit;
            $product->price = $request->price;
            $product->offer_price = $request->offer_price;
            $product->max_quantity = $request->max_quantity;
            $product->reorder_level = $request->reorder_level;
            $product->expiry_date = $request->expiry_date;
            $product->photo = $request->photo;
            $product->uom_id = $request->uom_id;
            $product->manufacturer_id = $request->manufacturer_id;
            $product->description = $request->description;

            // niser golo newa hoy nai
            $product->discount = $request->discount;
            $product->barcode = $request->barcode;
            $product->sku = $request->sku;
            $product->star = $request->star;
            $product->weight = $request->weight;
            $product->size = $request->size;
            $product->is_featured = $request->is_featured;
            $product->is_brand = $request->is_brand;

            date_default_timezone_set("Asia/Dhaka");
            $product->created_at = date('Y-m-d H:i:s');
            $product->updated_at = date('Y-m-d H:i:s');

            if (isset($request->photo)) {
                $product->photo = $request->photo;
            }

            $product->save();

            if (isset($request->photo)) {
                $imageName = $product->id . '.' . $request->photo->extension();
                $product->photo = $imageName;
                $product->update();
                $request->photo->move(public_path('photo'), $imageName);
            }
            return response()->json(["product" =>  $product]);
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
            $deleteProduct =  Product::destroy($id);
            return response()->json(["deleted" =>  $deleteProduct]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }



}
