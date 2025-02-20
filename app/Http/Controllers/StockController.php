<?php

namespace App\Http\Controllers;

use App\Models\Batch;
use App\Models\Product;
use App\Models\Stock;
use App\Models\TransactionType;
use App\Models\Uom;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class StockController extends Controller
{

    public function index()
    {
        $stocks = Stock::paginate(3);
        return view('pages.stocks.index', compact('stocks'));

    }


    public function create()
    {
        $products = Product::all();
        $transactionTypes = TransactionType::all();
        $warehouses = Warehouse::all();
        $uoms = Uom::all();
        $batches = Batch::all();
        return view('pages.phar_stock.create', compact('products', 'transactionTypes', 'warehouses', 'uoms', 'batches'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'transaction_type_id' => 'required|exists:transaction_types,id',
            'price' => 'required|numeric|min:0',
            'offer_price' => 'nullable|numeric|min:0',
            'warehouse_id' => 'required|exists:warehouses,id',
            'quantity' => 'required|integer|min:1',
            'uom_id' => 'required|exists:uoms,id',
            'batch_id' => 'required|exists:batches,id',
            'remark' => 'nullable|string|max:200',
        ]);



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
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




// class PharStockController extends Controller
// {
//     public function index()
//     {
//         $stocks = PharStock::paginate(10);
//         return view('pages.phar_stock.index', compact('stocks'));
//     }

//     public function create()
//     {
//         $products = Product::all();
//         $transactionTypes = TransactionType::all();
//         $warehouses = Warehouse::all();
//         $uoms = Uom::all();
//         $batches = Batch::all();
//         return view('pages.phar_stock.create', compact('products', 'transactionTypes', 'warehouses', 'uoms', 'batches'));
//     }

//     public function store(Request $request)
//     {
//         $request->validate([
//             'product_id' => 'required|exists:products,id',
//             'transaction_type_id' => 'required|exists:transaction_types,id',
//             'price' => 'required|numeric|min:0',
//             'offer_price' => 'nullable|numeric|min:0',
//             'warehouse_id' => 'required|exists:warehouses,id',
//             'quantity' => 'required|integer|min:1',
//             'uom_id' => 'required|exists:uoms,id',
//             'batch_id' => 'required|exists:batches,id',
//             'remark' => 'nullable|string|max:200',
//         ]);

//         PharStock::create($request->all());
//         return redirect('phar_stock')->with('success', 'Stock record added successfully');
//     }

//     public function show($id)
//     {
//         $stock = PharStock::findOrFail($id);
//         return view('pages.phar_stock.show', compact('stock'));
//     }

//     public function edit($id)
//     {
//         $stock = PharStock::findOrFail($id);
//         $products = Product::all();
//         $transactionTypes = TransactionType::all();
//         $warehouses = Warehouse::all();
//         $uoms = Uom::all();
//         $batches = Batch::all();
//         return view('pages.phar_stock.edit', compact('stock', 'products', 'transactionTypes', 'warehouses', 'uoms', 'batches'));
//     }

//     public function update(Request $request, $id)
//     {
//         $request->validate([
//             'product_id' => 'required|exists:products,id',
//             'transaction_type_id' => 'required|exists:transaction_types,id',
//             'price' => 'required|numeric|min:0',
//             'offer_price' => 'nullable|numeric|min:0',
//             'warehouse_id' => 'required|exists:warehouses,id',
//             'quantity' => 'required|integer|min:1',
//             'uom_id' => 'required|exists:uoms,id',
//             'batch_id' => 'required|exists:batches,id',
//             'remark' => 'nullable|string|max:200',
//         ]);

//         $stock = PharStock::findOrFail($id);
//         $stock->update($request->all());
//         return redirect('phar_stock')->with('success', 'Stock record updated successfully');
//     }

//     public function destroy($id)
//     {
//         PharStock::destroy($id);
//         return redirect('phar_stock')->with('success', 'Stock record deleted successfully');
//     }

//     public function search(Request $request)
//     {
//         $query = $request->input('query');
//         $stocks = PharStock::where('product_id', 'like', "%{$query}%")
//             ->orWhere('warehouse_id', 'like', "%{$query}%")
//             ->paginate(10);
//         return view('pages.phar_stock.index', compact('stocks'));
//     }
// }
