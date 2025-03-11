@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Stock Management</h4>
        </div>


        </div>
        <div class="card">
            <div class="row">

                <div class="row d-flex justify-content-between mb-3 m-3">

                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{ url('stock/create') }}">Register</a>

                    </div>

                    <form class="col-md-6" action="{{ url('stock/search') }}" method="post">
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
                                    <th class="text-center">product_Name</th>
                                    {{-- <th class="text-center">Transaction_type</th> --}}
                                    <th class="text-center">Qty</th>
                                    <th class="text-center">price</th>
                                    {{-- <th class="text-center">offer_price</th> --}}
                                    <th class="text-center">warehouse_Name</th>
                                    <th class="text-center">uom</th>
                                    {{-- <th class="text-center">batch</th> --}}
                                    <th class="text-center">remark</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($stocks as $stock)
                                    <tr>
                                        <td>{{ $stock->id }}</td>
                                        <td>{{ optional($stock->product)->name }}</td>
                                        <td>{{ $stock->total_qty }}</td>
                                        <td>{{ $stock->product->price }}</td>
                                        <td>{{ optional($stock->warehouse)->name  }}</td>
                                        {{-- <td>{{ optional($stock->transaction_type)->name  }}</td> --}}
                                        <td>{{ optional($stock->product->uom)->name  }}</td>
                                        {{-- <td>{{ optional($stock->batch)->expiry_date  }}</td> --}}
                                        {{-- <td>{{ $stock->offer_price }}</td> --}}
                                        <td>{{ $stock->remark }}</td>
                                        <td>

                                            <a href="{{ url("stock/$stock->id") }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url("stock/$stock->id/edit") }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url("stock/delete/$stock->id") }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <form action="{{ url("stock/$stock->id") }}" method="post">
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
                        {!! $stocks->links('pagination::bootstrap-5') !!}
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    @endsection
