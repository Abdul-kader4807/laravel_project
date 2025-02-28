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
        return response()->json(['purchases' => $purchases]);
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
    //    print_r($request->all());


    $purchase = new Purchase();
    $purchase->supplier_id = $request->supplier_id;
    $purchase->order_date = now();
    $purchase->delivery_date = date('Y-m-d H:i:s', strtotime('+7 days'));
    $purchase->shipping_address = "";   //$request->shipping_address;
    $purchase->total_purchase = $request->total_purchase;
    $purchase->paid_amount = $request->paid_amount;
    $purchase->status_id = $request->status_id;
    $purchase->discount = $request->discount;
    $purchase->vat = $request->vat;


    $purchase->remark = "";   //$request->remark;
    // $purchase->status_id = 1;
    // date_default_timezone_set("Asia/Dhaka");
    // $purchase->created_at=date('Y-m-d H:i:s');
    // date_default_timezone_set("Asia/Dhaka");
    // $purchase->updated_at=date('Y-m-d H:i:s');
    $purchase->save();
    $lastInsertedId = $purchase->id;

    $productsdata = $request->products;

    print_r($productsdata);



    foreach ($productsdata as $key => $value) {
        //  print_r( $value['item_id']);
        $purchasedetails = new PurchaseDetail();
        $purchasedetails->purchase_id = $lastInsertedId;
        $purchasedetails->product_id = $value['item_id'];
        $purchasedetails->uom_id = $value['uom_id'];
        $purchasedetails->qty = $value['qty'];
        $purchasedetails->price = $value['price'];
        $purchasedetails->discount = $value['total_discount'];
        $purchasedetails->vat = $request->vat;
        // date_default_timezone_set("Asia/Dhaka");
        // $purchasedetails->created_at=date('Y-m-d H:i:s');
        //  date_default_timezone_set("Asia/Dhaka");
        // $purchasedetails->updated_at=date('Y-m-d H:i:s');

        $purchasedetails->save();
        //   $lastInsertedId = $order->id;





        // স্টক থেকে প্রোডাক্টের পরিমাণ কমানো
        // $stock = Stock::where('product_id', $value['item_id'])->first();

        // if ($stock) {
        //     $stock->qty += $value['qty'];
        //     $stock->updated_at = now();
        //     $stock->save();
        // } else {

        //     $newStock = new Stock();
        //     $newStock->product_id = $value['item_id'];
        //     $newStock->qty = $value['qty'];
        //     $newStock->transaction_type_id = 2; // Sales transaction type
        //     $newStock->remark = "Sales";
        //     $newStock->warehouse_id = 1;
        //     $newStock->created_at = now();
        //     $newStock->updated_at = now();
        //     $newStock->save();
        // }
    }
    return response()->json(['success' => "Purchase confirmed successfully"]);













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
