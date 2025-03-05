(Due to technical issues, the search service is temporarily unavailable.)

**অর্ডার রিটার্ন ইমপ্লিমেন্ট করার ধাপসমূহ:**

### ১. **রাউট যোগ করুন (`routes/web.php`):**
```php
Route::get('/order_returns', [OrdersReturnController::class, 'index'])->name('order_returns.index');
Route::get('/order_returns/create', [OrdersReturnController::class, 'create'])->name('order_returns.create');
Route::post('/order_returns', [OrdersReturnController::class, 'store'])->name('order_returns.store');
```

---

### ২. **ব্লেড ভিউ তৈরি করুন (`resources/views/pages/order_returns/create.blade.php`):**
```php
@extends('layout.backend.main')

@section('page_content')
<div class="card">
    <div class="card-body">
        <h4 class="card-title">Create Order Return</h4>
        <form id="returnForm">
            @csrf
            <div class="row">
                <!-- Customer Selection -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Customer</label>
                        <select class="form-control" id="customer_id" required>
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <!-- Order Selection -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Order ID</label>
                        <select class="form-control" id="order_id" required>
                            @foreach($orders as $order)
                                <option value="{{ $order->id }}">Order #{{ $order->id }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <!-- Product Return Table -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity Sold</th>
                        <th>Return Quantity</th>
                        <th>Reason</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody id="returnItems">
                    <!-- Dynamic Rows Will Be Added Here -->
                </tbody>
            </table>

            <button type="button" class="btn btn-primary" id="addReturnItem">Add Item</button>
            <button type="submit" class="btn btn-success">Submit Return</button>
        </form>
    </div>
</div>
@endsection

@section('script')
<script>
$(document).ready(function() {
    let rowCount = 0;

    // Add Return Item Row
    $('#addReturnItem').click(function() {
        const row = `
        <tr>
            <td>
                <select class="form-control product_id" name="products[${rowCount}][product_id]" required>
                    <option value="">Select Product</option>
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" class="form-control sold_qty" readonly></td>
            <td><input type="number" class="form-control return_qty" name="products[${rowCount}][return_qty]" min="1" required></td>
            <td><textarea class="form-control" name="products[${rowCount}][reason]"></textarea></td>
            <td><button class="btn btn-danger removeRow">Remove</button></td>
        </tr>`;
        $('#returnItems').append(row);
        rowCount++;
    });

    // Remove Row
    $(document).on('click', '.removeRow', function() {
        $(this).closest('tr').remove();
    });

    // Fetch Sold Quantity on Product Select
    $(document).on('change', '.product_id', function() {
        const productId = $(this).val();
        const orderId = $('#order_id').val();
        const row = $(this).closest('tr');

        $.ajax({
            url: "{{ route('getSoldQuantity') }}",
            method: 'POST',
            data: {
                order_id: orderId,
                product_id: productId
            },
            success: function(response) {
                row.find('.sold_qty').val(response.sold_qty);
                row.find('.return_qty').attr('max', response.sold_qty);
            }
        });
    });

    // Submit Form
    $('#returnForm').submit(function(e) {
        e.preventDefault();
        const formData = {
            customer_id: $('#customer_id').val(),
            order_id: $('#order_id').val(),
            products: []
        };

        $('.product_id').each(function(index) {
            formData.products.push({
                product_id: $(this).val(),
                return_qty: $(this).closest('tr').find('.return_qty').val(),
                reason: $(this).closest('tr').find('textarea').val()
            });
        });

        $.ajax({
            url: "{{ route('order_returns.store') }}",
            method: 'POST',
            data: formData,
            success: function(response) {
                alert('Return processed successfully!');
                window.location.href = "{{ route('order_returns.index') }}";
            }
        });
    });
});
</script>
@endsection
```

---

### ৩. **কন্ট্রোলার আপডেট করুন (`OrdersReturnController.php`):**
```php
public function create()
{
    $customers = Customer::all();
    $orders = Order::all();
    $products = Product::all();
    return view('pages.order_returns.create', compact('customers', 'orders', 'products'));
}

public function store(Request $request)
{
    $request->validate([
        'customer_id' => 'required|exists:customers,id',
        'order_id' => 'required|exists:orders,id',
        'products' => 'required|array',
        'products.*.product_id' => 'required|exists:products,id',
        'products.*.return_qty' => 'required|integer|min:1',
    ]);

    DB::transaction(function () use ($request) {
        foreach ($request->products as $item) {
            // Create Return Record
            $return = new OrdersReturn();
            $return->customer_id = $request->customer_id;
            $return->order_id = $request->order_id;
            $return->product_id = $item['product_id'];
            $return->total_sold = /* Fetch original sold quantity from order */;
            $return->total_return = $item['return_qty'];
            $return->return_reason = $item['reason'] ?? null;
            $return->save();

            // Update Stock
            $product = Product::find($item['product_id']);
            $product->stock += $item['return_qty'];
            $product->save();

            // Optional: Update Order Total
            $order = Order::find($request->order_id);
            $order->total -= ($product->price * $item['return_qty']);
            $order->save();
        }
    });

    return redirect()->route('order_returns.index')->with('success', 'Return processed successfully.');
}
```

---

### ৪. **সোল্ড কোয়ান্টিটি ফেচ করার রাউট যোগ করুন:**
```php
// routes/web.php
Route::post('/get-sold-quantity', [OrdersReturnController::class, 'getSoldQuantity'])->name('getSoldQuantity');
```

```php
// OrdersReturnController.php
public function getSoldQuantity(Request $request)
{
    $soldQty = DB::table('order_items')
        ->where('order_id', $request->order_id)
        ->where('product_id', $request->product_id)
        ->value('quantity');

    return response()->json(['sold_qty' => $soldQty]);
}
```

---

### ৫. **মাইগ্রেশন আপডেট করুন (`phar_order_returns`):**
```php
// Ensure the table has correct columns
Schema::create('phar_order_returns', function (Blueprint $table) {
    $table->id();
    $table->foreignId('customer_id')->constrained('phar_customers');
    $table->foreignId('order_id')->constrained('phar_orders');
    $table->foreignId('product_id')->constrained('phar_products');
    $table->integer('total_sold');
    $table->integer('total_return');
    $table->text('return_reason')->nullable();
    $table->timestamps();
});
```

---

### **কাজের ধাপ:**
1. **অর্ডার সিলেক্ট করুন:** ইউজার প্রথমে কাস্টমার এবং অর্ডার সিলেক্ট করবে।
2. **প্রোডাক্ট যোগ করুন:** প্রতিটি প্রোডাক্টের জন্য রিটার্ন কোয়ান্টিটি এবং কারণ লিখুন।
3. **স্টক আপডেট করুন:** রিটার্ন সাবমিট করলে অটোমেটিকালি প্রোডাক্ট স্টক বাড়বে।
4. **অর্ডার টোটাল আপডেট করুন (ঐচ্ছিক):** অর্ডার টোটাল থেকে রিটার্নের অ্যামাউন্ট বাদ দিন।

---

### **গুরুত্বপূর্ণ পয়েন্ট:**
- **ভ্যালিডেশন:** রিটার্ন কোয়ান্টিটি সোল্ড কোয়ান্টিটির বেশি হতে পারবে না।
- **ট্রানজ্যাকশন ব্যবহার করুন:** সব অপারেশন একসাথে সফল বা ফেইল হবে।
- **স্টক ম্যানেজমেন্ট:** রিটার্ন করা প্রোডাক্ট আবার স্টকে যোগ হবে।
- **অডিট ট্রেইল:** সকল রিটার্নের হিস্ট্রি `phar_order_returns` টেবিলে স্টোর হবে।
