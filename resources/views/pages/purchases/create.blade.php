
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
                                    {{-- <div class="text-gray-light"></div> --}}
                                    <h4 class="to">BILL TO:</h4>
                                    <select class="form-control" name="supplier_id" id="supplier_id">
                                        @forelse ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @empty
                                        <option value="">No supplier Found</option>
                                    @endforelse
                                    </select>
                                    <p >Email:<span class="email"></span></p>
                                    <p >Representative:<span class="contact_person"></span></p>
                                    <p >Phone:<span class="phone"></span></p>
                                    <p>Address:<span class="address"></span></p>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE #{{ DB::table('purchases')->count() + 1 }}</h1>
                                    <div class="date">Date of Invoice: @php echo date('d/m/Y'); @endphp</div>
                                    <div class="date">Due Date: @php echo date('d/m/Y', strtotime('+15 days')); @endphp</div>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th class="fw-bold bg-primary">SL</th>
                                        <th  class="fw-bold bg-primary">Item Description</th>
                                        <th  class="fw-bold bg-primary">Strength</th>
                                        <th  class="fw-bold bg-primary">Uom</th>
                                        <th  class="fw-bold bg-primary">Price</th>
                                        <th  class="fw-bold bg-primary">Qty</th>
                                        <th  class="fw-bold bg-primary">Discount</th>
                                        <th  class="fw-bold bg-primary">Total</th>
                                        <th  class="fw-bold bg-primary"><button class="btn bg-danger clearAll">ClearAll</button></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>M001</td>
                                        <td><select class="form-control" name="product_id" id="product_id">
                                            <option value="">Select Product</option>
                                            @forelse ($products as $product)
                                                <option value="{{ $product->id }}">{{ $product->name }}
                                                </option>
                                            @empty
                                                <option value="">No Product Found</option>
                                            @endforelse
                                        </select>
                                    </td>
                                        <td><input type="text" disabled class=" form-control p_strength"></td>
                                        <td><select class="form-control" name="uom_id" id="uom_id">
                                            <option value="">Select Uom</option>
                                            @forelse ($uoms as $uom)
                                                <option value="{{ $uom->id }}">{{ $uom->name }}
                                                </option>
                                            @empty
                                                <option value="">No Product Found</option>
                                            @endforelse
                                        </select>
                                    </td>
                                        <td> <input type="text" disabled class=" form-control p_price"></td>
                                        <td ><input type="number" class=" form-control p_qty"></td>
                                        <td><input type="text" class=" form-control p_discount">%</td>
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









