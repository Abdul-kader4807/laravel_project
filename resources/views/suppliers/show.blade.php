@extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($supplier);
    @endphp


    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register supplier</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">


            <div class="row mb-3">
                <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <input type="text" class="form-control" name="name" value="{{ $supplier['name'] }}">
                        <input type="hidden" class="form-control" name="id" value="{{ $supplier['id'] }}">
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label for="input43" class="col-sm-3 col-form-label">Contact_person</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <input type="text" name="contact_person" value="{{ $supplier['contact_person'] }}" class="form-control">
                        @error('contact_person')
                            <span style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label for="input43" class="col-sm-3 col-form-label">Phone No</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <input type="text" name="phone" value="{{ $supplier['phone'] }}" class="form-control">
                        @error('phone')
                            <span style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label for="input44" class="col-sm-3 col-form-label">Email Address</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <input type="text" name="email" value="{{ $supplier['email'] }}" class="form-control">
                        @error('email')
                            <span style="color: red">{{ $message }}</span>
                        @enderror


                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label for="input47" class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                    <div class="input-group">

                        <textarea class="form-control" name="address" id="input47" rows="3" placeholder="Address">{{ $supplier['address'] }}</textarea>
                    </div>
                    @error('address')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="input44" class="col-sm-3 col-form-label">Photo</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <img width="50" height="" src="{{ asset('photo') }}/{{ $supplier['photo'] }}"
                            alt="{{ $supplier['name'] }}" srcset="">

                        @error('photo')
                            <span style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>








        </div>



    </div>
@endsection
