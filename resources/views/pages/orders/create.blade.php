@extends('layout.backend.main')

@section('page_content')
    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print text-end mb-3">
                    <button type="button" class="btn btn-dark"><i class="fa fa-print"></i> Print</button>
                    <button type="button" class="btn btn-danger"><i class="fa fa-file-pdf-o"></i> Export as PDF</button>
                </div>
                <div class="invoice overflow-auto">
                    <div style="min-width: 600px">
                        <header class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
                            <div>
                                <img src="{{ asset('assets') }}/images/logo-icon.png" width="120" alt="Company Logo" />
                            </div>
                            <div class="text-end">
                                <h2 class="fw-bold text-primary">MF-Pharma</h2>
                                <p>61, Progoti Sharoni, Shajadpur, Gulshan, Dhaka-1212</p>
                                <p>(+880)16344-31926 | mf-pharma25@gmail.com</p>
                            </div>
                        </header>
                        <main>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <h4 class="text-primary">INVOICE TO:</h4>
                                    <select class="form-control" name="customer_id" id="customer_id">
                                        @forelse ($customers as $customer)
                                            <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                        @empty
                                            <option value="">No Customer Found</option>
                                        @endforelse
                                    </select>
                                    <p>Email: <span class="email">mfpharma25@gmail.com</span></p>
                                    <p>Phone: <span class="phone">01771503646</span></p>
                                    <p>Address: <span class="address">Dhaka</span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h1 class="invoice-id">INVOICE #321</h1>
                                    <p>Date of Invoice: 01/10/2018</p>
                                    <p>Due Date: 30/10/2018</p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-primary text-white fw-bolder ">
                                        <tr>
                                            <th class="fw-bold ">Item No</th>
                                            <th class="fw-bold ">Item Description</th>
                                            <th class="fw-bold ">Unit of Measure</th>
                                            <th class="fw-bold ">Unit Price</th>
                                            <th class="fw-bold ">Quantity</th>
                                            <th class="fw-bold ">Discount</th>
                                            <th class="fw-bold ">Total</th>
                                        </tr>



                                        <tr>
                                            <td>01</td>
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
                                            <td><input type="text" disabled class=" form-control p_offer_price"></td>
                                            <td>30</td>
                                            <td>5%</td>
                                            <td>$1,140.00</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td>02</td>
                                            <td>Website Development</td>
                                            <td>Service</td>
                                            <td>$40.00</td>
                                            <td>80</td>
                                            <td>5%</td>
                                            <td>$3,040.00</td>
                                        </tr>


                                    </tbody>
                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td colspan="6" class="text-end">SUBTOTAL</td>
                                            <td>$5,200.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="6" class="text-end">DISCOUNT (5%)</td>
                                            <td>$1,300.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="6" class="text-end">TAX (25%)</td>
                                            <td>$1,300.00</td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td colspan="6" class="text-end text-primary">GRAND TOTAL</td>
                                            <td class="text-primary">$6,500.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                <h4 class="text-success">Thank You!</h4>
                                <p class="text-muted">A finance charge of 1.5% will be made on unpaid balances after 30
                                    days.</p>
                            </div>
                        </main>
                        <footer class="text-center text-muted pt-3 mt-3 border-top">
                            Invoice was created on a computer and is valid without a signature and seal.
                        </footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {
            const cart = new Cart('order');
            // printCart();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#customer_id').on('change', function() {
                // alert()
                let customer_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_customer') }}",
                    type: 'POST',
                    data: {
                        id: customer_id
                    },
                    success: function(res) {
                        // let data=JSON.parse(res);
                        console.log(res.customer);
                        $(".email").text(res.customer?.email);
                        $(".phone").text(res.customer?.phone);
                        $(".address").text(res.customer?.address);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });


            $('#product_id').on('change', function() {
                let product_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_product') }}",
                    type: 'post',
                    data: {
                        id: product_id
                    },
                    success: function(res) {
                        console.log(res);
                        $(".p_offer_price").val(res.products?.offer_price);
                        $(".p_qty").val(1);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }


                });
            });







        })
    </script>
@endsection
