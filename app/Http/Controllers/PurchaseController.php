<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\Status;
use App\Models\Supplier;
use App\Models\Uom;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{




    public function index()
    {
        // $purchases = Purchase::all();
        // print_r($purchases);
        // $purchases = Purchase::paginate(10);
        // return view('pages.purchases.index', compact('purchases'));

        $purchases = Purchase::with(['supplier', 'product', 'status'])->paginate(10);

        return view('pages.purchases.index', compact('purchases'))->with('success', session('success'));



    }




    public function create()
    {
        $suppliers = Supplier::all();
        $products = Product::all();
        $statuses = Status::all();
        $uoms = Uom::all();
        return view('pages.purchases.create', compact('suppliers', 'products', 'statuses','uoms'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'status_id' => 'required|exists:status,id',
            'total_purchase' => 'nullable|numeric|min:0',
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
        $purchase->total_purchase = $request->total_purchase;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->shipping_address = $request->shipping_address;
        $purchase->description = $request->description;

        if ($request->hasFile('photo')) {
            $photoname = uniqid() . "." . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('photo'), $photoname);
            $purchase->photo = $photoname;
        }

        if ($purchase->save()) {
            return redirect('purchase')->with('success', "Purchase has been registered");
        }
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
            'total_purchase' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'purchase_date' => 'nullable|date',
            'shipping_address' => 'nullable|min:4',
            'description' => 'nullable|min:4',
            'photo'  => 'nullable|image|mimes:png,jpg,jpeg|max:2048',
        ]);

        $purchase = Purchase::findOrFail($id);
        $purchase->supplier_id = $request->supplier_id;
        $purchase->product_id = $request->product_id;
        $purchase->status_id = $request->status_id;
        $purchase->total_purchase = $request->total_purchase;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->total_amount = $request->total_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        $purchase->purchase_date = $request->purchase_date;
        $purchase->shipping_address = $request->shipping_address;
        $purchase->description = $request->description;

        if ($request->hasFile('photo')) {
            if ($purchase->photo && file_exists(public_path('photo/' . $purchase->photo))) {
                unlink(public_path('photo/' . $purchase->photo));
            }
            $photoname = uniqid() . "." . $request->file('photo')->extension();
            $request->file('photo')->move(public_path('photo'), $photoname);
            $purchase->photo = $photoname;
        }

        if ($purchase->save()) {
            return redirect('purchase')->with('success', "Purchase has been updated");
        }
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
        $query = $request->input('query');

        $purchases = Purchase::where('description', "like", "%{$query}%")
            ->orWhereHas('supplier', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('product', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->orWhereHas('status', function ($q) use ($query) {
                $q->where('name', 'like', "%{$query}%");
            })
            ->paginate(10);

        return view('pages.purchases.index', compact('purchases'));
    }




    public function find_supplier(Request $request)
    {
        $supplier = Supplier::find($request->id);
        return response()->json(['supplier' => $supplier]);
    }


    public function find_product(Request $request)
    {
        $product = Product::find($request->id);
        // print_r($product);
        return response()->json(['product' => $product]);
    }



    public function find_uom(Request $request)
    {
        $uom = Uom::find($request->id);
        return response()->json(['uom' => $uom]);
    }
}
