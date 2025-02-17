


@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-danger px-4">Delete supplier</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-secondary" href="{{ url('supplier') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="text-danger">Are you sure you want to delete the supplier "{{ $supplier['name'] }}"?</h5>

            <div class="mb-3">
                <strong>Id:</strong> {{ $supplier['id'] }} <br>
                <strong>Name:</strong> {{ $supplier['name'] }} <br>
                <strong>Contact_person:</strong> {{ $supplier['contact_person'] }} <br>
                <strong>Phone:</strong> {{ $supplier['phone'] }} <br>
                <strong>Email:</strong> {{ $supplier['email'] }} <br>
                <strong>Address:</strong> {{ $supplier['address'] }} <br>
                <strong>Photo:</strong> <br>
                <img src="{{ asset('photo/' . $supplier['photo']) }}" alt="{{ $supplier['name'] }}" width="100">
            </div>

            <form action="{{ url("supplier/{$supplier['id']}") }}" method="post">
                @csrf
                @method('delete')

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4"
                        onclick="return confirm('Are you sure you want to delete this supplier? This action cannot be undone!');">
                        Yes, Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection

















{{-- table diye delete input --}}

{{--
@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">Delete Supplier</h4>
        </div>

        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-success" href="{{ url('supplier') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url("supplier/{$supplier->id}") }}" method="POST" onsubmit="return confirmDelete()">
                @csrf
                @method('DELETE')

                <table class="table table-bordered">
                    <tr><th>Name</th><td>{{ $supplier->name }}</td></tr>
                    <tr><th>Contact Person</th><td>{{ $supplier->contact_person }}</td></tr>
                    <tr><th>Phone No</th><td>{{ $supplier->phone }}</td></tr>
                    <tr><th>Email Address</th><td>{{ $supplier->email }}</td></tr>
                    <tr><th>Address</th><td>{{ $supplier->address }}</td></tr>
                    <tr>
                        <th>Photo</th>
                        <td>
                            <img width="80" src="{{ asset('photo/' . $supplier->photo) }}" alt="{{ $supplier->name }}">
                        </td>
                    </tr>
                </table>

                <div class="d-flex justify-content-end mt-3">
                    <button type="submit" class="btn btn-danger px-4">Delete</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this supplier?");
        }
    </script>

@endsection --}}
