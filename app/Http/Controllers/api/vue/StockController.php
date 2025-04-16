<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    public function index(Request $request)
    {
        // $query = Stock::query();
        $query = Stock::with(['product', 'uom']);
        if ($request->search) {
            $query->where('remark', 'like', "%{$request->search}%");
        }
        return response()->json($query->paginate(5));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $stock = new Stock();
            $stock->product_id = $request->product_id;
            $stock->price = $request->price;
            $stock->qty = $request->qty;
            $stock->uom_id = $request->uom_id;
            $stock->remark = $request->remark;


            date_default_timezone_set("Asia/Dhaka");
            $stock->created_at = date('Y-m-d H:i:s');
            $stock->updated_at = date('Y-m-d H:i:s');



            $stock->save();

            return response()->json(["stock" =>  $stock]);
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
            $stock =  Stock::find($id);
            return response()->json(["stock" =>  $stock]);
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
            $stock =  Stock::find($id);
            $stock->product_id = $request->product_id;
            $stock->price = $request->price;
            $stock->qty = $request->qty;
            $stock->uom_id = $request->uom_id;
            $stock->remark = $request->remark;


            date_default_timezone_set("Asia/Dhaka");
            $stock->created_at = date('Y-m-d H:i:s');
            $stock->updated_at = date('Y-m-d H:i:s');



            $stock->save();

            return response()->json(["stock" =>  $stock]);
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
            $deleteStock =  Stock::destroy($id);
            return response()->json(["deleted" =>  $deleteStock]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
