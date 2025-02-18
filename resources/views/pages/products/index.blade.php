@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4">Product List</h4>
        </div>


    </div>
    <div class="card">
        <div class="row">

            <div class="row d-flex justify-content-between mb-3 m-3">

                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('product/create') }}">Register</a>

                </div>

                <form class="col-md-6" action="{{ url('product/search') }}" method="post">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="col-sm-10  position-relative input-icon">
                            <div class="d-flex mb-2">
                                <input type="text" class="form-control " name="name" value="{{ @$requestdata }}"
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
                                <th class="text-center">Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Generic Name</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Brand</th>
                                <th class="text-center">Dosage</th>
                                <th class="text-center">Strength</th>
                                <th class="text-center">Unit</th>
                                <th class="text-center">Price</th>
                                <th class="text-center">Offer Price</th>
                                <th class="text-center">Reorder Level </th>
                                <th class="text-center">Max_quantity</th>
                                <th class="text-center">Expiry Date</th>
                                <th class="text-center">Manufacturer</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                                <tr>
                                    <td>{{ $product->id }}</td>
                                    <td><img width="50" height=""
                                        src="{{ asset('photo') }}/{{ $product->photo }}" alt="{{ $product->name }}"
                                        srcset="">
                                   </td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->generic_name }}</td>
                                    <td>{{optional($product->category_id)->name}}</td>
                                    <td>{{optional($product->brand_id)->name}}</td>
                                    <td>{{ $product->dosage }}</td>
                                    <td>{{ $product->strength }}</td>
                                    <td>{{ $product->unit }}</td>
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->offer_price }}</td>
                                    <td>{{ $product->reorder_level }}</td>
                                    <td>{{ $product->max_quantity }}</td>
                                    <td>{{ $product->expiry_date }}</td>
                                    <td>{{optional($product->manufacturer_id)->name }}</td>

                                    <td>

                                        <a href="{{ url("product/$product->id") }}" class="btn btn-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url("product/$product->id/edit") }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url("product/delete/$product->id") }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <form action="{{ url("product/$product->id") }}" method="post">
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
                    {!! $products->links('pagination::bootstrap-5') !!}
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
