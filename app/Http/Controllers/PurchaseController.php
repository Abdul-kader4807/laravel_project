<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Status;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{




    public function index()
    {
        // $purchases = Purchase::all();
        // print_r($purchases);
        $purchases = Purchase::paginate(2);
        return view('pages.purchases.index', compact('purchases'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $statuses = Status::all();
        return view('pages.purchases.create', compact('suppliers', 'products', 'statuses'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'status_id' => 'required|exists:status,id',
            'total_order' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'purchase_date' => 'nullable|date',
            'shipping_address' => 'nullable|min:4',
            'description' => 'nullable|min:4',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $purchase = new Purchase();
        $purchase->supplier_id = $request->supplier_id;
        $purchase->product_id = $request->product_id;
        $purchase->status_id = $request->status_id;
        $purchase->total_order = $request->total_order;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->shipping_address = $request->shipping_address;
        $purchase->description = $request->description;

        $photoname = $request->name . "." . $request->file('photo')->extension();
        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
        }

        $request->file('photo')->move(public_path('photo'), $photoname);
        $purchase->photo = $photoname;

        if ($purchase->save()) {
            return redirect('purchase')->with('success', "Purchase has been registered");
        };
    }

    public function show($id)
    {
        $purchase = Purchase::find($id);
        return view('pages.purchases.show', compact('purchase'));
    }

    public function edit($id)
    {
        $purchase = Purchase::find($id);

        $suppliers = Supplier::all();
        $products = Product::all();
        $statuses = Status::all();

        return view('pages.purchases.update', compact('purchase', 'suppliers', 'products', 'statuses'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'status_id' => 'required|exists:status,id',
            'total_order' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'purchase_date' => 'nullable|date',
            'shipping_address' => 'nullable|min:4',
            'description' => 'nullable|min:4',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $purchase = Purchase::find($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->product_id = $request->product_id;
        $purchase->status_id = $request->status_id;
        $purchase->total_order = $request->total_order;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->shipping_address = $request->shipping_address;
        $purchase->description = $request->description;

        $photoname = $request->name . "." . $request->file('photo')->extension();
        $photoPath = public_path('photo/' . $photoname);
        if (file_exists($photoPath)) {
            unlink($photoPath);
            $request->file('photo')->move(public_path('photo'), $photoname);
        $purchase->photo = $photoname;
        }else{
            $purchase->photo= $purchase->photo;
        }
        if ($purchase->save()) {
            return redirect('purchase')->with('success', "Purchase has been registered");
        };

    }



    public function destroy_view($id)
    {
        $purchase = Purchase::find($id);
        return view('pages.purchases.delete', compact('purchase'));
    }


    public function destroy($id)
    {
        $del = Purchase::destroy($id);
        if ($del) {
            return redirect('purchase')->with('success', "purchase has been Deleted");
        }
    }





    public function search(Request $request)
    {
        $purchases = Purchase::where('supplier_id', "like", "%{$request->supplier_id}%")->paginate(3);
        $requestdata = $request->supplier_id;

        return view('pages.purchases.index', compact('purchases', 'requestdata'));

        if ($purchases) {
            return view('pages.purchases.index', compact('purchases'));
        } else {
            $purchases = [];
        }
    }












}


