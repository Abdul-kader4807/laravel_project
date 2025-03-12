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
        //    print_r($request->all());


        $purchases = new Purchase;
        $purchases->supplier_id = $request->supplier_id;
        $purchases->purchase_date = now();
        $purchases->total_purchase = $request->total_purchase;
        $purchases->paid_amount = $request->paid_amount;
        $purchases->total_amount = 0;
        $purchases->discount = $request->discount;
        $purchases->vat = $request->vat;
        $purchases->photo = "";
        $purchases->shipping_address = "";   //$request->shipping_address;
        $purchases->description = "";   //$request->shipping_address;
        $purchases->status_id = $request->status_id;


        // date_default_timezone_set("Asia/Dhaka");
        // $purchases->created_at = date('Y-m-d H:i:s');
        // date_default_timezone_set("Asia/Dhaka");
        // $purchases->updated_at = date('Y-m-d H:i:s');

        $purchases->save();
        $lastInsertedId = $purchases->id;
        $productsdata = $request->products;
        // print_r($productsdata);

        foreach ($productsdata as $key => $value) {
            $purchasedetails = new PurchaseDetail;
            $purchasedetails->purchase_id = $lastInsertedId;
            $purchasedetails->product_id = $value['item_id'];
            $purchasedetails->uom_id = $value['uom_id'];
            $purchasedetails->qty = $value['qty'];
            $purchasedetails->price = $value['price'];
            $purchasedetails->discount = $value['total_discount'];
            $purchasedetails->vat = $request->vat;
            $purchasedetails->total_purchase = $value['subtotal'];
            $purchasedetails->save();


            // $stock = Stock::where('product_id', $value['item_id'])->first();

            // if ($stock) {
            //     $stock->qty += $value['qty'];
            //     $stock->updated_at = now();
            //     $stock->save();
            // } else {
            //     $newStock = new Stock();
            //     $newStock->product_id = $value['item_id'];
            //     $newStock->qty = $value['qty'];
            //     $newStock->transaction_type_id = "";
            //     $newStock->remark = "Purchase";
            //     $newStock->price = "";
            //     $newStock->offer_price = "";
            //     $newStock->warehouse_id = "";
            //     $newStock->uom_id = "";
            //     $newStock->batch_id = "";
            //     $newStock->created_at = now();
            //     $newStock->updated_at = now();
            //     $newStock->save();
            // }

            $stock = new Stock;
            $stock->product_id = $value['item_id'];
            $stock->transaction_type_id = null;
            $stock->price = $value['price'];
            $stock->offer_price = null;
            $stock->warehouse_id = null;
            $stock->uom_id = $value['uom_id'];
            
            $stock->remark = "Purchase";
            $stock->qty = $value['qty'] * (+1);

            $stock->save();
        }
        return response()->json(['success' => "Purchase confirmed successfully"]);
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
