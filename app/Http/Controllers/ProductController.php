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

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->generic_name = $request->generic_name;
        $product->dosage = $request->dosage;
        $product->strength = $request->strength;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->offer_price = $request->offer_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->reorder_level = $request->reorder_level;
        $product->expiry_date = $request->expiry_date;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->star = $request->star;
        $product->weight = $request->weight;
        $product->size = $request->size;
        $product->is_featured = $request->is_featured;
        $product->is_brand = $request->is_brand;
        $photoname = $request->name . "." . $request->file('photo')->extension();
        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $request->file('photo')->move(public_path('photo'), $photoname);
        $product->photo = $photoname;

        if ($product->save()) {
            return redirect('product')->with('success', "product has been registred");
        };
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        // $product=Product::where('id',$id)->get();
        return view('products.update', compact('product'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|min:5',
            'category_id'  => 'required|min:4|numeric',
            'brand_id'  => 'required|min:4|numeric',
            'generic_name'   => 'required|min:5',
            'dosage' => 'required|min:4',
            'strength' => 'required|min:4',
            'unit' => 'required|min:4',
            'price' => 'required|gt:0',
            'quantity' => 'required|min:1',
            'offer_price' => 'required|min:4',
            'stock_quantity' => 'required|min:4',
            'reorder_level' => 'required|min:4',
            'expiry_date' => 'required|date',
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
        // print_r($request->all());
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->generic_name = $request->generic_name;
        $product->dosage = $request->dosage;
        $product->strength = $request->strength;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->offer_price = $request->offer_price;
        $product->stock_quantity = $request->stock_quantity;
        $product->reorder_level = $request->reorder_level;
        $product->expiry_date = $request->expiry_date;
        $product->description = $request->description;
        $product->discount = $request->discount;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->star = $request->star;
        $product->weight = $request->weight;
        $product->size = $request->size;
        $product->is_featured = $request->is_featured;
        $product->is_brand = $request->is_brand;

        $photoname = $request->name . "." . $request->file('photo')->extension();

        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);

            $request->file('photo')->move(public_path('photo'), $photoname);

            $product->photo = $photoname;
        }else{
            $product->photo =$product->photo ;
        }


        if ($product->save()) {
            return redirect('product')->with('success', "product has been updated");
        };
    }


    public function destroy_view($id)
    {
        $product = Product::find($id);
        return view('products.delete', compact('product'));
    }



    public function destroy(string $id)
    {
        $del = Product::destroy($id);
        if ($del) {
            return redirect('product')->with('success', "product has been Deleted");
        }
    }


    public function search(Request $request)
    {
        $products = Product::where('name', "like", "%{$request->name}%")->paginate(4);
        $requestdata = $request->name;

        return view('products.index', compact('products', 'requestdata'));

        if ($products) {
            return view('products.index', compact('products'));
        } else {
            $products = [];
        }
    }











}
