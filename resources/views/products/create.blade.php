@extends('layout.backend.main')

@section('page_content')



    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register product</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{url('product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{old('name')}}"
                                id="input42" placeholder="Enter Your Name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="category_id" class="col-sm-3 col-form-label">Category ID</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="">Select Category</option>
                                {{-- Populate categories dynamically --}}
                            </select>
                            @error('category_id') <span class="text-danger">{{ $message }}</span> @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-category'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="brand_id" class="col-sm-3 col-form-label">Brand ID</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select name="brand_id" id="brand_id" class="form-control">
                                <option value="">Select Brand</option>
                                {{-- Populate brands dynamically --}}
                            </select>
                            @error('brand_id') <span class="text-danger">{{ $message }}</span> @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-label'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="generic_name" class="col-sm-3 col-form-label">Generic Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="generic_name" value="{{ old('generic_name') }}" class="form-control"
                                id="generic_name" placeholder="Enter Generic Name">
                            @error('generic_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-capsule'></i></span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="dosage" class="col-sm-3 col-form-label">Dosage</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="dosage" value="{{ old('dosage') }}" class="form-control" id="dosage" placeholder="Enter Dosage">
                            @error('dosage')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-medical text-danger'></i>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="strength" class="col-sm-3 col-form-label">Strength</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="strength" value="{{ old('strength') }}" class="form-control" id="strength" placeholder="Enter Strength">
                            @error('strength')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-dumbbell text-primary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="unit" class="col-sm-3 col-form-label">Unit</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="unit" value="{{ old('unit') }}" class="form-control" id="unit" placeholder="Enter Unit">
                            @error('unit')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-ruler text-success'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="price" class="col-sm-3 col-form-label">Price</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="price" value="{{ old('price') }}" class="form-control" id="price" placeholder="Enter Price">
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
                    <label for="quantity" class="col-sm-3 col-form-label">Quantity</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="quantity" value="{{ old('quantity') }}" class="form-control" id="quantity" placeholder="Enter Quantity">
                            @error('quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-box text-info'></i>
                            </span>
                        </div>
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="offer_price" class="col-sm-3 col-form-label">Offer Price</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="offer_price" value="{{ old('offer_price') }}" class="form-control" id="offer_price" placeholder="Offer Price">
                            @error('offer_price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-dollar-circle text-success'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="stock_quantity" class="col-sm-3 col-form-label">Stock Quantity</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="stock_quantity" value="{{ old('stock_quantity') }}" class="form-control" id="stock_quantity" placeholder="Stock Quantity">
                            @error('stock_quantity')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-layer text-warning'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="reorder_level" class="col-sm-3 col-form-label">Reorder Level</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="reorder_level" value="{{ old('reorder_level') }}" class="form-control" id="reorder_level" placeholder="Reorder Level">
                            @error('reorder_level')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-trending-down text-danger'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="expiry_date" class="col-sm-3 col-form-label">Expiry Date</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="date" name="expiry_date" value="{{ old('expiry_date') }}" class="form-control" id="expiry_date">
                            @error('expiry_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            {{-- <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-calendar text-info'></i>
                            </span> --}}
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="description" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-align-left"></i></span>
                            <textarea class="form-control" name="description" id="description" rows="3" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="discount" class="col-sm-3 col-form-label">Discount</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="discount" value="{{ old('discount') }}" class="form-control" id="discount" placeholder="Discount">
                            @error('discount')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-percent text-primary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="uom_id" class="col-sm-3 col-form-label">UOM ID</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="uom_id" value="{{ old('uom_id') }}" class="form-control" id="uom_id" placeholder="Unit of Measure ID">
                            @error('uom_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-ruler text-secondary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="barcode" class="col-sm-3 col-form-label">Barcode</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="barcode" value="{{ old('barcode') }}" class="form-control" id="barcode" placeholder="Barcode">
                            @error('barcode')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-barcode text-dark'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="sku" class="col-sm-3 col-form-label">SKU</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="sku" value="{{ old('sku') }}" class="form-control" id="sku" placeholder="SKU">
                            @error('sku')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-barcode text-primary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="manufacturer_id" class="col-sm-3 col-form-label">Manufacturer ID</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="manufacturer_id" value="{{ old('manufacturer_id') }}" class="form-control" id="manufacturer_id" placeholder="Manufacturer ID">
                            @error('manufacturer_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-factory text-secondary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="star" class="col-sm-3 col-form-label">Star Rating</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="star" value="{{ old('star') }}" class="form-control" id="star" placeholder="Star Rating">
                            @error('star')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-star text-warning'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="weight" class="col-sm-3 col-form-label">Weight</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="weight" value="{{ old('weight') }}" class="form-control" id="weight" placeholder="Weight">
                            @error('weight')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-weight text-success'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="size" class="col-sm-3 col-form-label">Size</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <input type="text" name="size" value="{{ old('size') }}" class="form-control" id="size" placeholder="Size">
                            @error('size')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-expand text-info'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="is_featured" class="col-sm-3 col-form-label">Is Featured</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <select name="is_featured" class="form-select" id="is_featured">
                                <option value="0" {{ old('is_featured') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_featured') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('is_featured')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-check-circle text-primary'></i>
                            </span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="is_brand" class="col-sm-3 col-form-label">Is Brand</label>
                    <div class="col-sm-9">
                        <div class="position-relative">
                            <select name="is_brand" class="form-select" id="is_brand">
                                <option value="0" {{ old('is_brand') == '0' ? 'selected' : '' }}>No</option>
                                <option value="1" {{ old('is_brand') == '1' ? 'selected' : '' }}>Yes</option>
                            </select>
                            @error('is_brand')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute end-0 top-50 translate-middle-y pe-3">
                                <i class='bx bx-badge-check text-success'></i>
                            </span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="file" name="photo" value="{{ old('photo') }}" class="form-control"
                                id="input44" placeholder="Email Address">
                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class="lni lni-image"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4 ">Submit</button>

                        </div>



                    </div>
                </div>
            </form>





        </div>



    </div>
@endsection
