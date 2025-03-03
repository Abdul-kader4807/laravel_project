

@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Order Report</h4>
        </div>


    </div>
    <div class="card">
        <div class="row">

            <div class="row d-flex justify-content-between mb-3 m-3">

                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('order/create') }}">Register</a>

                </div>

                <form class="col-md-6" action="{{ url('/order-report') }}" method="post">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="col-sm-10  position-relative input-icon">
                            <div class="d-flex mb-2">
                                <input type="text" class="form-control " id="search" name="search"  value="{{ old('search', $search ?? '') }}"
                                    id="input42" placeholder="Search">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class="bx bx-search"></i></span>
                                <button type="submit" class="btn btn-primary px-2 ">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

                <form class="col-md-6 " action="{{ url('/order-report') }}" method="post">
                    @csrf
                    <div class="input-group  p-4 ">
                        <div class="col-md-4 ">
                            <label for="start_date" class="form-label"><h4>Start Date</h4></label>
                            <input type="date" id="start_date" name="start_date" class="form-control"
                                value="{{ old('start_date', $startDate ?? '') }}" required>
                        </div>
                        <div class="col-md-4">
                            <label for="end_date" class="form-label"><h4>End Date</h4></label>
                            <input type="date" id="end_date" name="end_date" class="form-control"
                                value="{{ old('end_date', $endDate ?? '') }}" required>
                        </div>


                        <div class="col-md-4 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Generate Report</button>
                        </div>
                    </div>
                </form>

            </div>
            @if (!empty($orders))
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Customer Name</th>
                                    <th class="text-center">total_order</th>
                                    <th class="text-center">paid_amount</th>
                                    <th class="text-center">status</th>
                                    <th class="text-center">discount</th>
                                    <th class="text-center">vat</th>
                                    <th class="text-center">user Name</th>
                                    <th class="text-center">order_date</th>
                                    <th class="text-center">delivery_date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                        <td>{{ optional($order->customer)->name }}</td>
                                        <td>{{ $order->total_order }}</td>
                                        <td>{{ $order->paid_amount }}</td>
                                        <td>{{ optional($order->status)->name  }}</td>
                                        <td>{{ $order->discount }}</td>
                                        <td>{{ $order->vat }}</td>
                                        <td>{{ optional($order->user)->name  }}</td>
                                        <td>{{ $order->order_date }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        </tr>
                                    @endforeach

                            </tbody>

                        </table>
                    </div>
                @else
                    <p class="mt-4 text-center">No purchases found for the selected date range.</p>
            @endif
        </div>
        {{-- <div class="d-flex justify-content-end mt-5">
            {!! $orders->links('pagination::bootstrap-5') !!}
        </div> --}}

        <div class="d-flex justify-content-end mt-5">
            {!! $orders->appends(request()->input())->links('pagination::bootstrap-5') !!}
        </div>

    </div>
    </div>
    </div>
    </div>
@endsection
