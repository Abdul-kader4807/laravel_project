<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use App\Models\Stock;
use App\Models\TransactionType;
use App\Models\Uom;
use App\Models\Warehouse;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{

    public function index()
    {
        // $stocks = Stock::paginate(6);


            $stocks = DB::table('stock as s')
                ->select('p.id', 'p.name', DB::raw('SUM(s.qty) as total_qty'))
                ->join('products as p', 'p.id', '=', 's.product_id')
                ->groupBy('p.id', 'p.name')
                ->paginate(10);

            return view('pages.stocks.index', compact('stocks'));

    }


    public function create()
    {
        $products = Product::all();
        $transactionTypes = TransactionType::all();
        $warehouses = Warehouse::all();
        $uoms = Uom::all();
        $batches = Batch::all();
        return view('pages.stocks.create', compact('products',  'warehouses', 'uoms'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'transaction_type_id' => 'required|exists:transaction_types,id',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouse,id',
            'qty' => 'required|integer|min:1',
            'uom_id' => 'required|exists:uoms,id',
            'batch_id' => 'required|exists:batches,id',
            'remark' => 'nullable|string|max:200',
        ]);

        $stock = new Stock();
        $stock->product_id = $request->product_id;
        $stock->transaction_type_id = $request->transaction_type_id;
        $stock->price = $request->price;
        $stock->offer_price = $request->offer_price;
        $stock->warehouse_id = $request->warehouse_id;
        $stock->qty = $request->qty;
        $stock->uom_id = $request->uom_id;
        $stock->batch_id = $request->batch_id;
        $stock->remark = $request->remark;


        if ($stock->save()) {
            return redirect('stock')->with('success', "Stock has been registred");
        };
    }


    public function show($id)
    {
        $stock = Stock::find($id);
        return view('pages.stocks.show', compact('stock'));
    }


    public function edit($id)
    {
        $stock = Stock::find($id);

        $products = Product::all();
        $transactionTypes = TransactionType::all();
        $warehouses = Warehouse::all();
        $uoms = Uom::all();
        $batches = Batch::all();
        $stock = Stock::where('id', $id)->get();

        return view('pages.stocks.update', compact('stock', 'products', 'warehouses', 'uoms'));
    }




    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'transaction_type_id' => 'required|exists:transaction_types,id',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouse,id',
            'qty' => 'required|integer|min:1',
            'uom_id' => 'required|exists:uoms,id',
            'batch_id' => 'required|exists:batches,id',
            'remark' => 'nullable|string|max:200',
        ]);
        $stock =  Stock::find($id);
        $stock->update($request->all());
        $stock->product_id = $request->product_id;
        $stock->transaction_type_id = $request->transaction_type_id;
        $stock->price = $request->price;
        $stock->offer_price = $request->offer_price;
        $stock->warehouse_id = $request->warehouse_id;
        $stock->qty = $request->qty;
        $stock->uom_id = $request->uom_id;
        $stock->batch_id = $request->batch_id;
        $stock->remark = $request->remark;


        if ($stock->save()) {
            return redirect('stock')->with('success', "Stock has been updated");
        };
    }

    public function destroy_view($id)

    {
        $stock = Stock::find($id);
        return view('pages.stocks.delete', compact('stock'));
    }



    public function destroy(string $id)
    {
        $del = Stock::destroy($id);
        if ($del) {
            return redirect('stock')->with('success', "Stock has been deleted");
        }
    }



    public function search(Request $request)
    {

        $query = $request->input('query');
        $stocks = Stock::where('product_id', 'like', "%{$query}%")
            ->orWhere('transaction_type_id', 'like', "%{$query}%")
            ->orWhere('warehouse_id', 'like', "%{$query}%")
            ->orWhere('uom_id', 'like', "%{$query}%")
            ->orWhere('batch_id', 'like', "%{$query}%")
            ->paginate(6);
        return view('pages.stocks.index', compact('stocks'));
    }


    
}
