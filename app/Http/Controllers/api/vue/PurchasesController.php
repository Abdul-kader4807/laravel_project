<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchasesController extends Controller
{
    public function index(Request $request)
    {
        $query = Purchase::query();

        if ($request->search) {
            $query->where('shipping_address', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $purchase = new Purchase();
            $purchase->supplier_id = $request->supplier_id;
            $purchase->product_id = $request->product_id;
            $purchase->status_id = $request->status_id;
            $purchase->total_order = $request->total_order;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->total_amount = $request->total_amount;
            $purchase->discount = $request->discount;
            $purchase->vat = $request->vat;
            // $purchase->photo = $request->photo;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->shipping_address = $request->shipping_address;
            $purchase->description = $request->description;

            date_default_timezone_set("Asia/Dhaka");
            $purchase->created_at = date('Y-m-d H:i:s');
            $purchase->updated_at = date('Y-m-d H:i:s');

            $purchase->fill($request->all());

            $purchase->save();

            return response()->json(["purchase" =>  $purchase]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $purchase =  Purchase::find($id);
            return response()->json(["purchase" =>  $purchase]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        try {
            $purchase =  Purchase::find($id);
            $purchase->supplier_id = $request->supplier_id;
            $purchase->product_id = $request->product_id;
            $purchase->status_id = $request->status_id;
            $purchase->total_order = $request->total_order;
            $purchase->paid_amount = $request->paid_amount;
            $purchase->total_amount = $request->total_amount;
            $purchase->discount = $request->discount;
            $purchase->vat = $request->vat;
            // $purchase->photo = $request->photo;
            $purchase->purchase_date = $request->purchase_date;
            $purchase->shipping_address = $request->shipping_address;
            $purchase->description = $request->description;

            date_default_timezone_set("Asia/Dhaka");
            $purchase->created_at = date('Y-m-d H:i:s');
            $purchase->updated_at = date('Y-m-d H:i:s');

            $purchase->fill($request->all());

            $purchase->save();

            return response()->json(["purchase" =>  $purchase]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $deletePurchase =  Purchase::destroy($id);
            return response()->json(["deleted" =>  $deletePurchase]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
