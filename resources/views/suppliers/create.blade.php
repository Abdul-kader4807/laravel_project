@extends('layout.backend.main')

@section('page_content')

<div class="row d-flex">
    <div class="btn btn-warning px-4">
        <h4 class="mb-3">Register Supplier</h4>
    </div>
</div>


    <div class="card">

        <div class="card-body p-4">

            <form action="{{ url('supplier/create') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{old('name') }}"
                                id="input42" placeholder="Enter Your Name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Contact_person	</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="contact_person" value="{{old('contact_person') }}"
                                id="input42" placeholder="contact_person Name">
                            @error('contact_person	')
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
                            <input type="text" name="phone" value="{{ old('phone')}}" class="form-control"
                                id="input43" placeholder="Phone No">
                            @error('phone')
                                <span style="color: red">{{$message}}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-phone'></i></span>
                        </div>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Email Address</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="email" value="{{old('email')}}" class="form-control"
                                id="input44" placeholder="Email Address">
                            @error('email')
                                <span style="color: red">{{$message}}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-envelope'></i></span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input47" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">

                        <input type="text" name="address" value="{{old('address')}}" class="form-control"
                        id="input47" placeholder=" Address">
                        @error('address')
                            <span style="color: red">{{$message}}</span>
                        @enderror


                    </div>
                </div>

                <div class="row mb-3">
                    <label for="input44" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="file" name="photo" value="{{old('photo')}}" class="form-control"
                                id="input44" placeholder="Email Address">
                            @error('photo')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class="lni lni-camera"></i></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success px-4 ">Submit</button>
                            <button type="submit" class="btn btn-danger px-4 ">Reset</button>
                        </div>



                    </div>
                </div>
            </form>



        </div>



    </div>


@endsection
