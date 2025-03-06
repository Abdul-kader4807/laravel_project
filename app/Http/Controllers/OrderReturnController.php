<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderReturn;
use App\Models\Product;

use Illuminate\Http\Request;

class OrderReturnController extends Controller
{

    public function index(Request $request)
    {
        $orderId = $request->input('order_id');
        $order = null;
        $returns = [];

        if ($orderId) {
            $order = Order::with('products')->find($orderId);
            $returns = OrderReturn::with(['product', 'order'])
                ->where('order_id', $orderId)
                ->get();
        }

        return view('pages.order_returns.index', compact('returns', 'orderId', 'order'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'order_id' => 'required|exists:orders,id',
            'product_id' => 'required|exists:products,id',
            'total_return' => 'required|numeric|min:0.01',
            'return_reason' => 'nullable|string'
        ]);

        // Verify product belongs to order
        $order = Order::findOrFail($validated['order_id']);
        $product = $order->products()->find($validated['product_id']);

        if (!$product) {
            return back()->withErrors(['product_id' => 'This product does not belong to the order']);
        }

        // Calculate remaining return quantity
        $originalQuantity = $product->pivot->quantity;
        $existingReturns = OrderReturn::where('order_id', $validated['order_id'])
            ->where('product_id', $validated['product_id'])
            ->sum('total_return');

        $remainingQuantity = $originalQuantity - $existingReturns;

        if ($validated['total_return'] > $remainingQuantity) {
            return back()->withErrors(['total_return' => "Maximum return quantity allowed: $remainingQuantity"]);
        }

        // Create return record
        $return = OrderReturn::create([
            'customer_id' => auth()->id(),
            'order_id' => $validated['order_id'],
            'product_id' => $validated['product_id'],
            'total_sold' => $originalQuantity,
            'total_return' => $validated['total_return'],
            'return_reason' => $validated['return_reason']
        ]);

        // Update stock
        Product::where('id', $validated['product_id'])
            ->increment('stock', $validated['total_return']);

        return redirect()->route('order_returns.index', ['order_id' => $validated['order_id']])
            ->with('success', 'Return processed successfully!');
    }

}



