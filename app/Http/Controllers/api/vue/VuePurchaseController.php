<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\PurchaseDetail;
use App\Models\Status;
use App\Models\Stock;
use App\Models\Supplier;
use App\Models\Uom;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class VuePurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $suppliers= Supplier::all();
            $warehouse= Warehouse::all();
            $products= Product::all();
            $uoms= Uom::all();
            $status = Status::all();
            return response()->json(compact('suppliers', 'warehouse', 'products','uoms','status'));
         } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()]);
         }
    }

    public function process(Request $request)
    {
     // purchase table
      try {
        $purchase = new Purchase();
		$purchase->supplier_id=$request->supplier['id'];
		$purchase->purchase_date= now();
		$purchase->shipping_address=$request->supplier['address'];
		$purchase->total_purchase=$request->grandtotal;
		$purchase->paid_amount=$request->grandtotal;
        $purchase->total_amount ="";
		$purchase->description="";
        $purchase->status_id = $request->status['id'];

        $purchase->discount=$request->discount;
		$purchase->vat=$request->vat;

        date_default_timezone_set("Asia/Dhaka");
		$purchase->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$purchase->updated_at=date('Y-m-d H:i:s');
		$purchase->save();
        $last_id= $purchase->id;

        foreach ($request->products as $key => $product) {
            $purchasedetail = new PurchaseDetail();
            $purchasedetail->purchase_id= $last_id;
            $purchasedetail->product_id=$product['item_id'];
            $purchasedetail->qty=$product['qty'];
            $purchasedetail->price=$product['price'];
            $purchasedetail->total_purchase=$product['subtotal'];
            $purchasedetail->uom_id = $product['uom'];
            $purchasedetail->vat=$request->vat;
            $purchasedetail->discount=$product['discount'];
            date_default_timezone_set("Asia/Dhaka");
            $purchasedetail->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $purchasedetail->updated_at=date('Y-m-d H:i:s');
            $purchasedetail->save();

            $stock = new Stock();
            $stock->product_id = $product['item_id'];
            $stock->qty = $product['qty']; // positive qty because it's purchase
            $stock->transaction_type_id = 1; // if 1 is purchase
            $stock->remark = "purchase";
            $stock->warehouse_id = $request->warehouse['id'];
            $stock->created_at = now();
            $stock->save();
        }

        $allData= $request->all();
        return response()->json(["success"=> $allData]);

      } catch (\Throwable $th) {
        return response()->json(["err"=> $th->getMessage()]);
      }

    }





    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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
