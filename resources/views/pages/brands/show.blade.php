{{-- @extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($brand);
    @endphp


    <div class="row ">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">brand Details</h4>

        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6"> <a
                href="{{ route('brand.index') }}" class="btn btn-success">Back</a>
        </div>

    </div>
    </div>
    <div class="card">

        <div class="card-body p-4">



            <div class="container">

                <div id="printableArea">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Id:{{ $brand->id }}</h5>
                             <h5 class="card-title">{{ $brand->brand_name }}</h5>
                            <p><strong>Status:</strong> {{ $brand->status_id }}</p>
                            <p><strong>Address:</strong> {{ $brand->address }}</p>
                            <p><strong>Created_at:</strong> {{ $brand->created_at }}</p>
                            <p><strong>Updated_at:</strong> {{ $brand->updated_at }}</p>


                        </div>
                    </div>

                </div>

            </div>
            <div class=" row col-12">
                <div class="col-6 p-2">
                    <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-warning">Edit</a>


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
            <h4 class="mb-3 btn btn-secondary px-4">brand Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">
                <tr>
                    <th>Id:</th>
                    <td>{{ $brand['id'] }}</td>
                </tr>
                <tr>
                    <th>Name:</th>
                    <td>{{ $brand['brand_name'] }}</td>
                </tr>
                <tr>
                    <th>Contact Info:</th>
                    <td>{{ $brand['contact_info'] }}</td>
                </tr>
                <tr>
                    <th>Status:</th>
                    <td>{{ $brand['status_id'] }}</td>
                </tr>

                <tr>
                    <th>Address:</th>
                    <td>{{ $brand['address'] }}</td>
                </tr>

                <tr>
                    <th>Created_at:</th>
                    <td>{{$brand['created_at']}}</td>
                </tr>
                <tr>
                    <th>Updated_at:</th>
                    <td>{{$brand['updated_at']}}</td>
                </tr>

            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('brand') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('brand.edit', $brand->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>

@endsection


