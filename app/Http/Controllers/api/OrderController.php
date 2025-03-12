<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Stock;
use Illuminate\Http\Request;

use function Termwind\parse;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::all();
        return response()->json(['orders' => $orders],'ok');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //   print_r($request->all());


        $order = new Order;
        $order->customer_id = $request->customer_id;
        $order->order_date = now();
        $order->delivery_date = date('Y-m-d H:i:s', strtotime('+7 days'));
        $order->shipping_address = "";   //$request->shipping_address;
        $order->total_order = $request->total_order;
        $order->paid_amount = $request->paid_amount;
        $order->status_id = $request->status_id;
        $order->remark = "";   //$request->remark;

        $order->discount = $request->discount;
        $order->vat = $request->vat;
        // date_default_timezone_set("Asia/Dhaka");
        // $order->created_at=date('Y-m-d H:i:s');
        // date_default_timezone_set("Asia/Dhaka");
        // $order->updated_at=date('Y-m-d H:i:s');
        $order->save();
        $lastInsertedId = $order->id;

        $productsdata = $request->products;

        // print_r($productsdata);

        foreach ($productsdata as $key => $value) {
            //  print_r( $value['item_id']);
            $orderdetails = new OrderDetail;
            $orderdetails->order_id = $lastInsertedId;
            $orderdetails->product_id = $value['item_id'];
            $orderdetails->uom_id = $value['uom_id'];
            $orderdetails->qty = $value['qty'];
            $orderdetails->price = $value['price'];
            $orderdetails->discount = $value['total_discount'];
            $orderdetails->vat = $request->vat;
            // date_default_timezone_set("Asia/Dhaka");
            // $orderdetail->created_at=date('Y-m-d H:i:s');
            //  date_default_timezone_set("Asia/Dhaka");
            // $orderdetail->updated_at=date('Y-m-d H:i:s');

            $orderdetails->save();
            //   $lastInsertedId = $order->id;


            // $stock = Stock::where('product_id', $value['item_id'])->first();

            // if ($stock) {
            //     $stock->qty -= $value['qty'];
            //     $stock->updated_at = now();
            //     $stock->save();
            // } else {

            //     $newStock = new Stock();
            //     // $newStock->product_id = $value['item_id'];
            //     $newStock->qty = -$value['qty'];
            //     // $newStock->transaction_type_id = 2; // Sales transaction type
            //     // $newStock->remark = "Sales";
            //     // $newStock->warehouse_id = 1;
            // //     $newStock->created_at = now();
            // //     $newStock->updated_at = now();
            // //     $newStock->save();
            // // }





            $stock = new Stock;
            $stock->product_id = $value['item_id'];
            $stock->transaction_type_id = null;
            $stock->price = $value['price'];
            $stock->offer_price = null;
            $stock->warehouse_id = null;
            $stock->uom_id = $value['uom_id'];

            $stock->remark = "Sales";
            $stock->qty = $value['qty'] * (-1);

            $stock->save();






        }
        return response()->json(['success' => "order confirmed successfully"]);


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
