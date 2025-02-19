<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Manufacturer;
use App\Models\Product;
use App\Models\Uom;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index()
    {
        $products = Product::paginate(3);
        return view('pages.products.index', compact('products'));
    }


    public function create()
    {

        $manufacturers = Manufacturer::all();
        $brands = Brand::all();
        $categories = Category::all();
        $uoms= Uom::all();
        return view('pages.products.create', compact('manufacturers', 'brands', 'categories','uoms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name'   => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'generic_name'   => 'required|min:3',
            'dosage' => 'nullable|min:3',
            'strength' => 'nullable|min:3',
            'unit' => 'required|min:2',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0|lt:price',
            'max_quantity' => 'required|integer|min:1',
            'reorder_level' => 'nullable|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'expiry_date' => 'nullable|date|after:today',
            'description' => 'nullable|min:4',
            'uom_id' => 'nullable|numeric',
            'barcode' => 'nullable|numeric|digits_between:8,13',
            'sku' => 'nullable|string|max:50|unique:products,sku',
            'star' => 'nullable|string|max:5',
            'weight' => 'nullable|numeric|min:0',
            'size' => 'nullable|string|max:50',
            'is_featured' => 'required|boolean',
            'is_brand' => 'required|boolean',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $product = new Product();

        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->generic_name = $request->generic_name;
        $product->dosage = $request->dosage;
        $product->strength = $request->strength;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->max_quantity = $request->max_quantity;
        $product->reorder_level = $request->reorder_level;
        $product->discount = $request->discount;
        $product->expiry_date = $request->expiry_date;
        $product->description = $request->description;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
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
            return redirect('product')->with('success', "product has been registered");
        };
    }


    public function show($id)
    {
        $product = Product::find($id);
        return view('pages.products.show', compact('product'));
    }


    public function edit($id)
    {
        $product = Product::find($id);
        $manufacturers = Manufacturer::all();
        $brands = Brand::all();
        $categories = Category::all();
        $uoms= Uom::all();
        return view('pages.products.update', compact('product', 'manufacturers', 'brands', 'categories','uoms'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'name'   => 'required|min:3',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'manufacturer_id' => 'required|exists:manufacturers,id',
            'generic_name'   => 'required|min:5',
            'dosage' => 'nullable|min:3',
            'strength' => 'nullable|min:3',
            'unit' => 'required|min:2',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0|lt:price',
            'max_quantity' => 'required|integer|min:1',
            'reorder_level' => 'nullable|integer|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'expiry_date' => 'nullable|date|after:today',
            'description' => 'nullable|min:4',
            'uom_id' => 'nullable|numeric',
            'barcode' => 'nullable|numeric|digits_between:8,13',
            'sku' => 'nullable|string|max:50|unique:products,sku,' . $id,
            'star' => 'nullable|string|max:5',
            'weight' => 'nullable|numeric|min:0',
            'size' => 'nullable|string|max:50',
            'is_featured' => 'required|boolean',
            'is_brand' => 'required|boolean',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);
$product =  Product::find($id);
$product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->generic_name = $request->generic_name;
        $product->dosage = $request->dosage;
        $product->strength = $request->strength;
        $product->manufacturer_id = $request->manufacturer_id;
        $product->unit = $request->unit;
        $product->price = $request->price;
        $product->offer_price = $request->offer_price;
        $product->max_quantity = $request->max_quantity;
        $product->reorder_level = $request->reorder_level;
        $product->discount = $request->discount;
        $product->expiry_date = $request->expiry_date;
        $product->description = $request->description;
        $product->uom_id = $request->uom_id;
        $product->barcode = $request->barcode;
        $product->sku = $request->sku;
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
            $product->photo= $product->photo;
        }
        if ($product->save()) {
            return redirect('product')->with('success', "product has been registered");
        };
    }


    public function destroy_view($id)
    {
        $product = Product::find($id);
        return view('pages.products.delete', compact('product'));
    }

    public function destroy($id)
    {
        $del = Product::destroy($id);
        if ($del) {
            return redirect('product')->with('success', "product has been Deleted");
        }
    }



    public function search(Request $request)
    {
        $products = Product::where('name', "like", "%{$request->name}%")->paginate(3);
        $requestdata = $request->name;

        return view('pages.products.index', compact('products', 'requestdata'));

        if ($products) {
            return view('pages.products.index', compact('products'));
        } else {
            $products = [];
        }
    }

    
}
