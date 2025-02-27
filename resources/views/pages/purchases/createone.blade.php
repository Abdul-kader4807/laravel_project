

<!-- @extends('layout.backend.main')

@section('page_content')
    <div class="row d-flex">
        <div class="col-12">
            <h4 class="mb-3 btn btn-secondary px-4">Register Purchase</h4>
        </div>
    </div>
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ url('purchase') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="row mb-3">
                    <label for="supplier_id" class="col-sm-3 col-form-label">Supplier Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="supplier_id" id="supplier_id">
                                <option value="">Select Supplier</option>
                                @foreach ($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}"
                                        {{ old('supplier_id') == $supplier->id ? 'selected' : '' }}>
                                        {{ $supplier->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-user'></i></span>
                        </div>
                        @error('supplier_id')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <label for="product_id" class="col-sm-3 col-form-label">Product Name</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <select class="form-control" name="product_id" id="product_id">
                                <option value="">Select Product</option>
                                @foreach ($products as $product)
                                    <option value="{{ $product->id }}"
                                        {{ old('product_id') == $product->id ? 'selected' : '' }}>
                                        {{ $product->name }}
                                    </option>
                                @endforeach
                            </select>
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-box'></i></span>
                        </div>
                        @error('product_id')
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

                @foreach (['total_order' => 'cart', 'paid_amount' => 'dollar-circle', 'total_amount' => 'dollar-circle', 'discount' => 'tag', 'vat' => 'calculator'] as $field => $icon)
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
                    <label for="purchase_date" class="col-sm-3 col-form-label">Purchase Date</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="date" name="purchase_date" value="{{ old('purchase_date') }}"
                                class="form-control" id="purchase_date">
                            <span class="position-absolute top-50 translate-middle-y"><i class='bx bx-calendar'></i></span>
                        </div>
                        @error('purchase_date')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @foreach (['shipping_address' => 'map', 'description' => 'align-left'] as $field => $icon)
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

                <div class="row mb-3">
                    <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                    <div class="col-sm-9">
                        <div class="position-relative input-icon">
                            <input type="file" name="photo" class="form-control" id="photo">
                            <span class="position-absolute top-50 translate-middle-y"><i class="lni lni-image"></i></span>
                        </div>
                        @error('photo')
                            <span style="color: red">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-9 offset-sm-3">
                        <div class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end"><button
                                type="submit" class="btn btn-success px-4">Submit</button></div>

                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection -->




@extends('layout.backend.main')

@section('page_content')
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                        <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                    </div>
                    <hr />
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 800px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
                                        <img src="{{ asset('assets/images/logo-icon.png') }}" width="80" alt="Pharmacy Logo" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="#">
                                            City Pharmacy Ltd.
                                        </a>
                                    </h2>
                                    <div>123 Health Street, Medicity</div>
                                    <div>Phone: (123) 456-7890</div>
                                    <div>Email: info@citypharmacy.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light">BILL TO:</div>
                                    <h2 class="to">MediCare Hospital</h2>
                                    <div class="address">456 Care Avenue, Health City</div>
                                    <div class="email"><a href="mailto:purchase@medicare.com">purchase@medicare.com</a></div>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE #PH-2023-087</h1>
                                    <div class="date">Date: @php echo date('d/m/Y'); @endphp</div>
                                    <div class="date">Due Date: @php echo date('d/m/Y', strtotime('+15 days')); @endphp</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Product</th>
                                        <th>Strength</th>
                                        <th>Uom</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>M001</td>
                                        <td>Paracetamol Tablets</td>
                                        <td>500mg</td>
                                        <td>500boxg</td>
                                        <td class="unit">$0.20</td>
                                        <td class="qty">1000</td>
                                        <td class="discount">5%</td>
                                        <td class="total">$190.00</td>
                                        <td>
                                            <button class="btn btn-sm btn-success add-button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>M002</td>
                                        <td>Amoxicillin Capsules</td>
                                        <td>250mg</td>
                                        <td>250mg</td>
                                        <td class="unit">$0.50</td>
                                        <td class="qty">500</td>
                                        <td class="discount">10%</td>
                                        <td class="total">$225.00</td>
                                        <td>
                                            <button class="btn btn-sm btn-success add-button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>M003</td>
                                        <td>Omeprazole Tablets</td>
                                        <td>20mg</td>
                                        <td>20mg</td>
                                        <td class="unit">$0.75</td>
                                        <td class="qty">200</td>
                                        <td class="discount">2%</td>
                                        <td class="total">$147.00</td>
                                        <td>
                                            <button class="btn btn-sm btn-success add-button">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td>$562.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">TOTAL DISCOUNT (5%)</td>
                                        <td>$28.10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">TAX (5%)</td>
                                        <td>$28.10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td>$590.10</td>
                                    </tr>

                                </tfoot>

                            </table>


                            <div class="notices">
                                <div>NOTES:</div>
                                <div class="notice">
                                    1. All prices include VAT where applicable<br>
                                    2. Please make checks payable to City Pharmacy Ltd.<br>
                                    3. Returns accepted within 7 days of purchase
                                </div>



                            </div>

                            <div class="signature-section" style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd;">
                                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                                    <div style="width: 45%;">
                                        <div class="signature-line" style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Supplier Signature</div>

                                    </div>

                                    <div style="width: 45%;">
                                        <div class="signature-line" style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Pharmacy Authorized Signature</div>

                                    </div>
                                </div>
                            </div>

                        </main>
                        <footer>Pharmacy Invoice - Valid without signature</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        .add-button {
            padding: 3px 8px;
            border-radius: 50%;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th {
            background: #f8f9fa;
            padding: 12px;
            border-bottom: 2px solid #dee2e6;
        }
        td {
            padding: 10px;
            border-bottom: 1px solid #dee2e6;
        }
        .total, .unit, .qty, .discount {
            text-align: right;
        }

        .signature-section {
             margin-top: 40px;
             padding-top: 20px;
             border-top: 1px solid #ddd;
         }

    </style>
@endsection









