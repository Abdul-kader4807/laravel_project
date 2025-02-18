


@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">manufacturer Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td>{{ $manufacturer['id'] }}</td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td>{{ $manufacturer['name'] }}</td>
                </tr>

                <tr>
                    <th>Phone No</th>
                    <td>{{ $manufacturer['phone'] }}</td>
                </tr>
                <tr>
                    <th>Email Address</th>
                    <td>{{ $manufacturer['email'] }}</td>
                </tr>
                <tr>
                    <th>Country</th>
                    <td>{{ $manufacturer['country'] }}</td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td>{{ $manufacturer['address'] }}</td>
                </tr>

                <tr>
                    <th>Created_at</th>
                    <td>{{ $manufacturer['created_at'] }}</td>
                </tr>

                <tr>
                    <th>Updated_at</th>
                    <td>{{ $manufacturer['updated_at'] }}</td>
                </tr>
            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('manufacturer') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('manufacturer.edit', $manufacturer->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
@endsection
