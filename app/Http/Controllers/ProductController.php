<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        // $products = Customer::get();
        $products = Product::paginate(4);
        // print_r($products);

        return view('products.index', compact('products'));
    }


    public function create()
    {
        return view('products.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:5',
            'category_id'  => 'required|min:4|numeric',
            'brand_id	'  => 'required|min:4|numeric',
            'generic_name'   => 'required|min:5',
            'dosage' => 'required|min:4',
            'strength' => 'required|min:4',
            'unit' => 'required|min:4',
            'price' => 'required|min:4',
            'quantity' => 'required|min:4',
            'offer_price' => 'required|min:4',
            'stock_quantity' => 'required|min:4',
            'reorder_level' => 'required|min:4',
            'expiry_date' => 'required|min:4',
            'description' => 'required|min:4',
            'discount' => 'required|min:4',
            'uom_id' => 'required|min:4',
            'barcode' => 'required|min:4',
            'sku' => 'required|min:4',
            'manufacturer_id' => 'required|min:4',
            'star' => 'required|min:4',
            'weight' => 'required|min:4',
            'size' => 'required|min:4',
            'is_featured' => 'required|min:4',
            'is_brand' => 'required|min:4',
            'photo'  => 'required|image|mimes:png,jpg,jpeg|max:2048',

        ]);
$product = new Product();









    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
