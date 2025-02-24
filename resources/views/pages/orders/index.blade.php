@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">order List</h4>
        </div>


        </div>
        <div class="card">
            <div class="row">

                <div class="row d-flex justify-content-between mb-3 m-3">

                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{ url('order/create') }}">Register</a>

                    </div>

                    <form class="col-md-6" action="{{ url('order/search') }}" method="post">
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
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">Product Name</th>
                                    <th class="text-center">Strength</th>
                                    <th class="text-center">user_id</th>
                                    <th class="text-center">status_id</th>
                                    <th class="text-center">uom_id</th>
                                    <th class="text-center">total_order</th>
                                    <th class="text-center">discount</th>
                                    <th class="text-center">paid_amount</th>
                                    <th class="text-center">vat</th>
                                    <th class="text-center">order_date</th>
                                    <th class="text-center">delivery_date</th>
                                    <th class="text-center">shipping_address</th>
                                    <th class="text-center">remark</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($orders as $order)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ optional($order->customer)->name }}</td>
                                        <td>{{ optional($order->product)->name }}</td>
                                        <td>{{ optional($order->product)->strength }}</td>
                                        <td>{{ optional($order->user)->name  }}</td>
                                        <td>{{ optional($order->status)->name  }}</td>
                                        <td>{{ optional($order->uom)->name  }}</td>
                                        <td>{{ $order->total_order }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->paid_amount }}</td>
                                        <td>{{ $order->vat }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        <td>{{ $order->shipping_address }}</td>
                                        <td>{{ $order->remark }}</td>

                                        <td>

                                            <a href="{{ url("order/$order->id") }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url("order/$order->id/edit") }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url("order/delete/$order->id") }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <form action="{{ url("order/$order->id") }}" method="post">
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
                        {!! $orders->links('pagination::bootstrap-5') !!}
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    @endsection
