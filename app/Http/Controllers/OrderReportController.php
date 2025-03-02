<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderReportController extends Controller
{

    public function index()
    {
        return view('pages.orders.report', ['orders' => []]);
    }




    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('order_date', [$startDate, $endDate]);

        }
        // if ($supplier_id) {
        //     $query->where('supplier_id',$supplier_id);

        // }

        $orders = $query->orderBy('delivery_date', 'asc')->get();

        return view('pages.orders.report', compact('orders', 'startDate', 'endDate'));
    }





}
