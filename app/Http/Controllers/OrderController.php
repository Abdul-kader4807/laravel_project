<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Status;
use App\Models\Uom;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::paginate(10);

        // echo json_encode(OrderDetail::with('product')->where('order_id', 4)->get());

       return view('pages.orders.index', compact('orders'));
    }


    public function create()
    {
        $customers = Customer::all();
        $products= Product::all();
        $users = User::all();
        $statuses = Status::all();
        $uoms= Uom::all();
        return view('pages.orders.create', compact('customers', 'users', 'statuses','uoms','products'));
    }



    public function store(Request $request)
    {
        $request->validate([

            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:status,id',
            'uom_id' => 'required|exists:uoms,id',
            'total_order' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'vat' => 'nullable|numeric|min:0',
            'shipping_address' => 'nullable|min:4',
            'order_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'remark' => 'nullable|min:4',
        ]);
        $order = new Order();
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->status_id = $request->status_id;
        $order->uom_id = $request->uom_id;
        $order->total_order = $request->total_order;
        $order->paid_amount = $request->paid_amount;
        $order->discount = $request->discount;
        $order->vat = $request->vat;
        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->shipping_address = $request->shipping_address;
        $order->remark = $request->remark;

        if ($order->save()) {
            return redirect('order')->with('success', "Order has been registered");
        };




    }


    public function show($orderId)
    {
        $order = Order::with(['orderDetails.product', 'customer'])->findOrFail($orderId);

        return view('pages.orders.show', compact('order'));

    }

//sir pdf work
    public function generatePDF($orderId)
    {
        // Fetch data from database
        $order = Order::with(['orderDetails.product', 'customer'])->findOrFail($orderId);

        // Load view and pass data
        $pdf = Pdf::loadView('pages.orders.pdf', compact('order'));

        // Return PDF for download
        // return $pdf->download('invoice.pdf');
        \Illuminate\Support\Facades\Storage::put('public/invoice.pdf', $pdf->output());
        return $pdf->stream('invoice.pdf');

    }


//chatgbt pdf work
    public function downloadPDF($orderId)
    {
        // অর্ডার ও প্রয়োজনীয় সম্পর্কিত তথ্য লোড করা
        $order = Order::with(['orderDetails.product', 'customer'])->findOrFail($orderId);

        // PDF ফাইল জেনারেট করা
        $pdf = Pdf::loadView('pages.orders.pdf', compact('order'));

        // ফাইল ডাউনলোড করা
        return $pdf->download("invoice_{$order->id}.pdf");
    }






// //stock order chgbt
// public function placeOrder(Request $request)
// {
//     $product = DB::table('products')->where('id', $request->product_id)->first();

//     if ($product->qty >= $request->qty) {
//         DB::table('orders')->insert([
//             'product_id' => $request->product_id,
//             'qty' => $request->qty
//         ]);

//         DB::table('products')->where('id', $request->product_id)->decrement('qty', $request->qty);

//         return back()->with('success', 'Order placed successfully!');
//     } else {
//         return back()->with('error', 'Not enough stock!');
//     }
// }















    public function edit(string $id)
    {
        $customers = Customer::all();
        $products= Product::all();
        $users = User::all();
        $statuses = Status::all();
        $uoms= Uom::all();
        return view('pages.orders.update', compact('customers', 'users', 'statuses','uoms','products'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([

            'customer_id' => 'required|exists:customers,id',
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'status_id' => 'required|exists:status,id',
            'uom_id' => 'required|exists:uoms,id',
            'total_order' => 'nullable|numeric|min:0',
            'paid_amount' => 'required|numeric|min:0',
            'discount' => 'nullable|numeric|min:0',
            'vat' => 'nullable|numeric|min:0',
            'shipping_address' => 'nullable|min:4',
            'order_date' => 'nullable|date',
            'delivery_date' => 'nullable|date',
            'remark' => 'nullable|min:4',
        ]);

        $order =  Order::find($id);
        $order->customer_id = $request->customer_id;
        $order->product_id = $request->product_id;
        $order->user_id = $request->user_id;
        $order->status_id = $request->status_id;
        $order->uom_id = $request->uom_id;
        $order->total_order = $request->total_order;
        $order->paid_amount = $request->paid_amount;
        $order->total_amount = $request->total_amount;
        $order->discount = $request->discount;
        $order->vat = $request->vat;
        $order->order_date = $request->order_date;
        $order->delivery_date = $request->delivery_date;
        $order->shipping_address = $request->shipping_address;
        $order->remark = $request->remark;

        if ($order->save()) {
            return redirect('order')->with('success', "Order has been updated");
        };





    }

    public function destroy_view($id)
    {
        $order = Order::find($id);
        return view('pages.orders.delete', compact('order'));
    }



    public function destroy(string $id)
    {
        $del = Order::destroy($id);
        if ($del) {
            return redirect('order')->with('success', "Order has been Deleted");
        }
    }



    public function search(Request $request)

    {
        $query = $request->input('query');


        $orders = Order::where('product_id', "like", "%{$query}%")
            ->orWhere('customer_id', 'like', "%{$query}%")
            ->orWhere('user_id', 'like', "%{$query}%")
            ->orWhere('status_id', 'like', "%{$query}%")
            ->paginate(8);
        return view('pages.orders.index', compact('orders'));

        if ($orders) {
            return view('pages.orders.index', compact('orders'));
        } else {
            $orders = [];
        }
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
