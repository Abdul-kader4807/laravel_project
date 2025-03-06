@extends('layout.backend.main')

@section('page_content')
    <div class="container">
        <h1>Create Order Return</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('order_returns.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="order_id">Order ID:</label>
                <input type="number" class="form-control" id="order_id" name="order_id" required>
                @error('order_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <button type="button" class="btn btn-secondary mt-2" onclick="fetchOrderDetails()">Fetch Order Details</button>
            </div>

            <div id="orderDetails" class="mb-4">
                <!-- Order details will be displayed here -->
            </div>

            <div class="form-group">
                <label for="product_id">Product:</label>
                <select class="form-control" id="product_id" name="product_id" required>
                    <option value="">Select a product</option>
                </select>
                @error('product_id')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="total_return">Return Quantity:</label>
                <input type="number" class="form-control" id="total_return" name="total_return" required min="1">
                @error('total_return')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-group">
                <label for="return_reason">Return Reason:</label>
                <textarea class="form-control" id="return_reason" name="return_reason" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Process Return</button>
        </form>
    </div>

    <script>
        function fetchOrderDetails() {
            const orderId = document.getElementById("order_id").value;
            if (!orderId) return;

            fetch(`/orders/${orderId}`)
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    const productSelect = document.getElementById("product_id");
                    const detailsContainer = document.getElementById("orderDetails");

                    // Clear previous options
                    productSelect.innerHTML = '<option value="">Select a product</option>';

                    // Populate product options
                    data.products.forEach(product => {
                        const option = document.createElement('option');
                        option.value = product.id;
                        option.textContent = `${product.name} (Available: ${product.remaining})`;
                        option.dataset.remaining = product.remaining;
                        productSelect.appendChild(option);
                    });

                    // Display order details
                    detailsContainer.innerHTML = `
                        <div class="card">
                            <div class="card-body">
                                <h3>Order #${data.order.id}</h3>
                                <p>Date: ${new Date(data.order.created_at).toLocaleDateString()}</p>
                                <h4>Products:</h4>
                                <ul class="list-group">
                                    ${data.products.map(product => `
                                        <li class="list-group-item d-flex justify-content-between align-items-center">
                                            ${product.name}
                                            <span class="badge bg-primary rounded-pill">
                                                Ordered: ${product.pivot.quantity}
                                            </span>
                                            <span class="badge bg-success rounded-pill">
                                                Available for return: ${product.remaining}
                                            </span>
                                        </li>
                                    `).join('')}
                                </ul>
                            </div>
                        </div>
                    `;

                    // Add quantity validation
                    productSelect.addEventListener('change', updateMaxQuantity);
                    updateMaxQuantity();
                })
                .catch(error => {
                    error.json().then(err => {
                        document.getElementById("orderDetails").innerHTML = `
                            <div class="alert alert-danger">${err.error}</div>
                        `;
                    });
                });
        }

        function updateMaxQuantity() {
            const productSelect = document.getElementById("product_id");
            const returnInput = document.getElementById("total_return");
            const selectedOption = productSelect.options[productSelect.selectedIndex];

            if (selectedOption && selectedOption.dataset.remaining) {
                returnInput.max = selectedOption.dataset.remaining;
                returnInput.placeholder = `Max: ${selectedOption.dataset.remaining}`;
            } else {
                returnInput.removeAttribute('max');
                returnInput.placeholder = '';
            }
        }
    </script>
@endsection
