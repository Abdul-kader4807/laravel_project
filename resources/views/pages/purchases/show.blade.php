
@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">purchase Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td>{{ $purchase['id'] }}</td>
                </tr>

                <tr>
                    <th>Supplier_Name</th>
                    <td>{{ $purchase['supplier_id'] }}</td>
                </tr>

                <tr>
                    <th>Product_Name</th>
                    <td>{{ $purchase['product_id'] }}</td>
                </tr>
                <tr>
                    <th>Status_Name</th>
                    <td>{{ $purchase['status_id'] }}</td>
                </tr>
                <tr>
                    <th>Total_order</th>
                    <td>{{ $purchase['total_order'] }}</td>
                </tr>

                <tr>
                    <th>Paid_amount</th>
                    <td>{{ $purchase['paid_amount'] }}</td>
                </tr>


                <tr>
                    <th>Total_amount</th>
                    <td>{{ $purchase['total_amount'] }}</td>
                </tr>


                <tr>
                    <th>Discount</th>
                    <td>{{ $purchase['discount'] }}</td>
                </tr>

                <tr>
                    <th>Vat</th>
                    <td>{{ $purchase['vat'] }}</td>
                </tr>

                <tr>
                    <th>Purchase_date</th>
                    <td>{{ $purchase['purchase_date'] }}</td>
                </tr>

                <tr>
                    <th>Shipping_address</th>
                    <td>{{ $purchase['shipping_address'] }}</td>
                </tr>

                <tr>
                    <th>Description</th>
                    <td>{{ $purchase['description'] }}</td>
                </tr>

                <tr>
                    <th>Photo</th>
                    <td>
                        <img width="80" src="{{ asset('photo') }}/{{ $purchase['photo'] }}"
                            alt="{{ $purchase['name'] }}">
                    </td>
                </tr>


                <tr>
                    <th>Created_at</th>
                    <td>{{ $purchase['created_at'] }}</td>
                </tr>

                <tr>
                    <th>Updated_at</th>
                    <td>{{ $purchase['updated_at'] }}</td>
                </tr>
            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('purchase') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('purchase.edit', $purchase->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
@endsection
