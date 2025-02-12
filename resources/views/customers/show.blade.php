
@extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($customer);
    @endphp


    <div class="row ">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">Customer Details</h4>

        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6"> <a
                href="{{ route('customer.index') }}" class="btn btn-success">Back</a>
        </div>

    </div>
    </div>
    <div class="card">

        <div class="card-body p-4">



            <div class="container">

                <div id="printableArea">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> Id:{{ $customer->id }}</h5>
                             <h5 class="card-title">{{ $customer->name }}</h5>
                            <p><strong>Phone:</strong> {{ $customer->phone }}</p>
                            <p><strong>Email:</strong> {{ $customer->email }}</p>
                            <p><strong>Address:</strong> {{ $customer->address }}</p>
                            <p><strong>Photo:</strong></p>
                            <img width="250" height="150" src="{{asset('photo')}}/{{$customer['photo']}}" alt="{{$customer['name']}}" srcset="">
                            <p><strong>Created_at:</strong> {{ $customer->created_at }}</p>
                            <p><strong>Updated_at:</strong> {{ $customer->updated_at }}</p>


                        </div>
                    </div>

                </div>

            </div>
            <div class=" row col-12">
                <div class="col-6 p-2">
                    <a href="{{ route('customer.edit', $customer->id) }}" class="btn btn-warning">Edit</a>


                </div>
                <div class="col-6 d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end p-2"> <button onclick="printDiv('printableArea')" class="btn btn-primary">Print</button>
                </div>

            </div>

        </div>






    </div>
@endsection





