@extends('layout.backend.main')

@section('page_content')
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

        .total,
        .unit,
        .qty,
        .discount {
            text-align: right;
        }

        .signature-section {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 1px solid #ddd;
        }
    </style>
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
                                        <img src="{{ asset('assets/images/logo-icon.png') }}" width="80"
                                            alt="Pharmacy Logo" />
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
                                    <select class="form-control supplier_id" name="supplier_id" id="supplier_id">
                                        @forelse ($suppliers as $supplier)
                                            <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                        @empty
                                            <option value="">No supplier Found</option>
                                        @endforelse
                                    </select>
                                    <p>Email:<span class="email"></span></p>
                                    <p>Phone:<span class="phone"></span></p>
                                    <p>Address:<span class="address"></span></p>
                                    <p>Representative:<span class="contact_person"></span></p>
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
                                        <th class="fw-bold bg-primary">Item Description</th>
                                        <th class="fw-bold bg-primary">Strength</th>
                                        <th class="fw-bold bg-primary">Uom</th>
                                        <th class="fw-bold bg-primary">Price</th>
                                        <th class="fw-bold bg-primary">Qty</th>
                                        <th class="fw-bold bg-primary">Discount</th>
                                        <th class="fw-bold bg-primary">Total</th>
                                        <th class="fw-bold bg-primary"><button
                                                class="btn bg-danger clearAll">ClearAll</button></th>
                                    </tr>

                                    <tr>
                                        <th>M001</th>
                                        <th><select class="form-control" name="product_id" id="product_id">
                                                <option value="">Select Product</option>
                                                @forelse ($products as $product)
                                                    <option value="{{ $product->id }}">{{ $product->name }}
                                                    </option>
                                                @empty
                                                    <option value="">No Product Found</option>
                                                @endforelse
                                            </select>
                                        </th>
                                        <th><input type="text" disabled class=" form-control p_strength"></th>
                                        <th>
                                            <select class="form-control" name="uom_id" id="uom_id">
                                                <option value="">Select Uom</option>
                                                @forelse ($uoms as $uom)
                                                    <option value="{{ $uom->id }}">{{ $uom->name }}
                                                    </option>
                                                @empty
                                                    <option value="">No Product Found</option>
                                                @endforelse
                                            </select>

                                        </th>
                                        <th> <input type="text" disabled class=" form-control p_price"></th>
                                        <th><input type="number" class=" form-control p_qty"></th>
                                        <th><input type="text" class=" form-control p_discount"></th>
                                        <th class="total"></th>
                                        <th>
                                            <button class="btn btn-sm btn-success  add_cart_btn">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </th>
                                    </tr>



                                </thead>
                                <tbody class="dataAppend"> </tbody>
                                <tfoot>

                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">SUBTOTAL</td>
                                        <td class="subtotal">$562.00</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">TOTAL DISCOUNT (5%)</td>
                                        <td class="Discount">$28.10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">TAX (5%)</td>
                                        <td class="vat">$28.10</td>
                                    </tr>
                                    <tr>
                                        <td colspan="5"></td>
                                        <td colspan="2">GRAND TOTAL</td>
                                        <td class=" grandtotal">$590.10</td>
                                    </tr>

                                </tfoot>



                            </table>


                            <div class="row col-12 mt-">
                                <div class=" col-4 p-2 mt-5">
                                    <label for="status_id" class="form-label status fw-bold">Payment Status</label>
                                    <select name="status_id" class="status_button form-control">
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status->id }}">
                                                {{ $status->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="notices col-12 mt-5">
                                <div>NOTES:</div>
                                <div class="notice">
                                    1. All prices include VAT where applicable<br>
                                    2. Please make checks payable to City Pharmacy Ltd.<br>
                                    3. Returns accepted within 7 days of purchase
                                </div>



                            </div>



                            <div class="signature-section"
                                style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd;">
                                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                                    <div style="width: 45%;">
                                        <div class="signature-line"
                                            style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Supplier Signature</div>

                                    </div>

                                    <div style="width: 45%;">
                                        <div class="signature-line"
                                            style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Pharmacy Authorized Signature</div>

                                    </div>
                                </div>






                            </div>

                        </main>
                        <footer>Pharmacy Invoice - Valid without signature</footer>
                    </div>
                    <a class="btn btn-primary btn_process">Process</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(function() {

            const cart = new Cart('purchase');
            printCart();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });


            $('.supplier_id').on('change', function() {
                //   alert();
                let supplier_id = $(this).val();
                console.log(supplier_id)
                $.ajax({
                    url: "{{ url('find_supplier') }}",
                    type: 'POST',
                    data: {
                        id: supplier_id
                    },
                    success: function(res) {
                        // let data=JSON.parse(res);
                        console.log(res.supplier);
                        $(".email").text(res.supplier?.email);
                        $(".phone").text(res.supplier?.phone);
                        $(".address").text(res.supplier?.address);
                        $(".contact_person").text(res.supplier?.contact_person);
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
                        $(".p_price").val(res.product?.offer_price);
                        $(".p_strength").val(res.product?.strength);
                        $(".p_qty").val(1);
                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }


                });
            });


            $('#uom_id').on('change', function() {
                // alert()
                let uom_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_uom') }}",
                    type: 'POST',
                    data: {
                        id: uom_id
                    },
                    success: function(res) {
                        // let data=JSON.parse(res);
                        console.log(res.uom);
                        $(".name").text(res.uom?.name);

                    },
                    error: function(xhr, status, error) {
                        console.error(error);
                    }
                });
            });


            $('.add_cart_btn').on('click', function() {


                let item_id = $("#product_id").val();
                let name = $("#product_id option:selected").text();

                let price = $(".p_price").val();
                let strength = $(".p_strength").val();
                let qty = $(".p_qty").val();
                let discount = $(".p_discount").val();
                let uom_id = $("#uom_id").val();
                let uom_name = $("#uom_id option:selected").text();

                let total_discount = discount * qty;
                let subtotal = price * qty - total_discount;

                let item = {
                    "name": name,
                    "item_id": item_id,
                    "uom_id": uom_id,
                    "uom_name": uom_name,
                    "price": price,
                    "strength": strength,
                    "qty": parseFloat(qty),
                    "discount": discount,
                    'total_discount': total_discount,
                    "subtotal": subtotal

                };

                cart.save(item);
                printCart();

            });

            function printCart() {
                let cartdata = cart.getCart();
                if (cartdata) {


                    let htmldata = "";
                    let subtotal = 0;
                    let dicount = 0;
                    let grandtotal = 0;

                    cartdata.forEach((element, index) => {
                        subtotal += element.subtotal
                        dicount += element.total_discount

                        htmldata += `
				 <tr>
                    <td>
						<p class="fs-14">${index + 1}</p>
					</td>
					<td>
						<p class="fs-14">${element.name}</p>
					</td>

                      <td>
						<p class="fs-14">${element.strength}</p>
					</td>

					<td>
						<p class="fs-14 text-gray">${element.uom_name}</p>

					</td>
					<td><span class="fs-14 text-gray">${element.price} </span></td>
					<td>
						<p class="fs-14 text-gray">${element.qty}</p>
					</td>
					<td><span class="fs-14 text-gray">${element.total_discount} </span></td>
					<td><span class="fs-14 text-gray">${element.subtotal} </span></td>
                    <td>
						 <button data="${element.item_id}" class=' btn btn-danger remove'><i class="fa fa-minus"></i>
</button>
					</td>
				</tr>
				`;
                    });

                    $('.dataAppend').html(htmldata);


                    $('.subtotal').html(subtotal);
                    $('.vat').html(subtotal * 5 / 100);
                    $('.Discount').html(dicount);
                    $('.grandtotal').html(subtotal + (subtotal * 5 / 100));
                    cartIconIncrease()
                }

            }

            $(document).on('click', '.remove', function() {
                let id = $(this).attr('data');
                cart.delItem(id);
                printCart();
            })

            $(document).on('click', '.clearAll', function() {
                cart.clearCart();
                printCart();
            });
            cartIconIncrease()

            function cartIconIncrease() {
                let items = cart.getCart().length
                $(".cartIcon").html(items);
            }

            cart.clearCart();





            $('.btn_process').on('click', function() {



                let supplier_id = $('#supplier_id').val();
                let total_purchase = $('.grandtotal').text();
                let paid_amount = $('.grandtotal').text();
                let status_id = $('.status_button').val();
                let discount = $('.Discount').text();
                let vat = $('.vat').text();
                let products = cart.getCart()


                // let dataItem = {
                //     supplier_id: supplier_id,

                //     total_purchase: total_purchase,
                //     paid_amount: paid_amount,
                //     status: status,
                //     discount: discount,
                //     vat: vat,
                //     product: products,
                // };
                // console.log(dataItem);


                $.ajax({
                    url: "{{ url('api/purchase') }}",
                    type: 'Post',
                    data: {
                        supplier_id: supplier_id,
                        total_purchase: total_purchase,
                        status_id: status_id,
                        paid_amount: paid_amount,
                        discount: discount,
                        vat: vat,
                        products: products,
                    },
                    success: function(res) {
                        console.log(res)
                        // if (res.success) {
                        //     cart.clearCart();
                        //     printCart();
                        //     $('#supplier_id').val("");
                        //     $(".email").text("");
                        //     $(".phone").text("");
                        //     $(".address").text("");
                        //     $(".contact_person").text("");


                        // }



                    },

                    error: function(xhr, status, error) {
                        console.log(error);
                    }
                });





            });





        });
    </script>


    <script src="{{ asset('assets/js/cart_.js') }}"></script>
@endsection
