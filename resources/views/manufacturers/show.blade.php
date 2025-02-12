@extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($manufacturer);
    @endphp


    <div class="row mb-2">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Manufacturer Details</h4>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end"> <a
                href="{{ route('manufacturer.index') }}" class="btn btn-primary">Back</a>

        </div>

        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">



            <div class="container">


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $manufacturers->id }}</h5>
                        <h5 class="card-title">{{ $manufacturers->name }}</h5>
                        <p><strong>Phone:</strong> {{ $manufacturers->phone }}</p>
                        <p><strong>Email:</strong> {{ $manufacturers->email }}</p>
                        <p><strong>Address:</strong> {{ $manufacturers->address }}</p>
                        <p><strong>Country:</strong> {{ $manufacturers->country }}</p>


                    </div>
                </div>



            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                <a href="{{ route('manufacturer.edit', $manufacturers->id) }}" class="btn btn-warning">Edit</a>
            </div>

        </div>



    </div>
@endsection
