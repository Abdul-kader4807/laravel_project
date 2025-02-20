@extends('layout.backend.main')

@section('page_content')

    <div class="row d-flex">
        <div class="col-6">
            <h4 class="mb-3 btn btn-danger px-4">Delete product</h4>
        </div>
        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end mb-2 col-6">
            <a class="btn btn-secondary" href="{{ url('product') }}">Back</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body p-4">
            <h5 class="text-danger">Are you sure you want to delete this product?</h5>

            <div class="mb-3">
                <p><strong>product ID:</strong> {{ $product['id'] }}</p>
                <p><strong>Name:</strong> {{ $product['name'] }}</p>
                <p><strong>Category_id:</strong> {{ $product['category_id'] }}</p>
                <p><strong>Brand_id:</strong> {{ $product['brand_id'] }}</p>
                <p><strong>Generic_name:</strong> {{ $product['generic_name'] }}</p>
                <p><strong>Dosage:</strong> {{ $product['dosage'] }}</p>
                <p><strong>Strength:</strong> {{ $product['strength'] }}</p>
                <p><strong>Unit:</strong> {{ $product['unit'] }}</p>
                <p><strong>Price:</strong> {{ $product['price'] }}</p>
                <p><strong>Offer_price:</strong> {{ $product['offer_price'] }}</p>
                <p><strong>Max_quantity:</strong> {{ $product['max_quantity'] }}</p>
                <p><strong>Reorder_level:</strong> {{ $product['reorder_level'] }}</p>
                <p><strong>Expiry_date:</strong> {{ $product['expiry_date'] }}</p>
                <p><strong>Description:</strong> {{ $product['description'] }}</p>
                <p><strong>Discount:</strong> {{ $product['discount'] }}</p>
                <p><strong>Uom_id:</strong> {{ $product['uom_id'] }}</p>
                <p><strong>Barcode:</strong> {{ $product['barcode'] }}</p>
                <p><strong>Sku:</strong> {{ $product['sku'] }}</p>
                <p><strong>Manufacturer_id:</strong> {{ $product['manufacturer_id'] }}</p>
                <p><strong>Star:</strong> {{ $product['star'] }}</p>
                <p><strong>Weight:</strong> {{ $product['weight'] }}</p>
                <p><strong>Size:</strong> {{ $product['size'] }}</p>
                <p><strong>is_featured:</strong> {{ $product['is_featured'] }}</p>
                <p><strong>is_brand:</strong> {{ $product['is_brand'] }}</p>
                <strong>Photo:</strong> <br>
                <img src="{{ asset('photo/' . $product['photo']) }}" alt="{{ $product['name'] }}" width="100">
            </div>

            <form action="{{ url("product/{$product['id']}") }}" method="post">
                @csrf
                @method('delete')

                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-danger px-4"
                        onclick="return confirm('Are you sure you want to delete this product? This action cannot be undone!');">
                        Yes, Delete
                    </button>
                </div>
            </form>
        </div>
    </div>

@endsection
