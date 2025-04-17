<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Status;
use Illuminate\Http\Request;

class SalesReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::select('id', 'name')->get();
        $status = Status::select('id', 'name')->get();

        return response()->json([
            'customers' => $customers,
            'status' => $status,

        ]);
    }

    public function search(Request $request)
    {
        $query = Order::query();

        // Filter by Start Date
        if ($request->start_date) {
            $query->whereDate('	order_date', '>=', $request->start_date);
        }

        // Filter by End Date
        if ($request->end_date) {
            $query->whereDate('	order_date', '<=', $request->end_date);
        }

        // Filter by Customer
        if ($request->customer_id) {
            $query->where('customer_id', $request->customer_id);
        }

        // Filter by Payment Status
        if ($request->status_id) {
            $query->where('status_id', $request->status_id);
        }

        $orders = $query->orderBy('order_date', 'asc')->get(); // get data
        $total_order = $query->sum('total_order');             // calculate total

        return response()->json([
            'order' => $orders,
            'total_order' => $total_order,
        ]);
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
    public function show(Request $request)
    { {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $customer_id = $request->customer_id;
        $status_id = $request->status_id;

        $query = Order::query();

        if ($startDate && $endDate) {
            $query->whereBetween('	order_date', [$startDate, $endDate]);
        }

        if ($customer_id) {
            $query->where('customer_id', $customer_id);
        }

        if ($status_id) {
            $query->where('status_id', $status_id);
        }

        $orders = $query->orderBy('order_date', 'asc')->get();
        $total_order = $query->sum('total_order'); // Total Amount Calculation

        $customers = Customer::all();
        $status = Status::all();

        return view('pages.orders.report', compact(
            'sales',
            'startDate',
            'endDate',
            'customers',
            'customer_id',
            'status_id',
            'total_order'
        ));
    }
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
