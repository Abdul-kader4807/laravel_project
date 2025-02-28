@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">purchase List</h4>
        </div>


        </div>
        <div class="card">
            <div class="row">

                <div class="row d-flex justify-content-between mb-3 m-3">

                    <div class="col-md-3">
                        <a class="btn btn-secondary" href="{{ url('purchase/create') }}">Register</a>

                    </div>

                    <form class="col-md-6" action="{{ url('purchase/search') }}" method="post">
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
                                    <th class="text-center">Supplier_Name</th>
                                    <th class="text-center">product_Name</th>
                                    <th class="text-center">Status_Name</th>
                                    <th class="text-center">total_purchase</th>
                                    <th class="text-center">paid_amount</th>
                                    <th class="text-center">total_amount</th>
                                    <th class="text-center">discount</th>
                                    <th class="text-center">vat</th>
                                    <th class="text-center">purchase_date</th>
                                    <th class="text-center">shipping_address</th>
                                    <th class="text-center">description</th>
                                    <th class="text-center">Photo</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($purchases as $purchase)
                                    <tr>
                                        <td>{{ $purchase->id }}</td>
                                        <td>{{ optional($purchase->supplier)->name }}</td>
                                        <td>{{ optional($purchase->product)->name  }}</td>
                                        <td>{{ optional($purchase->status)->name  }}</td>
                                        <td>{{ $purchase->total_purchase }}</td>
                                        <td>{{ $purchase->paid_amount }}</td>
                                        <td>{{ $purchase->total_amount }}</td>
                                        <td>{{ $purchase->discount }}</td>
                                        <td>{{ $purchase->vat }}</td>
                                        <td>{{ $purchase->purchase_date }}</td>
                                        <td>{{ $purchase->shipping_address }}</td>
                                        <td>{{ $purchase->description }}</td>


                                        <td><img width="50" height=""
                                                src="{{ asset('photo') }}/{{ $purchase->photo }}"
                                                alt="{{ $purchase->name }}" srcset=""></td>
                                        <td>

                                            <a href="{{ url("purchase/$purchase->id") }}" class="btn btn-secondary">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ url("purchase/$purchase->id/edit") }}" class="btn btn-success">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ url("purchase/delete/$purchase->id") }}" class="btn btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                            {{-- <form action="{{ url("purchase/$purchase->id") }}" method="post">
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
                        {!! $purchases->links('pagination::bootstrap-5') !!}
                    </div>

                </div>

            </div>
        </div>
        </div>
    </div>
    @endsection
