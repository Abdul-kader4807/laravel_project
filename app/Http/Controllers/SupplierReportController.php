<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierReportController extends Controller
{

    public function index()
    {
        return view('pages.suppliers.report', ['suppliers' => []]);
    }





    public function show(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $query = Supplier::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);

        }
        // if ($supplier_id) {
        //     $query->where('supplier_id',$supplier_id);

        // }

        $suppliers = $query->orderBy('created_at', 'asc')->get();

        return view('pages.suppliers.report', compact('suppliers', 'startDate', 'endDate'));
    }


}
