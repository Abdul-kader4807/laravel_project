<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

class PurchaseController extends Controller
{

    public function index()
    {
        $purchases = Purchase::all();
        return response()->json(['purchase' => $purchases]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //   print_r($request->all());


        $purchase = new Purchase;
        $purchase->supplier_id = $request->supplier_id;
        $purchase->purchase_date = now();
        $purchase->total_purchase = $request->total_purchase;
        $purchase->paid_amount = $request->paid_amount;
        $purchase->total_amount = $request->paid_amount;
        $purchase->discount = $request->discount;
        $purchase->vat = $request->vat;
        $purchase->photo = "";
        $purchase->shipping_address = "";   //$request->shipping_address;
        $purchase->description = "";   //$request->shipping_address;
        $purchase->status_id = $request->status_id;


        date_default_timezone_set("Asia/Dhaka");
        $purchase->created_at = date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
        $purchase->updated_at = date('Y-m-d H:i:s');
        $purchase->save();


        $lastInsertedId = $purchase->id;

        $productsdata = $request->products;

        print_r($productsdata);



        // foreach ($productsdata as $key => $value) {
        //     $purchasedetails = new PurchaseDetail;
        //     print_r($value);
        //     // print_r($value['qty']);


        //     $purchasedetails->purchase_id = $lastInsertedId;
        //     $purchasedetails->product_id = $value['item_id'];
            // $purchasedetails->uom_id = $value['uom_id'];
            // $purchasedetails->qty = $value['qty'];
            // $purchasedetails->price = $value['price'];
            // $purchasedetails->discount = $value['total_discount'];
            // $purchasedetails->vat = $request->vat;
            // $purchasedetails->total_purchase = $value['subtotal'];

            // date_default_timezone_set("Asia/Dhaka");
            // $purchasedetails->created_at=date('Y-m-d H:i:s');
            //  date_default_timezone_set("Asia/Dhaka");
            // $purchasedetails->updated_at=date('Y-m-d H:i:s');

            // $purchasedetails->save();

        // }
        // return response()->json(['success' => "Purchase confirmed successfully"]);
    }

    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }


    public function destroy(string $id)
    {
        //
    }
}
