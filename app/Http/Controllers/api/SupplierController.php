<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return response()->json(["suppliers" =>  $suppliers]);
    }


    public function warehouse()
    {
        $warehouses = Warehouse::all();
        return response()->json(["warehouses" => $warehouses]);
    }



    public function products(Request $request)
    {
        $products = Product::all();
        return response()->json(["products" => $products]);
    }





    public function saveReactpurchase(Request $request)
    {
        print_r($request->all());
        try {


            $purchase = new Purchase();
            $purchase->supplier_id = $request->supplier_id;
            $purchase->purchase_date = now();
            // $purchase->delivery_date = date('Y-m-d H:i:s', strtotime('+7 days'));
            $purchase->shipping_address = "";
            $purchase->total_purchase = $request->total_purchase;
            $purchase->paid_amount = $request->total_purchase;
            // $purchase->remark = "";
            $purchase->status_id = 1;
            $purchase->discount = $request->discount;
            $purchase->vat = $request->vat;
            $purchase->created_at = date('Y-m-d H:i:s');
            $purchase->updated_at = date('Y-m-d H:i:s');
            $purchase->save();
            $lastInsertedId = $purchase->id;



            foreach ($request->products as $key => $product) {


                $purchasedetail = new PurchaseDetail();
                $purchasedetail->purchase_id = $lastInsertedId;
                $purchasedetail->product_id = $product['item_id'];
                $purchasedetail->qty = $product['qty'];
                $purchasedetail->price = $product['price'];
                $purchasedetail->vat = 0;
                $purchasedetail->discount = $product['total_discount'];

                $purchasedetail->save();


                // $stock = new Stock();
                // $stock->product_id = $product['item_id'];
                // $stock->qty = $product['qty'];
                // $stock->transaction_type_id = 2;
                // $stock->remark = "purchase";
                // $stock->created_at = date('Y-m-d H:i:s');
                // $stock->updated_at = date('Y-m-d H:i:s');
                // $stock->warehouse_id = 1;
                // $stock->save();



                $existingStock = Stock::where('product_id', $product['item_id'])
                    ->where('warehouse_id', 1)
                    ->first();

                if ($existingStock) {

                    $existingStock->qty += $product['qty'];
                    $existingStock->updated_at = now();
                    $existingStock->save();
                } else {

                    $stock = new Stock();
                    $stock->product_id = $product['item_id'];
                    $stock->qty = $product['qty'];
                    $stock->transaction_type_id = 1; 
                    $stock->remark = "purchase";
                    $stock->created_at = now();
                    $stock->updated_at = now();
                    $stock->warehouse_id = 1;
                    $stock->save();
                }
            }

            return response()->json(['success' => "saved successfully"]);
        } catch (\Throwable $th) {
            return response()->json(['error' => $th]);
        }
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
