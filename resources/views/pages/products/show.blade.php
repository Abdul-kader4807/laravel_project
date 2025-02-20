
@extends('layout.backend.main')

@section('page_content')
    <div class="row">
        <div class="col-12 d-flex justify-content-between align-items-center">
            <h4 class="mb-3 btn btn-secondary px-4">Product Details</h4>
            <button class="btn btn-primary" onclick="printPage()">Print</button>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4" id="printableArea">
            <table class="table table-bordered">

                <tr>
                    <th>ID</th>
                    <td>{{ $product['id'] }}</td>
                </tr>

                <tr>
                    <th>Name</th>
                    <td>{{ $product['name'] }}</td>
                </tr>

                <tr>
                    <th>Category_Name </th>
                    <td>{{ $product['category_id'] }}</td>
                </tr>
                <tr>
                    <th> Brand_id</th>
                    <td>{{ $product['brand_id'] }}</td>
                </tr>
                <tr>
                    <th>Generic_name</th>
                    <td>{{ $product['generic_name'] }}</td>
                </tr>

                <tr>
                    <th>Dosage</th>
                    <td>{{ $product['dosage'] }}</td>
                </tr>


                <tr>
                    <th>Strength</th>
                    <td>{{ $product['strength'] }}</td>
                </tr>

                <tr>
                    <th>Unit</th>
                    <td>{{ $product['unit'] }}</td>
                </tr>

                <tr>
                    <th>Price</th>
                    <td>{{ $product['price'] }}</td>
                </tr>
                <tr>
                    <th>Offer_price</th>
                    <td>{{ $product['offer_price'] }}</td>
                </tr>
                <tr>
                    <th>Max_quantity</th>
                    <td>{{ $product['max_quantity'] }}</td>
                </tr>

                <tr>
                    <th>Reorder_level</th>
                    <td>{{ $product['reorder_level'] }}</td>
                </tr>
                <tr>
                    <th>Expiry_date</th>
                    <td>{{ $product['expiry_date'] }}</td>
                </tr>
                <tr>
                    <th>Description</th>
                    <td>{{ $product['description'] }}</td>
                </tr>

                <tr>
                    <th>Discount</th>
                    <td>{{ $product['discount'] }}</td>
                </tr>
                <tr>
                    <th>Uom</th>
                    <td>{{ $product['uom_id'] }}</td>
                </tr>

                <tr>
                    <th>Barcode</th>
                    <td>{{ $product['barcode'] }}</td>
                </tr>

                <tr>
                    <th>Sku</th>
                    <td>{{ $product['sku'] }}</td>
                </tr>

                <tr>
                    <th>Manufacturer_id</th>
                    <td>{{ $product['manufacturer_id'] }}</td>
                </tr>
                <tr>
                    <th>Star</th>
                    <td>{{ $product['star'] }}</td>
                </tr>

                <tr>
                    <th>Weight</th>
                    <td>{{ $product['weight'] }}</td>
                </tr>
                <tr>
                    <th>Size</th>
                    <td>{{ $product['size'] }}</td>
                </tr>
                <tr>
                    <th>Is_featured</th>
                    <td>{{ $product['is_featured'] }}</td>
                </tr>

                <tr>
                    <th>Is_brand</th>
                    <td>{{ $product['is_brand'] }}</td>
                </tr>

                <tr>
                    <th>Photo</th>
                    <td>
                        <img width="80" src="{{ asset('photo') }}/{{ $product['photo'] }}"
                            alt="{{ $product['name'] }}">
                    </td>
                </tr>
                <tr>
                    <th>Created_at</th>
                    <td>{{ $product['created_at'] }}</td>
                </tr>

                <tr>
                    <th>Updated_at</th>
                    <td>{{ $product['updated_at'] }}</td>
                </tr>
            </table>


        </div>

        <div class="row col-12">
            <div class="col-6 p-4">
                <a href="{{ url('product') }}" class="btn btn-warning">Back</a>
            </div>
            <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-6 p-2">
                <a href="{{ route('product.edit', $product->id) }}" class="btn btn-success">Edit</a>
            </div>
        </div>
    </div>
@endsection

