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
                                    <p>Email: <span class="email"></span></p>
                                    <p>Phone: <span class="phone"></span></p>
                                    <p>Address: <span class="address"></span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h1 class="invoice-id">INVOICE #{{ DB::table('orders')->count() + 1 }}</h1>
                                    <p>Date of Invoice: {{ date('d/m/Y') }}</p>
                                    <p>Due Date: {{ date('d/m/Y', strtotime('+7 days')) }}</p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-primary text-white fw-bolder ">
                                        <tr>
                                            <th class="fw-bold m-2">Item No</th>
                                            <th class="fw-bold ">Item Description</th>
                                            <th class="fw-bold ">Item Strength</th>
                                            <th class="fw-bold ">Unit of Measure</th>
                                            <th class="fw-bold ">Unit Price</th>
                                            <th class="fw-bold ">Quantity</th>
                                            <th class="fw-bold ">Discount</th>
                                            <th class="fw-bold ">Subtotal</th>
                                            <th><button class="btn bg-danger clearAll">ClearAll</button> </th>
                                        </tr>



                                        <tr>
                                            <th>#</th>
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

                                            <th><select class="form-control" name="uom_id" id="uom_id">
                                                    <option value="">Select Uom</option>
                                                    @forelse ($uoms as $uom)
                                                        <option value="{{ $uom->id }}">{{ $uom->name }}
                                                        </option>
                                                    @empty
                                                        <option value="">No Product Found</option>
                                                    @endforelse
                                                </select>
                                            </th>

                                            <th>
                                                <input type="text" disabled class=" form-control p_price">

                                            </th>
                                            <th><input type="number" class=" form-control p_qty"></th>
                                            <th><input type="text" class=" form-control p_discount"></th>
                                            <th></th>
                                            <th><button class="btn btn-primary add_cart_btn">Add</button></th>
                                        </tr>
                                    </thead>
                                    <tbody class="dataAppend">
                                    </tbody>



                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td colspan="7" class="text-end  ">SUBTOTAL</td>
                                            <td class="subtotal">5,200.00</td>
                                        </tr>
                                        <tr>
                                            <td colspan="7" class="text-end"> TOTAL DISCOUNT (25%)</td>
                                            <td class="Discount">1,300.00</td>
                                        </tr>

                                        <tr>
                                            <td colspan="7" class="text-end">VAT (15%)</td>
                                            <td class="vat">$1,300.00</td>
                                        </tr>
                                        <tr class="bg-light">
                                            <td colspan="7" class="text-end text-primary">GRAND TOTAL</td>
                                            <td class="text-primary grandtotal">$6,500.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>





                            <div class="row container">

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

                                <div
                                    class="d-md-flex d-grid align-items-center gap-3 d-flex justify-content-end col-8 p-2 mt-5">
                                    <h4 class="text-success">Thank You!</h4>
                                    <p class="text-muted">A finance charge of 1.5% will be made on unpaid balances after 30
                                        days.</p>
                                </div>
                            </div>
                        </main>

                    </div>

                    <a class="btn btn-primary btn_process" href="{{url('order')}}">Process</a>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(function() {
            const cart = new Cart('order');
            printCart();


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
					<td><span class="fs-14 text-gray">$${element.price} </span></td>
					<td>
						<p class="fs-14 text-gray">${element.qty}</p>
					</td>
					<td><span class="fs-14 text-gray">$${element.total_discount} </span></td>
					<td><span class="fs-14 text-gray">$${element.subtotal} </span></td>
                    <td>
						 <button data="${element.item_id}" class=' btn btn-warning remove'>Remove</button>
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

                let customer_id = $('#customer_id').val();
                let total_order = $('.grandtotal').text();
                let paid_amount = $('.grandtotal').text();
                let status_id = $('.status_button').val();
                let discount = $('.Discount').text();
                let vat = $('.vat').text();
                let products = cart.getCart()


                // let dataItem = {
                //     customer_id: customer_id,
                //
                //     total_order: total_order,
                //     paid_amount: paid_amount,
                //     status: status,
                //     discount: discount,
                //     vat: vat,
                //     product: products,
                // };
                // console.log(dataItem);



                $.ajax({
                    url: "{{ url('api/order') }}",
                    type: 'Post',
                    data: {
                        customer_id: customer_id,
                        total_order: total_order,
                        status_id: status_id,
                        paid_amount: paid_amount,
                        discount: discount,
                        vat: vat,
                        products: products,
                    },
                    success: function(res) {

                        if (res.success) {
                            cart.clearCart();
                            printCart();
                            $('#customer_id').val("");
                            $(".email").text("");
                            $(".phone").text("");
                            $(".address").text("");

                             // নতুন URL এ রিডাইরেক্ট


                            // Clear input fields
                            $(".p_price").val("");
                            $(".p_strength").val("");
                            $(".p_qty").val("");
                            $(".p_discount").val("");
                            $("#uom_id").val("");
                            $("#product_id").val("");

                            alert("Order processed successfully!");



                        }
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
