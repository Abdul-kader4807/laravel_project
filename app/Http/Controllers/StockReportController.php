<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StockReportController extends Controller
{
    public function index()
    {
        return view('pages.stocks.report', ['stocks' => []]);
    }

    // this code used chatgbt
    public function show(Request $request)
    {
        $startDate = Carbon::parse($request->start_date)->startOfDay();
        $endDate = Carbon::parse($request->end_date)->endOfDay();
        $remark = $request->remark;
        $query = Stock::query();

        if ($startDate && $endDate) {
            $query->whereBetween('created_at', [$startDate, $endDate]);
        }

        if(!empty($remark)){
            $query->where('remark',$remark);
        }

        $stocks = $query->orderBy('created_at', 'asc')->get();

        return view('pages.stocks.report', compact('stocks', 'startDate', 'endDate'));
    }
}
