{{-- @extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($status);
    @endphp


    <div class="row ">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">status Details</h4>

        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6"> <a
                href="{{ route('status.index') }}" class="btn btn-success">Back</a>
        </div>

    </div>
    </div>
    <div class="card">

        <div class="card-body p-4">



            <div class="container">

                <div id="printableArea">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Id:{{ $status->id }}</h5>
                             <h5 class="card-title">{{ $status->name }}</h5>
                            <p><strong>Description:</strong> {{ $status->description }}</p>
                            <p><strong>Created_at:</strong> {{ $status->created_at }}</p>
                            <p><strong>Updated_at:</strong> {{ $status->updated_at }}</p>


                        </div>
                    </div>

                </div>

            </div>
            <div class=" row col-12">
                <div class="col-6 p-2">
                    <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning">Edit</a>


                </div>
                <div class="col-6 d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end p-2"> <button onclick="printDiv('printableArea')" class="btn btn-primary">Print</button>
                </div>

            </div>

        </div>






    </div>
@endsection --}}


@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">status Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">
                <tr>
                    <th>Id:</th>
                    <td>{{ $status['id'] }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{{ $status['name'] }}</td>
                </tr>
                <tr>
                    <th>Description:</th>
                    <td>{{ $status['description'] }}</td>
                </tr>


                <tr>
                    <th>Created_at:</th>
                    <td>{{$status['created_at']}}</td>
                </tr>
                <tr>
                    <th>Updated_at:</th>
                    <td>{{$status['updated_at']}}</td>
                </tr>

            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('status') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('status.edit', $status->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>

@endsection



