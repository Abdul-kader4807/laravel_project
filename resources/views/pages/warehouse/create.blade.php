

@extends('layout.backend.main')

@section('page_content')
    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register Warehouse</h4>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url('warehouse') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="inputName" class="col-sm-3 col-form-label">Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" id="inputName" placeholder="Enter Warehouse Name">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputPhone" class="col-sm-3 col-form-label">Phone No</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="phone" value="{{ old('phone') }}" class="form-control" id="inputPhone" placeholder="Phone No">
                            @error('phone')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-phone'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputLocation" class="col-sm-3 col-form-label">Location</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="location" value="{{ old('location') }}" class="form-control" id="inputLocation" placeholder="Enter Warehouse Location">
                            @error('location')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-map'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputAddress" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" name="address" id="inputAddress" rows="3" placeholder="Enter Address">{{ old('address') }}</textarea>
                        </div>
                        @error('address')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="inputCountry" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="country" value="{{ old('country') }}" class="form-control" id="inputCountry" placeholder="Enter Country">
                            @error('country')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='fas fa-globe'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9 d-flex justify-content-end">
                        <button type="submit" class="btn btn-success px-4">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection



