
@extends('layout.backend.main')

@section('page_content')

<div class="row">
    <div class="col-6">
        <h4 class="mb-3 btn btn-danger px-4">Delete Status</h4>
    </div>

    <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
        <a class="btn btn-secondary" href="{{ url('status') }}">Back</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <h5 class="text-danger">Are you sure you want to delete the status "{{ $status['name'] }}"?</h5>

        <div class="mb-3">
            <strong>ID:</strong> {{ $status['id'] }} <br>
            <strong>Name:</strong> {{ $status['name'] }} <br>
            <strong>Description:</strong> {{ $status['description'] }} <br>
        </div>

        <form action="{{ url("status/{$status['id']}") }}" method="post">
            @csrf
            @method('delete')

            <div class="d-flex justify-content-end mt-4">
                <button type="submit" class="btn btn-danger px-4"
                    onclick="return confirm('Are you sure you want to delete this status? This action cannot be undone!');">
                    Yes, Delete
                </button>
            </div>
        </form>
    </div>
</div>

@endsection
