@extends('layout.backend.main')

@section('page_content')

@php
    // print_r($warehouse);

 @endphp


    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">Update warehouse</h4>
        </div>

        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-success" href="{{ url('warehouse') }}">Back</a>

        </div>

    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{url("warehouse/{$warehouse['id']}")}}" method="post" enctype="multipart/form-data">
                @csrf
                    {{-- @method('PUT') --}}
                    <input type="hidden"  name="_method"  value="put">

                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{$warehouse['name']}}"
                                id="input42" placeholder="Enter Your Name">
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
                            <input type="text" name="phone" value="{{$warehouse['phone']}}" class="form-control"
                                id="input43" placeholder="Phone No">
                            @error('phone')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-phone'></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Location</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="location" value="{{$warehouse['location']}}" class="form-control"
                                id="input44" placeholder="Location">
                            @error('location')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-map'></i></span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input47" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" name="address" id="input47" rows="3" placeholder="Address">{{$warehouse['address']}}</textarea>
                        </div>
                        @error('address')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>




                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary px-4 ">Submit</button>

                        </div>



                    </div>
                </div>
            </form>





        </div>



    </div>
@endsection
