@extends('layout.backend.main')

@section('page_content')
<div class="container">
    <h2>Order Return Management</h2>

    <!-- Search Form -->
    <form method="GET" class="mb-4">
        <div class="input-group">
            <input type="number" name="order_id" class="form-control"
                   placeholder="Enter Order ID" value="{{ $orderId ?? '' }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
        @error('order_id')
            <div class="text-danger">{{ $message }}</div>
        @enderror
    </form>

    @if(isset($orderId))
        @if($order)
            <!-- Return Form -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5>New Return</h5>
                    <form method="POST" action="{{ route('order_returns.store') }}">
                        @csrf
                        <input type="hidden" name="order_id" value="{{ $orderId }}">

                        <div class="mb-3">
                            <label>Select Product</label>
                            <select name="product_id" class="form-select" required>
                                @foreach($order->products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                                @endforeach
                            </select>
                            @error('product_id')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Return Quantity</label>
                            <input type="number" step="0.01" name="total_return"
                                   class="form-control" required>
                            @error('total_return')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label>Return Reason</label>
                            <textarea name="return_reason" class="form-control" rows="3"></textarea>
                        </div>

                        <button type="submit" class="btn btn-success">Submit</button>
                    </form>
                </div>
            </div>
        @else
            <div class="alert alert-danger">
                Order #{{ $orderId }} not found!
            </div>
        @endif

        <!-- Existing Returns -->
        @if($returns->count() > 0)
            <h4>Return History</h4>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Sold Qty</th>
                        <th>Returned Qty</th>
                        <th>Reason</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($returns as $return)
                    <tr>
                        <td>{{ $return->product->name }}</td>
                        <td>{{ $return->total_sold }}</td>
                        <td>{{ $return->total_return }}</td>
                        <td>{{ $return->return_reason ?? 'N/A' }}</td>
                        <td>{{ $return->created_at->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <div class="alert alert-info">
                No returns found for this order.
            </div>
        @endif
    @endif
</div>
@endsection
