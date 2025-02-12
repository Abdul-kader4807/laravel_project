@extends('layout.backend.main')

@section('page_content')

@php
    // print_r($manufacturer);

 @endphp


    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Delete manufacturer</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{url("manufacturer/{$manufacturer['id']}")}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')

                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{ $manufacturer['name'] }}">
                            <input type="hidden" class="form-control" name="id" value="{{ $manufacturer['id'] }}">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input43" class="col-sm-3 col-form-label">Phone No</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="phone" value="{{$manufacturer['phone']}}" class="form-control"
                                id="input43" placeholder="Phone No">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-phone'></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="email" value="{{$manufacturer['email']}}" class="form-control"
                                id="input44" placeholder="Email Address">
                            @error('email')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input47" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" name="address" id="input47" rows="3" placeholder="Address">{{$manufacturer['address']}}</textarea>
                        </div>
                        @error('address')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Country</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="country" value="{{$manufacturer['country']}}" class="form-control"
                                id="input44" placeholder="country">
                            @error('country')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='fas fa-globe'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>

                        </div>



                    </div>
                </div>
            </form>





        </div>



    </div>
@endsection
