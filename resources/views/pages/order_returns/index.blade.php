@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Order-Retutn List</h4>
        </div>


        </div>
        <div class="card">
            <div class="row">

                <div class="row d-flex justify-content-between mb-3 m-3">

                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{ url('order_return/create') }}">Register</a>

                    </div>

                    <form class="col-md-6" action="{{ url('order_return/search') }}" method="post">
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
                                    <th class="text-center">customer_id Name</th>
                                    <th class="text-center">order_id</th>
                                    <th class="text-center">product_id</th>
                                    <th class="text-center">total_sold</th>
                                    <th class="text-center">total_return</th>
                                    <th class="text-center">return_reason</th>

                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($returns as $return)
                                    <tr>
                                        <td>{{ $order->id }}</td>
                                        <td>{{ optional($order_return->customer)->name }}</td>
                                         <td>{{ optional($order_return->product)->name }}</td>
                                         <td>{{ optional($order_return->order)->id }}</td>
                                        <td>{{ $order_return->total_sold }}</td>
                                        <td>{{ $order_return->total_return }}</td>
                                        <td>{{ $order_return->return_reason }}</td>


                                        <td>

                                            <a href="{{ url("order_return/$order_return->id") }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url("order_return/$order_return->id/edit") }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url("order_return/delete/$order_return->id") }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>


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
                        {!! $returns->links('pagination::bootstrap-5') !!}
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    @endsection
