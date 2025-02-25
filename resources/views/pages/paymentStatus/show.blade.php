
@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">payment_status Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">
                <tr>
                    <th>Id:</th>
                    <td>{{ $payment_status['id'] }}</td>
                </tr>
                <tr>
                    <th>payment_status:</th>
                    <td>{{ $payment_status['name'] }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $payment_status['description'] }}</td>
                </tr>


                <tr>
                    <th>Created_at:</th>
                    <td>{{$payment_status['created_at']}}</td>
                </tr>
                <tr>
                    <th>Updated_at:</th>
                    <td>{{$payment_status['updated_at']}}</td>
                </tr>

            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('payment_status') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('payment_status.edit', $payment_status->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>

@endsection



