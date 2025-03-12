@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-danger px-4">Delete stock</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-secondary" href="{{ url('stock') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="text-danger">Are you sure you want to delete this stock?</h5>

            <div class="mb-3">
                <p><strong>Stock ID:</strong> {{ $stock->id }}</p>

                <p><strong>Category_id:</strong> {{ $stock['category_id'] }}</p>
                <p><strong>product_id:</strong> {{ $stock['product_id'] }}</p>
                <p><strong>transaction_type_id:</strong> {{ $stock['transaction_type_id'] }}</p>
                <p><strong>Price:</strong> {{ $stock['price'] }}</p>
                <p><strong>Offer_price:</strong> {{ $stock['offer_price'] }}</p>
                <p><strong>warehouse_id:</strong> {{ $stock['warehouse_id'] }}</p>

                <p><strong>qty:</strong> {{ $stock['qty'] }}</p>
                <p><strong>Uom_id:</strong> {{ $stock['uom_id'] }}</p>

                

                <p><strong>remark:</strong> {{ $stock['remark'] }}</p>
                <p><strong>created_at:</strong> {{ $stock['created_at'] }}</p>
                <p><strong>updated_at:</strong> {{ $stock['updated_at'] }}</p>


            </div>

            <form action="{{ url("stock/{$stock['id']}") }}" method="post">
                @csrf
                @method('delete')

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4"
                        onclick="return confirm('Are you sure you want to delete this stock? This action cannot be undone!');">
                        Yes, Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
