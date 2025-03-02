@extends('layout.backend.main')

@section('page_content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">


                        <h2 class="mb-4">Order Report</h2>

                        <form method="POST" action="{{ url('/order-report') }}">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-4">
                                    <label for="start_date" class="form-label">Start Date</label>
                                    <input type="date" id="start_date" name="start_date" class="form-control"
                                        value="{{ old('start_date', $startDate ?? '') }}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="end_date" class="form-label">End Date</label>
                                    <input type="date" id="end_date" name="end_date" class="form-control"
                                        value="{{ old('end_date', $endDate ?? '') }}" required>
                                </div>
                                <div class="col-md-4 d-flex align-items-end">
                                    <button type="submit" class="btn btn-primary">Generate Report</button>
                                </div>
                            </div>
                        </form>

                        @if (!empty($orders))
                            <table class="table table-bordered mt-4">
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
                        @else
                            <p class="mt-4 text-center">No purchases found for the selected date range.</p>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
