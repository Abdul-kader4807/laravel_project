
@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-6">
        <h4 class="mb-3 btn btn-danger px-4">Delete payment_status</h4>
    </div>

    <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
        <a class="btn btn-secondary" href="{{ url('payment_status') }}">Back</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <h5 class="text-danger">Are you sure you want to delete the payment_status "{{ $payment_status['name'] }}"?</h5>

        <div class="mb-3">
            <strong>ID:</strong> {{ $payment_status['id'] }} <br>
            <strong>Name:</strong> {{ $payment_status['name'] }} <br>
            <strong>Description:</strong> {{ $payment_status['description'] }} <br>
        </div>

        <form action="{{ url("payment_status/{$payment_status['id']}") }}" method="post">
            @csrf
            @method('delete')

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-danger px-4"
                    onclick="return confirm('Are you sure you want to delete this payment_status? This action cannot be undone!');">
                    Yes, Delete
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
