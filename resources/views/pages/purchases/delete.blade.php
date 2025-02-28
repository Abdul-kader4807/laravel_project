@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-danger px-4">Delete Purchase</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-secondary" href="{{ url('purchase') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="text-danger">Are you sure you want to delete this purchase?</h5>

            <div class="mb-3">
                <p><strong>Purchase ID:</strong> {{ $purchase['id'] }}</p>
                <p><strong>Supplier:</strong> {{ $purchase['supplier_id'] }}</p>
                <p><strong>Product:</strong> {{ $purchase['product_id'] }}</p>
                <p><strong>Status:</strong> {{ $purchase['status_id'] }}</p>
                <p><strong>Total purchase:</strong> {{ $purchase['total_purchase'] }}</p>
                <p><strong>Paid Amount:</strong> {{ $purchase['paid_amount'] }}</p>
                <p><strong>Total Amount:</strong> {{ $purchase['total_amount'] }}</p>
                <p><strong>Discount:</strong> {{ $purchase['discount'] }}</p>
                <p><strong>VAT:</strong> {{ $purchase['vat'] }}</p>
                <p><strong>Purchase Date:</strong> {{ $purchase['purchase_date'] }}</p>
                <p><strong>Shipping Address:</strong> {{ $purchase['shipping_address'] }}</p>
                <p><strong>Description:</strong> {{ $purchase['description'] }}</p>
                <strong>Photo:</strong> <br>
                <img src="{{ asset('photo/' . $purchase['photo']) }}" alt="{{ $purchase['name'] }}" width="100">
            </div>

            <form action="{{ url("purchase/{$purchase['id']}") }}" method="post">
                @csrf
                @method('delete')

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4"
                        onclick="return confirm('Are you sure you want to delete this purchase? This action cannot be undone!');">
                        Yes, Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
