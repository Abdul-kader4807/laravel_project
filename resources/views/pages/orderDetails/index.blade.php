@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Order_details</h4>
        </div>


        </div>
        <div class="card">
            <div class="row">

                <div class="row d-flex justify-content-between mb-3 m-3">

                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{ url('order_detail/create') }}">Register</a>

                    </div>

                    <form class="col-md-6" action="{{ url('order_detail/search') }}" method="post">
                        @csrf
                        <div class="input-group mb-2">
                            <div class="col-sm-10  position-relative input-icon">
                                <div class="d-flex mb-2">
                                    <input type="text" class="form-control " name="query" value="{{ @$requestdata }}"
                                        id="input42" placeholder="Search">
                                    <span class="position-absolute top-50 translate-middle-y"><i
                                            class="bx bx-search"></i></span>
                                    <button type="submit" class="btn btn-primary px-2 ">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example2" class="table table-striped table-border_detailed table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    {{-- <th class="text-center">Order_Id</th> --}}
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Strength</th>
                                    <th class="text-center">Units of Measure</th>
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">Price</th>
                                    <th class="text-center">vat</th>
                                    <th class="text-center">discount</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($order_details as $order_detail)
                                    <tr>
                                        <td>{{ $order_detail->id }}</td>
                                        {{-- <td>{{ optional($order_detail->order)->name }}</td> --}}
                                        <td>{{ optional($order_detail->product)->name }}</td>
                                        <td>{{ optional($order_detail->product)->strength }}</td>
                                        <td>{{ optional($order_detail->uom)->name  }}</td>
                                        <td>{{ $order_detail->qty }}</td>
                                        <td>{{ $order_detail->price }}</td>
                                        <td>{{ $order_detail->vat }}</td>
                                        <td>{{ $order_detail->discount }}</td>

                                        <td>

                                            <a href="{{ url("order_detail/$order_detail->id") }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url("order_detail/$order_detail->id/edit") }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url("order_detail/delete/$order_detail->id") }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <form action="{{ url("order_detail/$order_detail->id") }}" method="post">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">Data Not found</td>
                                    </tr>
                                @endforelse

                            </tbody>

                        </table>
                    </div>
                    <div class="d-flex justify-content-end mt-5">
                        {!! $order_details->links('pagination::bootstrap-5') !!}
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    @endsection
