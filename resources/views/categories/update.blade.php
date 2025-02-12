@extends('layout.backend.main')

@section('page_content')

@php
    // print_r($category);

 @endphp


    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-secondary px-4">Register category</h4>
        </div>

        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-success" href="{{ url('category') }}">Back</a>

        </div>

    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{url("category/{$category['id']}")}}" method="post" enctype="multipart/form-data">
                @csrf
                    {{-- @method('PUT') --}}
                    <input type="hidden"  name="_method"  value="put">

                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{$category['name']}}"
                                id="input42" placeholder="Enter Your Name">
                            @error('name')
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="input47" class="col-sm-3 col-form-label">Description</label>
                    <div class="col-sm-9">
                        <div class="input-group">
                            <span class="input-group-text"><i class="bx bx-align-left"></i></span>
                            <textarea class="form-control" name="description" id="input47" rows="3" placeholder="description">{{$category['description']}}</textarea>
                        </div>
                        @error('description')
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
