@extends('layout.backend.main')

@section('page_content')

<div class="row d-flex">
    <div class="col-12">
        <h4 class="mb-3 btn btn-secondary px-4">Manage Stock</h4>
    </div>
</div>

<div class="card">
    <div class="card-body p-4">
        <form action="{{ url('stock') }}" method="post" enctype="multipart/form-data">
            @csrf

            <!-- Product Selection -->
            <div class="row mb-3">
                <label for="product_id" class="col-sm-3 col-form-label">Product</label>
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
                        <span class="position-absolute top-50 start-0 ps-2 translate-middle-y"><i class='bx bx-package'></i></sp>
                    </div>
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
                        <option value="1" {{ old('transaction_type_id') == 1 ? 'selected' : '' }}>Purchase</option>
                        <option value="2" {{ old('transaction_type_id') == 2 ? 'selected' : '' }}>Sales</option>
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
                    <input type="number" class="form-control" name="price" value="{{ old('price') }}" placeholder="Enter Price">
                    @error('price')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Offer Price -->

            <div class="row mb-3">
                <label for="offer_price" class="col-sm-3 col-form-label">Offer Price</label>
                <div class="col-sm-9">
                    <input type="number" class="form-control"  name="offer_price" value="{{ old('offer_price') }}" placeholder="Enter Offer Price (Optional)">
                </div>
            </div>

            <!-- Warehouse Selection -->
            <div class="row mb-3">
                <label for="warehouse_id" class="col-sm-3 col-form-label">Warehouse</label>
                <div class="col-sm-9">
                    <select name="warehouse_id" class="form-control">
                        <option value="">Select Warehouse</option>
                        @foreach($warehouses as $warehouse)
                            <option value="{{ $warehouse->id }}">{{ $warehouse->name }}</option>
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
                    <input type="number" class="form-control" name="quantity" value="{{ old('quantity') }}" placeholder="Enter Quantity">
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
                            <option value="{{ $uom->id }}">{{ $uom->name }}</option>
                        @endforeach
                    </select>
                    @error('uom_id')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Batch ID -->

<div class="row mb-3">
    <label for="batch_id" class="col-sm-3 col-form-label">Batch ID</label>
    <div class="col-sm-9 position-relative">
        <select name="batch_id" class="form-control ps-4">
            <option value="">Select Batch</option>
            @foreach($batches as $batch)
                <option value="{{ $batch->id }}">
                    {{ $batch->id }} - Expiry: {{ $batch->expiry_date }}
                </option>
            @endforeach
        </select>

        @error('batch_id')
            <span style="color: red">{{ $message }}</span>
        @enderror
    </div>
</div>


            <!-- Remarks -->
            <div class="row mb-3">
                <label for="remark" class="col-sm-3 col-form-label">Remarks</label>
                <div class="col-sm-9">
                    <textarea class="form-control" name="remark" rows="3" placeholder="Additional Remarks (Optional)">{{ old('remark') }}</textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="row">
                <label class="col-sm-3 col-form-label"></label>
                <div class="col-sm-9">
                    <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-4">Submit</button>
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

@endsection





