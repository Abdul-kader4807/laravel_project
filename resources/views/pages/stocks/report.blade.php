@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Stock Report</h4>
        </div>


    </div>
    <div class="card">
        <div class="row">

            <div class="row d-flex justify-content-between mb-3 m-3">

                <div class="col-md-3">
                    <a class="btn btn-success" href="{{ url('stock') }}">Back</a>

                </div>

                <form class="col-md-12 mt-2" action="{{ url('/stock-report') }}" method="post">
                    @csrf
                    <div class="row col-12">
                        <div class="input-group mb-2 col-6">
                            <div class="col-md-3">
                                <label for="start_date" class="form-label">Start Date</label>
                                <input type="date" id="start_date" name="start_date" class="form-control"
                                    value="{{ old('start_date', $startDate ?? '') }}" required>
                            </div>
                            <div class="col-md-3">
                                <label for="end_date" class="form-label">End Date</label>
                                <input type="date" id="end_date" name="end_date" class="form-control"
                                    value="{{ old('end_date', $endDate ?? '') }}" required>
                            </div>

                            <div class="col-md-3 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Generate Report</button>
                            </div>

                            <div class="row col-3 d-flex justify-content-end ">
                                <label for="remark" class="form-label">Remarks</label>
                                <select name="remark" id="remark" class="form-control">
                                    <option value="">All</option>
                                    <option value="sales"{{ old('remark', $remark ?? '') == 'sales' ? 'selected' : '' }}>
                                        Sales
                                    </option>
                                    <option
                                        value="purchase"{{ old('remark', $remark ?? '') == 'purchase' ? 'selected' : '' }}>
                                        Purchase</option>

                                </select>
                            </div>




                        </div>




                    </div>
                </form>

            </div>
            @if (!empty($stocks))
                <div class="card-body">
                    <div class="table-responsive ">
                        <table id="example2" class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">product_Name</th>
                                    {{-- <th class="text-center">Transaction_type</th> --}}
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">price</th>
                                    {{-- <th class="text-center">offer_price</th> --}}
                                    <th class="text-center">warehouse_Name</th>
                                    <th class="text-center">uom</th>
                                    {{-- <th class="text-center">batch</th> --}}
                                    <th class="text-center">remark</th>
                                    <th class="text-center">Created_at</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>{{ optional($stock->product)->name }}</td>
                                        <td>{{ $stock->qty }}</td>
                                        <td>{{ $stock->price }}</td>
                                        <td>{{ optional($stock->warehouse)->name }}</td>
                                        {{-- <td>{{ optional($stock->transaction_type)->name  }}</td> --}}
                                        <td>{{ optional($stock->uom)->name }}</td>
                                        {{-- <td>{{ optional($stock->batch)->expiry_date  }}</td> --}}
                                        {{-- <td>{{ $stock->offer_price }}</td> --}}
                                        <td>{{ $stock->remark }}</td>
                                        <td>{{ $stock->created_at }}</td>

                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                    </div>
                @else
                    <p class="mt-4 text-center">No stock found for the selected date range.</p>
            @endif
        </div>

    </div>
    </div>
    </div>
    </div>
@endsection
