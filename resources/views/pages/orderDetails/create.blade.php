@extends('layout.backend.main')

@section('page_content')
    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register order</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url('order_detail') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="order_id" class="col-sm-3 col-form-label">Order Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="order_id" id="order_id">
                                <option value="">Select order</option>
                                @foreach ($orders as $order)
                                    <option value="{{ $order->id }}"
                                        {{ old('order_id') == $order->id ? 'selected' : '' }}>
                                        {{ $order->customer_id }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                        @error('order_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="product_id" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="product_id" id="product_id">
                                <option value="">Select product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-box'></i></span>
                        </div>
                        @error('product_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                <div class="row mb-3">
                    <label for="uom_id" class="col-sm-3 col-form-label">UOMs</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="uom_id" id="uom_id">
                                <option value="">Select order</option>
                                @foreach ($uoms as $uom)
                                    <option value="{{ $uom->id }}" {{ old('uom_id') == $uom->id ? 'selected' : '' }}>
                                        {{ $uom->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-ruler'></i></span>
                        </div>
                        @error('uom_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control"
                                id="price" placeholder="Enter Price">
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-dollar text-warning'></i>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="qty" class="col-sm-3 col-form-label"> Qty</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="max_quantity" value="{{ old('qty') }}"
                                class="form-control" id="qty" placeholder="Enter qty">
                            @error('qty')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-box text-info'></i>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="discount" class="col-sm-3 col-form-label">Discount</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="discount" value="{{ old('discount') }}" class="form-control"
                                id="discount" placeholder="Discount">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-percent text-primary'></i>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end"><button
                                type="submit" class="btn btn-success px-4">Submit</button></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
