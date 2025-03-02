<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Uom;
use Illuminate\Http\Request;

class PurchaseDetailController extends Controller
{

    public function index()
    {
        // $purchase_deatils = Purchase::all();
        //  print_r($purchase_deatils);
        $purchase_deatils = PurchaseDetail::paginate(10);
        return view('pages.purchasesDetails.index', compact('purchase_deatils'));
    }


    public function create()
    {
        $purchases = Purchase::all();
        $products = Product::all();
        $uoms = Uom::all();
        return view('pages.purchasesDetails.create', compact('purchases', 'products', 'uoms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'total_purchase' => 'nullable|numeric|min:0',
        ]);

        $purchase_deatils = new PurchaseDetail();

        $purchase_deatils->purchase_id = $request->purchase_id;
        $purchase_deatils->product_id = $request->product_id;
        $purchase_deatils->uom_id = $request->uom_id;
        $purchase_deatils->qty = $request->qty;
        $purchase_deatils->price = $request->price;
        $purchase_deatils->discount = $request->discount;
        $purchase_deatils->vat = $request->vat;
        $purchase_deatils->total_purchase = $request->total_purchase;


        if ($purchase_deatils->save()) {
            return redirect('purchase_deatils')->with('success', "Purchase_deatils has been registered");
        };

    }




    public function show(string $id)
    {
        $purchase_deatils = PurchaseDetail::find($id);
        return view('pages.purchasesDetails.show', compact('purchase_deatils'));
    }




    public function edit(string $id)
    {
        $purchases = Purchase::all();
        $products = Product::all();
        $uoms = Uom::all();
        return view('pages.purchasesDetails.create', compact('purchases', 'products', 'uoms'));
    }




    public function update(Request $request, string $id)
    {
        $request->validate([
            'purchase_id' => 'required|exists:purchases,id',
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'nullable|numeric|min:0',
            'price' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0|max:100',
            'vat' => 'nullable|numeric|min:0|max:100',
            'total_purchase' => 'nullable|numeric|min:0',
        ]);

        $purchase_deatils =  PurchaseDetail::find($id);

        $purchase_deatils->purchase_id = $request->purchase_id;
        $purchase_deatils->product_id = $request->product_id;
        $purchase_deatils->uom_id = $request->uom_id;
        $purchase_deatils->qty = $request->qty;
        $purchase_deatils->price = $request->price;
        $purchase_deatils->discount = $request->discount;
        $purchase_deatils->vat = $request->vat;
        $purchase_deatils->total_purchase = $request->total_purchase;


        if ($purchase_deatils->save()) {
            return redirect('purchase_deatils')->with('success', "Purchase_deatils has been updated");
        };
    }

    public function destroy_view($id)
    {
        $purchase_deatils = PurchaseDetail::find($id);
        return view('pages.purchasesDetails.delete', compact('purchase_deatils'));
    }


    public function destroy(string $id)
    {
        $del = PurchaseDetail::destroy($id);
        if ($del) {
            return redirect('purchase_deatils')->with('success', "purchase_deatils has been Deleted");
        }
    }



    public function search(Request $request)

    {
        $query = $request->input('query');


        $purchase_deatils = PurchaseDetail::where('purchase_id', "like", "%{$query}%")
            ->orWhere('product_id', 'like', "%{$query}%")
            ->orWhere('uom_id', 'like', "%{$query}%")
            ->paginate(8);
        return view('pages.purchasesDetails.index', compact('purchase_deatils'));

        if ($purchase_deatils) {
            return view('pages.purchasesDetails.index', compact('purchase_deatils'));
        } else {
            $purchase_deatils = [];
        }
    }




}
