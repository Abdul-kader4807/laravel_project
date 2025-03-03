<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{

    // public function index()
    // {
    //     $orders = Order::paginate(10);


    //     return view('pages.orders.report', ['orders','$orders' => []]);
    // }

    // public function show(Request $request)
    // {
    //     $startDate = $request->start_date;
    //     $endDate = $request->end_date;

    //     $query = Order::query();

    //     if ($startDate && $endDate) {
    //         $query->whereBetween('order_date', [$startDate, $endDate]);

    //     }
    //     // if ($supplier_id) {
    //     //     $query->where('supplier_id',$supplier_id);

    //     // }

    //     $orders = $query->orderBy('delivery_date', 'asc')->get();

    //     return view('pages.orders.report', compact('orders', 'startDate', 'endDate'));
    // }



    public function index()
    {
        $orders = Order::paginate(10); // Pagination added
        return view('pages.orders.report', compact('orders'));
    }

    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $search = $request->search;
       

        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);
        }

        if (!empty($search)) {
            $query->whereHas('customer', function ($q) use ($search) {
                $q->where('name', 'like', "%$search%");
            });
        }

        $orders = $query->orderBy('delivery_date', 'asc')->paginate(10)->appends(request()->input());

        return view('pages.orders.report', compact('orders', 'startDate', 'endDate', 'search'));
    }



















}
