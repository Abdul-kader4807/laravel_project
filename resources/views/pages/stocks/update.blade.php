@extends('layout.backend.main')

@section('page_content')

<div class="row d-flex">
    <div class="col-6">
        <h4 class="mb-3 btn btn-secondary px-4">Update Stock</h4>
    </div>
    <div class="d-md-flex d-grid align-items-center gap-3 justify-content-end mb-2 col-6">
        <a class="btn btn-success" href="{{ url('stock')}}">Back</a>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ url('stock/' . $stock->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            {{-- @method('PUT') --}}
            <input type="hidden" name="_method" value="put">

            <!-- Product Selection -->
            <div class="row mb-3">
                <label for="product_id" class="col-sm-3 col-form-label">Product</label>
                <div class="col-sm-9">
                    <select class="form-control" name="product_id" id="product_id">
                        <option value="">Select product</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('product_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Transaction Type -->
            <div class="row mb-3">
                <label for="transaction_type_id" class="col-sm-3 col-form-label">Transaction Type</label>
                <div class="col-sm-9">
                    <select name="transaction_type_id" class="form-control">
                        <option value="1" {{ old('transaction_type_id', $stock->transaction_type_id) == 1 ? 'selected' : '' }}>Purchase</option>
                        <option value="2" {{ old('transaction_type_id', $stock->transaction_type_id) == 2 ? 'selected' : '' }}>Sales</option>
                    </select>
                    @error('transaction_type_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Price -->
            <div class="row mb-3">
                <label for="price" class="col-sm-3 col-form-label">Price</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="price" value="{{ old('price', $stock->price) }}" placeholder="Enter Price">
                    @error('price')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Offer Price -->
            <div class="row mb-3">
                <label for="offer_price" class="col-sm-3 col-form-label">Offer Price</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="offer_price" value="{{ old('offer_price', $stock->offer_price) }}" placeholder="Enter Offer Price (Optional)">
                </div>
            </div>

            <!-- Warehouse Selection -->
            <div class="row mb-3">
                <label for="warehouse_id" class="col-sm-3 col-form-label">Warehouse</label>
                <div class="col-sm-9">
                    <select name="warehouse_id" class="form-control">
                        <option value="">Select Warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}" {{ old('warehouse_id', $stock->warehouse_id) == $warehouse->id ? 'selected' : '' }}>
                                {{ $warehouse->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('warehouse_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Quantity -->
            <div class="row mb-3">
                <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control" name="quantity" value="{{ old('quantity', $stock->quantity) }}" placeholder="Enter Quantity">
                    @error('quantity')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Unit of Measurement (UOM) -->
            <div class="row mb-3">
                <label for="uom_id" class="col-sm-3 col-form-label">Unit of Measurement (UOM)</label>
                <div class="col-sm-9">
                    <select name="uom_id" class="form-control">
                        <option value="">Select UOM</option>
                        @foreach($uoms as $uom)
                            <option value="{{ $uom->id }}" {{ old('uom_id', $stock->uom_id) == $uom->id ? 'selected' : '' }}>
                                {{ $uom->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('uom_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Remarks -->
            <div class="row mb-3">
                <label for="remark" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="remark" rows="3" placeholder="Additional Remarks (Optional)">{{ old('remark', $stock->remark) }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
                    <button type="submit" class="btn btn-success px-4">Update</button>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection
