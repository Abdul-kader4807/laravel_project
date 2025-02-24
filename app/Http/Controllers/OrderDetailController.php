<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Uom;
use Illuminate\Http\Request;

class OrderDetailController extends Controller
{

    public function index()
    {
        $order_details = OrderDetail::paginate(8);
        return view('pages.orderDetails.index', compact('order_details'));
    }



    public function create()
    {

        $products = Product::all();
        $orders = Order::all();
        $uoms = Uom::all();
        return view('pages.orderDetails.create', compact('products','orders','uoms'));
    }



    public function store(Request $request)
    {
        $request->validate([

            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'vat' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',

        ]);
        $order_detail = new OrderDetail();
        $order_detail->order_id = $request->order_id;
        $order_detail->product_id = $request->product_id;
        $order_detail->uom_id = $request->uom_id;
        $order_detail->qty = $request->qty;
        $order_detail->price = $request->price;
        $order_detail->vat = $request->vat;
        $order_detail->discount = $request->discount;


        if ($order_detail->save()) {
            return redirect('order_detail')->with('success', "Order_details has been registered");
        };


    }



    public function show(string $id)
    {
        $order_detail = OrderDetail::find($id);
        return view('pages.orderDetails.show', compact('order_detail'));
    }



    public function edit(string $id)
    {
        $products = Product::all();
        $orders = Order::all();
        $uoms = Uom::all();
        return view('pages.orderDetails.create', compact('products','orders','uoms'));
    }


    public function update(Request $request, string $id)
    {
        $request->validate([

            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'uom_id' => 'required|exists:uoms,id',
            'qty' => 'nullable|numeric|min:0',
            'price' => 'required|numeric|min:0',
            'vat' => 'nullable|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',

        ]);

        $order_detail =  OrderDetail::find($id);
        $order_detail->order_id = $request->order_id;
        $order_detail->product_id = $request->product_id;
        $order_detail->uom_id = $request->uom_id;
        $order_detail->qty = $request->qty;
        $order_detail->price = $request->price;
        $order_detail->vat = $request->vat;
        $order_detail->discount = $request->discount;


        if ($order_detail->save()) {
            return redirect('order_detail')->with('success', "Order_details has been registered");
        };

    }
public function destroy_view($id)
    {
        $order_detail = OrderDetail::find($id);
        return view('pages.orderDetails.delete', compact('order_detail'));
    }


    public function destroy($id)
    {
        $del = OrderDetail::destroy($id);
        if ($del) {
            return redirect('order_detail')->with('success', "order_details has been Deleted");
        }
    }



    public function search(Request $request)

    {
        $query = $request->input('query');


        $order_details = OrderDetail::where('order_id', "like", "%{$query}%")
            ->orWhere('product_id', 'like', "%{$query}%")
            ->orWhere('uom_id', 'like', "%{$query}%")
            ->paginate(8);
        return view('pages.orderDetails.index', compact('order_details'));

        if ($order_details) {
            return view('pages.orderDetails.index', compact('order_details'));
        } else {
            $order_details = [];
        }
    }






}
