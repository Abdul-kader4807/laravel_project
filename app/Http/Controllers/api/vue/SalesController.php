<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Status;
use App\Models\Stock;
use App\Models\Uom;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $customers= Customer::all();
            $warehouse= Warehouse::all();
            $products= Product::all();
            $uoms= Uom::all();
            $status = Status::all();
            return response()->json(compact('customers', 'warehouse', 'products','uoms','status'));
         } catch (\Throwable $th) {
            return response()->json(["error"=> $th->getMessage()]);
         }
    }

    public function process(Request $request)
    {
     // order table
      try {
        $order = new Order();
		$order->customer_id=$request->customer['id'];
		$order->order_date= now();
		$order->delivery_date=  date('Y-m-d', strtotime('+7 days'));
		$order->shipping_address=$request->customer['address'];
		$order->total_order=$request->grandtotal;
		$order->paid_amount=$request->grandtotal;
		$order->remark="sales";
		$order->status_id=1;
		$order->discount=$request->discount;
		$order->vat=$request->vat;
        date_default_timezone_set("Asia/Dhaka");
		$order->created_at=date('Y-m-d H:i:s');
        date_default_timezone_set("Asia/Dhaka");
		$order->updated_at=date('Y-m-d H:i:s');
		$order->save();
        $last_id= $order->id;

        foreach ($request->products as $key => $product) {

            $orderdetail = new OrderDetail();
            $orderdetail->order_id= $last_id;
            $orderdetail->product_id=$product['item_id'];
            $orderdetail->qty=$product['qty'];
            $orderdetail->price=$product['price'];
            $orderdetail->vat=$request->vat;
            $orderdetail->uom_id= $product['uom'];
            $orderdetail->discount=$product['discount'];
            date_default_timezone_set("Asia/Dhaka");
            $orderdetail->created_at=date('Y-m-d H:i:s');
             date_default_timezone_set("Asia/Dhaka");
            $orderdetail->updated_at=date('Y-m-d H:i:s');
            $orderdetail->save();

            $stock = new Stock();
            $stock->product_id=$product['item_id'];
            $stock->qty=$product['qty'] * -1;
            $stock->transaction_type_id	=2;
            $stock->remark="Sales";
            date_default_timezone_set("Asia/Dhaka");
            $stock->created_at=date('Y-m-d H:i:s');
            $stock->warehouse_id=$request->warehouse['id'];
            $stock->save();

        }

        $allData= $request->all();
        return response()->json(["success"=> $allData,]);

      } catch (\Throwable $th) {
        return response()->json(["err"=> $th->getMessage()]);
      }

    }










}
