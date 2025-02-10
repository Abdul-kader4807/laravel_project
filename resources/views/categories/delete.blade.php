@extends('layout.backend.main')

@section('page_content')
    @php
        // print_r($category);
    @endphp


    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Delete category</h4>
        </div>
    </div>
    <div class="card">

        <div class="card-body p-4">

            <form action="{{ url("category/{$category['id']}") }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('delete')
                <div class="row mb-3">
                    <label for="input42" class="col-sm-3 col-form-label"> Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="text" class="form-control" name="name" value="{{ $category['name'] }}">
                            <input type="hidden" class="form-control" name="id" value="{{ $category['id'] }}">
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
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" name="description" id="input47" rows="3" placeholder="Description">{{ $category['description'] }}</textarea>
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
                            <button type="submit" class="btn btn-danger px-4 ">Delete</button>

                        </div>



                    </div>
                </div>
            </form>





        </div>



    </div>
@endsection
