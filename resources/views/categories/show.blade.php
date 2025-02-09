@extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($category);
    @endphp


    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register category</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">


            <div class="row mb-3">
                <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                <div class="col-sm-9">
                    <div class="position-relative input-icon">
                        <input type="text" class="form-control" name="name" value="{{ $category['name'] }}">
                        <input type="hidden" class="form-control" name="id" value="{{ $category['id'] }}">
                        @error('name')
                            <span style="color: red">{{ $message }}</span>
                        @enderror

                    </div>
                </div>
            </div>


            <div class="row mb-3">
                <label for="input47" class="col-sm-3 col-form-label">Description</label>
                <div class="col-sm-9">
                    <div class="input-group">

                        <textarea class="form-control" name="description" id="input47" rows="3" placeholder="description">{{ $category['description'] }}</textarea>
                    </div>
                    @error('description')
                        <span style="color: red">{{ $message }}</span>
                    @enderror
                </div>
            </div>







        </div>



    </div>
@endsection
