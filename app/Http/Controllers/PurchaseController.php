<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function index()
    {
        // $purchases = Purchase::all();
        $purchases = Purchase::paginate(2);

        // print_r($purchases);
        return view('pages.purchase.index', compact('purchases'));
    }


    public function create()
    {
        return view('pages.purchase.create');
    }




    public function store(Request $request)
    {
        $request->validate([

            'supplier_id' => 'required|exists:suppliers,id',
            'product_id' => 'required|exists:products,id',
            'status_id' => 'required|exists:status,id',
            'total_order' => 'nullable|numeric|min:0|lt:price',
            'paid_amount' => 'required|numeric|min:0',
            'total_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'purchase_date' => 'nullable|date|after:today',
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
        $purchase->purchase_date = $request->vatpurchase_date;
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
        return view('pages.purchase.show', compact('purchase'));
    }




    public function edit(string $id)
    {

        $purchase = Purchase::find($id);
        // $purchase =Purchase::where('id',$id)->get();
        return view('pages.purchase.update', compact('purchase'));
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
