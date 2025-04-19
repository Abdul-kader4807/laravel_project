<?php

namespace App\Http\Controllers\api\vue;

use App\Http\Controllers\Controller;
use App\Models\Purchase;
use App\Models\Status;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{


    public function index()
    {
        $suppliers = Supplier::all(['id', 'name']);
        $status = Status::all(['id', 'name']);

        return response()->json([
            'suppliers' => $suppliers,
            'status' => $status,
        ]);
    }


    public function purchaseReport(Request $request)
    { {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
        $supplier_id = $request->supplier_id;
        $status_id = $request->status_id;

        $query = Purchase::with(['supplier', 'status']);

        if ($startDate && $endDate) {
            $query->whereBetween('purchase_date', [$startDate, $endDate]);
        }

        if ($supplier_id) {
            $query->where('supplier_id', $supplier_id);
        }

        if ($status_id) {
            $query->where('status_id', $status_id);
        }

        $purchases = $query->orderBy('purchase_date', 'asc')->get();
        $total_purchase = $query->sum('total_purchase'); // Total Amount Calculation

        $suppliers = Supplier::all();
        $status = Status::all();

            return response()->json(compact(
                'purchases',
                'startDate',
                'endDate',
                'suppliers',
                'supplier_id',
                'status_id',
                'total_purchase'
            ));




    }
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
