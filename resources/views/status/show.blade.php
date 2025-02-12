@extends('layout.backend.main')

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


                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $status->id }}</h5>
                        {{-- <h5 class="card-title">{{ $status->name }}</h5> --}}
                        <p><strong>Name:</strong> {{ $status->name }}</p>
                        <p><strong>Description:</strong> {{ $status->description }}</p>
                        <p><strong>Created_at:</strong> {{ $status->created_at }}</p>
                        <p><strong>Updated_at:</strong> {{ $status->updated_at }}</p>


                    </div>
                </div>



            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                <a href="{{ route('status.edit', $status->id) }}" class="btn btn-warning">Edit</a>
            </div>

        </div>



    </div>
@endsection
