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


        // $stocks = DB::table('phar_stock as s')
        //     ->select('s.id', 'p.name', DB::raw('SUM(s.qty) as total_qty'))
        //     ->join('products as p', 'p.id', '=', 's.product_id')
        //     ->groupBy('s.product_id')
        //     ->paginate(10);

        $stocks = Stock::selectRaw('product_id, remark, SUM(qty) as total_qty')
            ->with([
                'product:id,name,price,uom_id', // Ensure uom_id is included to avoid relationship issues
                'product.uom:id,name' // Load only id and name from UOM
            ])
            ->groupBy('product_id')
            ->paginate(10);



        // echo json_encode($stocks);

        return view('pages.stocks.index', compact('stocks'));
    }

    // public function generatePDF()
    // {
    //     // Fetch data from database
    //     $stocks = Stock::with(['product:id,name,price'])->get();

    //     // Load view and pass data
    //     $pdf = Pdf::loadView('pdf.stock_report', compact('stocks'));

    //     // Return PDF for download
    //     return $pdf->download('stock_report.pdf');
    // }


    public function create()
    {
        $products = Product::all();
        $transactionTypes = TransactionType::all();
        $warehouses = Warehouse::all();
        $uoms = Uom::all();

        return view('pages.stocks.create', compact('products','transactionTypes' , 'warehouses', 'uoms'));
    }


    public function store(Request $request)
    {
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'transaction_type_id' => 'required|exists:transaction_types,id',
        //     'price' => 'required|numeric|min:0',
        //     'offer_price' => 'nullable|numeric|min:0',
        //     'warehouse_id' => 'required|exists:warehouses,id',
        //     'qty' => 'required|integer|min:1',
        //     'uom_id' => 'required|exists:uoms,id',
        //     'batch_id' => 'required|exists:batches,id',
        //     'remark' => 'nullable|string|max:200',
        // ]);

        // $stock = new Stock();
        // $stock->product_id = $request->product_id;
        // $stock->transaction_type_id = $request->transaction_type_id;
        // $stock->price = $request->price;
        // $stock->offer_price = $request->offer_price;
        // $stock->warehouse_id = $request->warehouse_id;
        // $stock->qty = $request->qty;
        // $stock->uom_id = $request->uom_id;
        // $stock->batch_id = $request->batch_id;
        // $stock->remark = $request->remark;


        // if ($stock->save()) {
        //     return redirect('stock')->with('success', "Stock has been registred");
        // };


        $request->validate([
            'product_id' => 'required|exists:products,id',
            'transaction_type_id' => 'nullable|exists:transaction_types,id',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouse,id',
            'qty' => 'required|integer|min:1',
            'uom_id' => 'required|exists:uoms,id',

            'remark' => 'nullable|string|max:200',
        ]);

        $stock = Stock::create($request->all());

        return redirect('stock')->with('success', "Stock has been registered");
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

        // $stock = Stock::where('id', $id)->get();

        return view('pages.stocks.update', compact('stock', 'products','transactionTypes', 'warehouses', 'uoms'));
    }




    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'product_id' => 'required|exists:products,id',
        //     'transaction_type_id' => 'required|exists:transaction_types,id',
        //     'price' => 'required|numeric|min:0',
        //     'offer_price' => 'nullable|numeric|min:0',
        //     'warehouse_id' => 'required|exists:warehouse,id',
        //     'qty' => 'required|integer|min:1',
        //     'uom_id' => 'required|exists:uoms,id',
        //     'batch_id' => 'required|exists:batches,id',
        //     'remark' => 'nullable|string|max:200',
        // ]);
        // $stock =  Stock::find($id);
        // $stock->update($request->all());
        // $stock->product_id = $request->product_id;
        // $stock->transaction_type_id = $request->transaction_type_id;
        // $stock->price = $request->price;
        // $stock->offer_price = $request->offer_price;
        // $stock->warehouse_id = $request->warehouse_id;
        // $stock->qty = $request->qty;
        // $stock->uom_id = $request->uom_id;
        // $stock->batch_id = $request->batch_id;
        // $stock->remark = $request->remark;


        // if ($stock->save()) {
        //     return redirect('stock')->with('success', "Stock has been updated");
        // };


        $request->validate([
            'product_id' => 'required|exists:products,id',
           'transaction_type_id' => 'nullable|exists:transaction_types,id',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouse,id',
            'qty' => 'required|integer|min:1',
            'uom_id' => 'required|exists:uoms,id',

            'remark' => 'nullable|string|max:200',
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update($request->all());

        return redirect('stock')->with('success', "Stock has been updated");
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

            ->paginate(6);
        return view('pages.stocks.index', compact('stocks'));
    }
}
