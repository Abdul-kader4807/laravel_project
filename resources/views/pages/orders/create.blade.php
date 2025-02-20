@extends('layout.backend.main')

@section('page_content')
    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register order</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url('order') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="customer_id" class="col-sm-3 col-form-label">Customer Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="customer_id" id="customer_id">
                                <option value="">Select order</option>
                                @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}"
                                        {{ old('customer_id') == $customer->id ? 'selected' : '' }}>
                                        {{ $customer->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                        @error('customer_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="user_id" class="col-sm-3 col-form-label">User Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="user_id" id="user_id">
                                <option value="">Select order</option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                        {{ $user->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-box'></i></span>
                        </div>
                        @error('user_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="uom_id" class="col-sm-3 col-form-label">UOMs</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="uom_id" id="uom_id">
                                <option value="">Select order</option>
                                @foreach ($uoms as $uom)
                                    <option value="{{ $user->id }}" {{ old('uom_id') == $uom->id ? 'selected' : '' }}>
                                        {{ $uom->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-ruler'></i></span>
                        </div>
                        @error('uom_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                <div class="row mb-3">
                    <label for="status_id" class="col-sm-3 col-form-label">Status</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="status_id" id="status_id">
                                <option value="">Select Status</option>
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->id }}"
                                        {{ old('status_id') == $status->id ? 'selected' : '' }}>
                                        {{ $status->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i
                                    class='bx bx-check-circle'></i></span>
                        </div>
                        @error('status_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                @foreach (['total_order' => 'cart', 'paid_amount' => 'dollar-circle', 'discount' => 'tag', 'vat' => 'calculator'] as $field => $icon)
                    <div class="row mb-3">
                        <label for="{{ $field }}"
                            class="col-sm-3 col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <div class="col-sm-9">
                            <div class="position-relative input-icon">
                                <input type="number" step="0.01" name="{{ $field }}"
                                    value="{{ old($field) }}" class="form-control" id="{{ $field }}"
                                    placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}">
                                <span class="position-absolute top-50 translate-middle-y"><i
                                        class='bx bx-{{ $icon }}'></i></span>
                            </div>
                            @error($field)
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach

                <div class="row mb-3">
                    <label for="order_date" class="col-sm-3 col-form-label">order Date</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="date" name="order_date" value="{{ old('order_date') }}" class="form-control"
                                id="order_date">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                        </div>
                        @error('order_date')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>


                <div class="row mb-3">
                    <label for="delivery_date	" class="col-sm-3 col-form-label">Delivery_date </label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="date" name="delivery_date" value="{{ old('delivery_date') }}"
                                class="form-control" id="delivery_date">

                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                        </div>
                        @error('delivery_date')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>



                @foreach (['shipping_address' => 'map', 'remark' => 'align-left'] as $field => $icon)
                    <div class="row mb-3">
                        <label for="{{ $field }}"
                            class="col-sm-3 col-form-label">{{ ucfirst(str_replace('_', ' ', $field)) }}</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-text"><i class="bx bx-{{ $icon }}"></i></span>
                                <textarea class="form-control" name="{{ $field }}" id="{{ $field }}" rows="3"
                                    placeholder="{{ ucfirst(str_replace('_', ' ', $field)) }}">{{ old($field) }}</textarea>
                            </div>
                            @error($field)
                                <span style="color: red">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                @endforeach



                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end"><button
                                type="submit" class="btn btn-success px-4">Submit</button></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
