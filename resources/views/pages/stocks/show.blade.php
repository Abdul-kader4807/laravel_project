
@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">stock Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td>{{ $stock['id'] }}</td>
                </tr>

                <tr>
                    <th>product_id</th>
                    <td>{{ $stock['product_id'] }}</td>
                </tr>

                <tr>
                    <th>Transaction_type_id </th>
                    <td>{{ $stock['transaction_type_id'] }}</td>
                </tr>
                <tr>
                    <th> price</th>
                    <td>{{ $stock['price'] }}</td>
                </tr>
                <tr>
                    <th>offer_price</th>
                    <td>{{ $stock['offer_price'] }}</td>
                </tr>

                <tr>
                    <th>warehouse_id</th>
                    <td>{{ $stock['warehouse_id'] }}</td>
                </tr>


                <tr>
                    <th>Qty</th>
                    <td>{{ $stock['qty'] }}</td>
                </tr>

                <tr>
                    <th>uom_id</th>
                    <td>{{ $stock['uom_id'] }}</td>
                </tr>

                <tr>
                    <th>batch_id</th>
                    <td>{{ $stock['batch_id'] }}</td>
                </tr>
                <tr>
                    <th>remark</th>
                    <td>{{ $stock['remark'] }}</td>
                </tr>

                <tr>
                    <th>Created_at</th>
                    <td>{{ $stock['created_at'] }}</td>
                </tr>

                <tr>
                    <th>Updated_at</th>
                    <td>{{ $stock['updated_at'] }}</td>
                </tr>
            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('stock') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('stock.edit', $stock->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
@endsection

