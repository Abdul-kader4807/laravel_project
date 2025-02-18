@extends('layout.backend.main')

@section('page_content')
    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">Register Purchase</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-success" href="{{ url('purchase') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url("purchase/{$purchase['id']}") }}" method="post" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="_method" value="put">

                <div class="row mb-3">
                    <label for="supplier_id" class="col-sm-3 col-form-label">Supplier Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="supplier_id" id="supplier_id">
                                <option value="">Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ ($purchase['supplier_id'] == $supplier->id) ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                        @error('supplier_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="product_id" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="product_id" id="product_id">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ ($purchase['product_id'] == $product->id) ? 'selected' : '' }}>
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
                    <label for="status_id" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="status_id" id="status_id">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ ($purchase['status_id'] == $status->id) ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-check-circle'></i></span>
                        </div>
                        @error('status_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @foreach (['total_order' => 'cart', 'paid_amount' => 'dollar-circle', 'total_amount' => 'dollar-circle', 'discount' => 'tag', 'vat' => 'calculator'] as $field => $icon)
                    <div class="row mb-3">
                        <label for="{{ $field }}" class="col-sm-3 col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <div class="col-sm-9">
                            <div class="position-relative input-icon">
                                <input type="number" step="0.01" name="{{ $field }}"
                                    value="{{ $purchase[$field] }}" class="form-control" id="{{ $field }}"
                                    placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                                <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-{{ $icon }}'></i></span>
                            </div>
                            @error($field)
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="row mb-3">
                    <label for="purchase_date" class="col-sm-3 col-form-label">Purchase Date</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="date" name="purchase_date" value="{{ $purchase['purchase_date'] }}"
                                class="form-control" id="purchase_date">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                        </div>
                        @error('purchase_date')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @foreach (['shipping_address' => 'map', 'description' => 'align-left'] as $field => $icon)
                    <div class="row mb-3">
                        <label for="{{ $field }}" class="col-sm-3 col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-{{ $icon }}"></i></span>
                                <textarea class="form-control" name="{{ $field }}" id="{{ $field }}" rows="3"
                                    placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}">{{ $purchase[$field] }}</textarea>
                            </div>
                            @error($field)
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <img width="50" height="" src="{{asset('photo')}}/{{$purchase['photo']}}" alt="{{$purchase['name']}}" srcset="">
                            <input type="file" name="photo"  class="form-control"
                                id="input44" >
                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class="lni lni-image"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4">Submit</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
