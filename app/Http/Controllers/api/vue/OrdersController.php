<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Order::query();

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
            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->user_id = $request->user_id;
            $order->total_order = $request->total_order;
            $order->discount = $request->discount;
            $order->shipping_address = $request->shipping_address;
            $order->paid_amount = $request->paid_amount;
            $order->status_id = $request->status_id;
            $order->order_date = $request->order_date;
            $order->delivery_date = $request->delivery_date;
            $order->vat = $request->vat;
            $order->uom_id = $request->uom_id;
            $order->remark = $request->remark;

            date_default_timezone_set("Asia/Dhaka");
            $order->created_at = date('Y-m-d H:i:s');
            $order->updated_at = date('Y-m-d H:i:s');

            $order->fill($request->all());

            $order->save();

            return response()->json(["order" =>  $order]);
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
            $order =  Order::find($id);
            return response()->json(["order" =>  $order]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    { try {
        $order = Order::find($id);
        $order->customer_id = $request->customer_id;
        $order->user_id = $request->user_id;
        $order->total_order = $request->total_order;
        $order->discount = $request->discount;
        $order->shipping_address = $request->shipping_address;
        $order->paid_amount = $request->paid_amount;
        $order->status_id = $request->status_id;
        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->vat = $request->vat;
        $order->uom_id = $request->uom_id;
        $order->remark = $request->remark;

        date_default_timezone_set("Asia/Dhaka");
        $order->created_at = date('Y-m-d H:i:s');
        $order->updated_at = date('Y-m-d H:i:s');



        $order->save();

        return response()->json(["order" =>  $order]);
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
            $deleteOrder =  Order::destroy($id);
            return response()->json(["deleted" =>  $deleteOrder]);
        } catch (\Throwable $th) {
            return response()->json(["error" => $th->getMessage()]);
        }
    }
}
