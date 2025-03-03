@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">purchase Report</h4>
        </div>


    </div>
    <div class="card">
        <div class="row">

            <div class="row d-flex justify-content-between mb-3 m-3">

                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('purchase/create') }}">Register</a>

                </div>

                <form class="col-md-6" action="{{ url('/purchase-report') }}" method="post">
                    @csrf
                    <div class="input-group mb-2">
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

            </div>
            @if (!empty($purchases))
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Supplier_Name</th>
                                    <th class="text-center">Status_Name</th>
                                    <th class="text-center">Total_amount</th>
                                    <th class="text-center">paid_amount</th>
                                    <th class="text-center">discount</th>
                                    <th class="text-center">vat</th>
                                    <th class="text-center">purchase_date</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->id }}</td>
                                        <td>{{ optional($purchase->supplier)->name }}</td>

                                        <td>{{ optional($purchase->status)->name }}</td>
                                        <td>{{ $purchase->total_purchase }}</td>
                                        <td>{{ $purchase->paid_amount }}</td>

                                        <td>{{ $purchase->discount }}</td>
                                        <td>{{ $purchase->vat }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                @else
                    <p class="mt-4 text-center">No purchases found for the selected date range.</p>
            @endif
        </div>

    </div>
    </div>
    </div>
    </div>
@endsection
