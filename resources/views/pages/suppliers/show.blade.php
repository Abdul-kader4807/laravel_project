
@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">Supplier Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">

                <tr>
                    <th>Id:</th>
                    <td>{{ $supplier['id'] }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $supplier['name'] }}</td>
                </tr>
                <tr>
                    <th>Contact Person:</th>
                    <td>{{ $supplier['contact_person'] }}</td>
                </tr>
                <tr>
                    <th>Phone No:</th>
                    <td>{{ $supplier['phone'] }}</td>
                </tr>
                <tr>
                    <th>Email Address:</th>
                    <td>{{ $supplier['email'] }}</td>
                </tr>
                <tr>
                    <th>Address:</th>
                    <td>{{ $supplier['address'] }}</td>
                </tr>
                <tr>
                    <th>Photo:</th>
                    <td>
                        <img width="80" src="{{ asset('photo') }}/{{ $supplier['photo'] }}"
                            alt="{{ $supplier['name'] }}">
                    </td>
                </tr>

                <tr>
                    <th>Created_at:</th>
                    <td>{{$supplier['created_at']}}</td>
                </tr>
                <tr>
                    <th>Updated_at:</th>
                    <td>{{$supplier['updated_at']}}</td>
                </tr>

            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('supplier') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>

@endsection
