
@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-danger px-4">Delete order_detail</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-secondary" href="{{ url('order_detail') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="text-danger">Are you sure you want to delete the order_detail "{{ $order_detail['name'] }}"?</h5>

            <div class="mb-3">
                <strong>ID:</strong> {{ $order_detail['id'] }} <br>
                <strong>order_id:</strong> {{ $order_detail['order_id'] }} <br>
                <strong>product_id:</strong> {{ $order_detail['product_id'] }} <br>
                <strong>qty:</strong> {{ $order_detail['qty'] }} <br>
                <strong>price:</strong> {{ $order_detail['price'] }} <br>
                <strong>vat:</strong> {{ $order_detail['vat'] }} <br>
                <strong>uom_id:</strong> {{ $order_detail['uom_id'] }} <br>
                <strong>discount:</strong> {{ $order_detail['discount'] }} <br>

            </div>

            <form action="{{ url("order_detail/{$order_detail['id']}") }}" method="post">
                @csrf
                @method('delete')

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4"
                        onclick="return confirm('Are you sure you want to delete this order_detail? This action cannot be undone!');">
                        Yes, Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

