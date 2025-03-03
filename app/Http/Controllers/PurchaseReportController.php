<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;

class PurchaseReportController extends Controller
{

    public function index()
    {
        return view('pages.purchases.report', ['purchases' => []]);
    }




    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Purchase::query();

        if ($startDate && $endDate) {
            $query->whereBetween('purchase_date', [$startDate, $endDate]);

        }
        // if ($supplier_id) {
        //     $query->where('supplier_id',$supplier_id);

        // }

        $purchases = $query->orderBy('purchase_date', 'asc')->get();

        return view('pages.purchases.report', compact('purchases', 'startDate', 'endDate'));
    }





}
