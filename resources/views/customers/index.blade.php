@extends('layout.backend.main')

@section('page_content')

<div class="row d-flex">
    <div class="btn btn-warning px-4">
        <h4 class="mb-3"> Customer List</h4>
    </div>
    </div>
    <div class="row">

        <div class="col-lg-12">
            <div class="card">

                <div class="row">

                    <div class="col-md-3 ">
                        <a class="btn btn-primary" href="{{ url('customer/create') }}">Register</a>

                    </div>


                    <form class="col-md-9" action=" {{ url('customer/search') }}" method="post">
                        @csrf
                        <label class="col-sm-3 col-form-label"></label>
                        <div class="col-sm-9">
                            <div class="d-flex">
                                <input type="text" class="form-control " name="name" value="{{@$requestdata}}" id="input42" placeholder="Enter Your Name">
                                <button type="submit" class="btn btn-primary px-4 ">Submit</button>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table id="example2" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Address</th>
                                    <th>Photo</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($customers as $customer)
                                    <tr>
                                        <td>{{ $customer->id }}</td>
                                        <td>{{ $customer->name }}</td>
                                        <td>{{ $customer->phone }}</td>
                                        <td>{{ $customer->email }}</td>
                                        <td>{{ $customer->address }}</td>
                                        <td><img width="50" height=""
                                                src="{{ asset('photo') }}/{{ $customer->photo }}"
                                                alt="{{ $customer->name }}" srcset=""></td>
                                        <td>

                                            <a class="btn btn-info"
                                                href="{{ url("customer/show/$customer->id") }}">Show</a>
                                            <a class="btn btn-primary"
                                                href="{{ url("customer/update/$customer->id") }}">Edit</a>
                                            <a class="btn btn-danger"
                                                href="{{ url("customer/delete/$customer->id") }}">Delete</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td col="6"> Data Not found</td>

                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        {!! $customers->links('pagination::bootstrap-5') !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
