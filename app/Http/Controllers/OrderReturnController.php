<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderReturn;
use App\Models\Product;
use App\Models\Uom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderReturnController extends Controller
{

    public function index()
    {
        $returns = DB::table('order_returns as sr') // Use correct table name
            ->join('orders as o', 'o.id', '=', 'sr.order_id') // Corrected join condition
            ->join('products as p', 'p.id', '=', 'sr.product_id')
            ->join('customers as c', 'c.id', '=', 'sr.customer_id')
            ->select('sr.id', 'c.name as customer', 'p.name as product', 'sr.total_sold', 'sr.total_return', 'sr.return_reason', 'sr.created_at')
            ->orderBy('sr.created_at', 'desc')
            ->paginate(10);

        return view('pages.order_returns.index', compact('returns'));
    }

    public function create()
    {
        $orders = Order::all();
        $products = Product::all();
        $customers = Customer::all();
        $uoms = Uom::all();
        return view('pages.order_returns.create', compact('orders', 'products', 'customers','uoms'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required|exists:customers,id',
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'total_sold' => 'required|numeric|min:1',
            'total_return' => 'required|numeric|min:1|lte:total_sold',
            'return_reason' => 'nullable|string|max:255'
        ]);

        $return = new OrderReturn();
        $return->customer_id = $request->customer_id;
        $return->order_id = $request->order_id;
        $return->product_id = $request->product_id;
        $return->total_sold = $request->total_sold;
        $return->total_return = $request->total_return;
        $return->return_reason = $request->return_reason;
        $return->save();

        return redirect()->route('order_returns')->with('success', 'Sales return recorded successfully.');
    }

    public function show($id)
    {
        $return = OrderReturn::find($id);
        return view('pages.order_returns.show', compact('return'));
    }


    public function destroy_view($id)
    {
        $return = OrderReturn::find($id);
        return view('pages.order_returns.delete', compact('return'));
    }





    public function destroy($id)
    {
        OrderReturn::destroy($id);
        return redirect()->route('order_returns')->with('success', 'Sales return deleted successfully.');
    }







    public function find_customer(Request $request){
		$customer = Customer::find($request->id);
		return response()->json(['customer'=> $customer]);
	}


	public function find_product(Request $request){
		$product = Product::find($request->id);
        // print_r($product);
		return response()->json(['product'=> $product]);
	}



    public function find_uom(Request $request){
		$uom = Uom::find($request->id);
		return response()->json(['uom'=> $uom]);
	}








}
