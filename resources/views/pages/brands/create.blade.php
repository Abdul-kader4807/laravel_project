@extends('layout.backend.main')

@section('page_content')



    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register Brands</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{url('brand')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Brand_name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="brand_name" value="{{old('brand_name')}}"
                                id="input42" placeholder="Enter Your brand_name">
                            @error('brand_name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="input43" class="col-sm-3 col-form-label">Contact_info</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" name="contact_info" value="{{ old('contact_info') }}" class="form-control"
                                id="input43" placeholder="contact_info ">
                            @error('contact_info')
                                <span style="color: red">{{ $message }}</span>
                            @enderror

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-phone'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="status_id" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select name="status_id" id="status_id" class="form-control">
                                <option value="">Select Status</option>
                                @foreach ($status as $status)
                                    <option value="{{ $status->id }}" {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('status_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-toggle-left'></i></span>
                        </div>
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="input47" class="col-sm-3 col-form-label">Address</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" name="address" id="input47" rows="3" placeholder="Address">{{ old('address') }}</textarea>
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
                            <button type="submit" class="btn btn-success px-4 ">Submit</button>

                        </div>



                    </div>
                </div>
            </form>





        </div>



    </div>
@endsection
