<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::all();
        return response()->json(["customers" =>  $customers]);
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



    public function saveReactorder(Request $request)
    {
        // print_r($request->all());
        try {


            $order = new Order();
            $order->customer_id = $request->customer_id;
            $order->order_date = now();
            $order->delivery_date = date('Y-m-d H:i:s', strtotime('+7 days'));
            $order->shipping_address = "";
            $order->total_order = $request->total_order;
            $order->paid_amount = $request->total_order;
            // $order->remark = "";
            $order->status_id = 1;
            $order->discount = $request->discount;
            $order->vat = $request->vat;
            $order->created_at = date('Y-m-d H:i:s');
            $order->updated_at = date('Y-m-d H:i:s');
            $order->save();
            $lastInsertedId = $order->id;



            foreach ($request->products as $key => $product) {


                $orderdetail = new OrderDetail();
                $orderdetail->order_id = $lastInsertedId;
                $orderdetail->product_id = $product['item_id'];
                $orderdetail->qty = $product['qty'];
                $orderdetail->price = $product['price'];
                $orderdetail->vat = 0;
                $orderdetail->discount = $product['total_discount'];

                $orderdetail->save();


                // $stock = new Stock();
                // $stock->product_id = $product['item_id'];
                // $stock->qty = $product['qty'];
                // $stock->transaction_type_id = 2;
                // $stock->remark = "seals";
                // $stock->created_at = date('Y-m-d H:i:s');
                // $stock->updated_at = date('Y-m-d H:i:s');
                // $stock->warehouse_id = 1;
                // $stock->save();

                $existingStock = Stock::where('product_id', $product['item_id'])
                    ->where('warehouse_id', 1)
                    ->first();

                if ($existingStock) {

                    $existingStock->qty -= $product['qty'];
                    $existingStock->updated_at = now();
                    $existingStock->save();
                } else {

                    $stock = new Stock();
                    $stock->product_id = $product['item_id'];
                    $stock->qty = -$product['qty']; 
                    $stock->transaction_type_id = 2;
                    $stock->remark = "sales";
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







    public function create()
    {
        //
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
