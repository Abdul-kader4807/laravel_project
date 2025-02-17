{{-- @extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($manufacturer);
    @endphp


    <div class="row ">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">manufacturer Details</h4>

        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6"> <a
                href="{{ route('manufacturer.index') }}" class="btn btn-success">Back</a>
        </div>

    </div>
    </div>
    <div class="card">

        <div class="card-body p-4">



            <div class="container">

                <div id="printableArea">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Id:{{ $manufacturer->id }}</h5>
                             <h5 class="card-title">{{ $manufacturer->name }}</h5>
                            <p><strong>Phone:</strong> {{ $manufacturer->phone }}</p>
                            <p><strong>Email:</strong> {{ $manufacturer->email }}</p>
                            <p><strong>Address:</strong> {{ $manufacturer->address }}</p>
                            <p><strong>Photo:</strong></p>
                            <img width="250" height="150" src="{{asset('photo')}}/{{$manufacturer['photo']}}" alt="{{$manufacturer['name']}}" srcset="">
                            <p><strong>Created_at:</strong> {{ $manufacturer->created_at }}</p>
                            <p><strong>Updated_at:</strong> {{ $manufacturer->updated_at }}</p>


                        </div>
                    </div>

                </div>

            </div>
            <div class=" row col-12">
                <div class="col-6 p-2">
                    <a href="{{ route('manufacturer.edit', $manufacturer->id) }}" class="btn btn-warning">Edit</a>


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
