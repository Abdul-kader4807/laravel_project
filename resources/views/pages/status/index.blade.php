@extends('layout.backend.main')

@section('page_content')
    <div class="row">

        @if (@session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif


        <div class="col-3">
            <h4 class="mb-3 btn btn-warning px-4 ">status List</h4>
        </div>


    </div>
    <div class="card">
        <div class="row">

            <div class="row d-flex justify-content-between mb-3 m-3">

                <div class="col-md-3">
                    <a class="btn btn-secondary" href="{{ url('status/create') }}">Register</a>

                </div>

                <form class="col-md-6" action="{{ url('status/search') }}" method="post">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="col-sm-10  position-relative input-icon">
                            <div class="d-flex mb-2">
                                <input type="text" class="form-control " name="name" value="{{ @$requestdata }}"
                                    id="input42" placeholder="Search">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class="bx bx-search"></i></span>
                                <button type="submit" class="btn btn-primary px-2 ">Search</button>
                            </div>
                        </div>
                    </div>
                </form>

            </div>

            <div class="card-body">
                <div class="table-responsive ">
                    {{-- id=example2 --}}
                    <table id="" class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Description</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($statuses as $status)
                                <tr>
                                    <td>{{ $status->id }}</td>
                                    <td>{{ $status->name }}</td>
                                    <td>{{ $status->description }}</td>

                                    <td>
                                        <a href="{{ url("status/$status->id") }}" class="btn btn-secondary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{ url("status/$status->id/edit") }}" class="btn btn-success">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ url("status/delete/$status->id") }}" class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>
                                        {{-- <form action="{{ url("status/$status->id") }}" method="post">
                                                @csrf
                                                @method('Delete')
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form> --}}

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Data Not found</td>
                                </tr>
                            @endforelse

                        </tbody>

                    </table>
                </div>
                <div class="d-flex justify-content-end mt-5">
                    {!! $statuses->links('pagination::bootstrap-5') !!}
                </div>

            </div>

        </div>
    </div>
    </div>
    </div>
@endsection
