 {{-- @extends('layout.backend.main')

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
                    <div style="min-width: 600px">
                        <header>
                            <div class="row">
                                <div class="col">
                                    <a href="javascript:;">
                                        <img src="{{asset('assets')}}/images/logo-icon.png" width="80" alt="" />
                                    </a>
                                </div>
                                <div class="col company-details">
                                    <h2 class="name">
                                        <a target="_blank" href="javascript:;">
                                            MF-Pharma
                                        </a>
                                    </h2>

                                    <div>61,Progoti Sharoni,
                                        Shajadpur,Gulshan, Dhaka-1212</div>
                                    <div>(+880)16344-31926</div>
                                    <div>mf-pharma25@gmail.com</div>
                                </div>
                            </div>
                        </header>
                        <main>
                            <div class="row contacts">
                                <div class="col invoice-to">
                                    <div class="text-gray-light"><h4>INVOICE TO:</h4></div>


                                            <select class="form-control" name="customer_id" id="customer_id">
                                                @forelse ($customers as $customer)
                                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                                @empty
                                                    <option value="">No Customer Found</option>
                                                @endforelse
                                            </select>

                                        Address: <span class="address" value="{{ $customer->id }}">{{ $customer->address }}</span><br>
                                        Email: <span class="email" value="{{ $customer->id }}">{{ $customer->email }}</span>


                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE 3-2-1</h1>
                                    <div class="date">Date of Invoice: 01/10/2018</div>
                                    <div class="date">Due Date: 30/10/2018</div>
                                </div>
                            </div>
<div class="row">
    <div class="col-12 table-resposnive mt-2">
        <table>
            <thead>
                <tr>

                    <th class="text-left " colspan="2">Item-no</th>
                    <th class="text-left">Product</th>
                    <th class="text-left">Uom</th>
                    <th class="text-right">Price</th>
                    <th class="text-right">Qty</th>
                    <th class="text-right">Discount</th>
                    <th class="text-right">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="no">04</td>
                    <td class="text-left">
                        <h3>
                            <a target="_blank" href="javascript:;">
                                Youtube channel
                            </a>
                        </h3>
                        <a target="_blank" href="javascript:;">
                            Useful videos
                        </a> to improve your Javascript skills. Subscribe and stay tuned :)
                    </td>
                    <td class="unit">$0.00</td>
                    <td class="qty">100</td>
                    <td class="total">$0.00</td>
                </tr>
                <tr>
                    <td class="no">01</td>
                    <td class="text-left">
                        <h3>Website Design</h3>Creating a recognizable design solution based on the
                        company's existing visual identity
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">30</td>
                    <td class="total">$1,200.00</td>
                </tr>
                <tr>
                    <td class="no">02</td>
                    <td class="text-left">
                        <h3>Website Development</h3>Developing a Content Management System-based Website
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">80</td>
                    <td class="total">$3,200.00</td>
                </tr>
                <tr>
                    <td class="no">03</td>
                    <td class="text-left">
                        <h3>Search Engines Optimization</h3>Optimize the site for search engines (SEO)
                    </td>
                    <td class="unit">$40.00</td>
                    <td class="qty">20</td>
                    <td class="total">$800.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">SUBTOTAL</td>
                    <td>$5,200.00</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">TAX 25%</td>
                    <td>$1,300.00</td>
                </tr>
                <tr>
                    <td colspan="2"></td>
                    <td colspan="2">GRAND TOTAL</td>
                    <td>$6,500.00</td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>



                            <div class="thanks">Thank you!</div>
                            <div class="notices">
                                <div>NOTICE:</div>
                                <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.
                                </div>
                            </div>
                        </main>
                        <footer>Invoice was created on a computer and is valid without the signature and seal.</footer>
                    </div>
                    <!--DO NOT DELETE THIS div. IT is responsible for showing footer always at the bottom-->
                    <div></div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!--end page wrapper -->
@endsection --}}


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
                                <img src="{{asset('assets')}}/images/logo-icon.png" width="120" alt="Company Logo" />
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
                                    <p>Address: <span class="fw-bold">{{ $customer->address ?? 'N/A' }}</span></p>
                                    <p>Email: <span class="fw-bold">{{ $customer->email ?? 'N/A' }}</span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h1 class="invoice-id">INVOICE #321</h1>
                                    <p>Date of Invoice: 01/10/2018</p>
                                    <p>Due Date: 30/10/2018</p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Item No</th>
                                            <th>Item Description</th>
                                            <th>Unit of Measurement</th>
                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Website Design</td>
                                            <td>Service</td>
                                            <td>$40.00</td>
                                            <td>30</td>
                                            <td>5%</td>
                                            <td>$1,140.00</td>
                                        </tr>
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
                                <p class="text-muted">A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
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






 {{-- @extends('layout.backend.main')

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
                                <img src="{{asset('assets')}}/images/logo-icon.png" width="120" alt="Company Logo" />
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
                                    <p>Address: <span class="fw-bold">{{ $customer->address ?? 'N/A' }}</span></p>
                                    <p>Email: <span class="fw-bold">{{ $customer->email ?? 'N/A' }}</span></p>
                                </div>
                                <div class="col-md-6 text-end">
                                    <h1 class="invoice-id">INVOICE #321</h1>
                                    <p>Date of Invoice: 01/10/2018</p>
                                    <p>Due Date: 30/10/2018</p>
                                </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped text-center">
                                    <thead class="bg-dark text-white">
                                        <tr>
                                            <th>Item No</th>
                                            <th>
                                                Item Description</th>
                                            <th>Unit of Measurement</th>

                                            <th>Unit Price</th>
                                            <th>Quantity</th>
                                            <th>Discount</th>
                                            <th>Subtotal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>01</td>
                                            <td>Website Design</td>
                                            <td>Service</td>
                                            <td>$40.00</td>
                                            <td>30</td>
                                            <td>5%</td>
                                            <td>$1,140.00</td>
                                        </tr>
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
                                            <td colspan="6" class="text-end">TAX (25%)</td>
                                            <td>$1,300.00</td>
                                        </tr>
                                        <tr class="bg-primary text-black">
                                            <td colspan="6" class="text-end">GRAND TOTAL</td>
                                            <td>$6,500.00</td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="text-center mt-4">
                                <h4 class="text-success">Thank You!</h4>
                                <p class="text-muted">A finance charge of 1.5% will be made on unpaid balances after 30 days.</p>
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
@endsection - --}}


{{-- @section('script')
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
                let customer_id = $(this).val();
                $.ajax({
                    url: "{{ url('find_customer') }}",
                    type: 'post',
                    data: {
                        id: customer_id
                    },
                    success: function(res) {
                        //let data=JSON.parse(res);
                        console.log(res.customer);

                        $(".email").text(res.customer?.email);
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

                        $(".p_description").val(res.product?.description);
                        $(".p_price").val(res.product?.offer_price);
                        $(".p_qty").val(1);
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
                let qty = $(".p_qty").val();
                let discount = $(".p_discount").val();

                let total_discount = discount * qty;
                let subtotal = price * qty - total_discount;

                let item = {
                    "name": name,
                    "item_id": item_id,
                    "price": price,
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
				let subtotal=0;
				let dicount=0;
				let grandtotal=0;

                cartdata.forEach(element => {
					subtotal+=element.subtotal
					dicount+=element.total_discount

                    htmldata += `
				 <tr>
					<td>
						 <button data="${element.item_id}" class='btn btn-danger remove'>-</button>
					</td>
					<td>
						<p class="fs-14">${element.name}</p>
					</td>
					<td>
						<p class="fs-14 text-gray">${element.name}</p>

					</td>
					<td><span class="fs-14 text-gray">$${element.price} </span></td>
					<td>
						<p class="fs-14 text-gray">${element.qty}</p>
					</td>
					<td><span class="fs-14 text-gray">$${element.total_discount} </span></td>
					<td><span class="fs-14 text-gray">$${element.subtotal} </span></td>
				</tr>
				`;
                });

				 $('.dataAppend').html(htmldata);


				 $('.subtotal').html(subtotal);
				 $('.tax').html(subtotal * 5/100);
				 $('.Discount').html(dicount);
				 $('.grandtotal').html(subtotal + (subtotal * 5/100));
				 cartIconIncrease()
				}

            }


			$(document).on('click', '.remove', function(){
				let id = $(this).attr('data');
				cart.delItem(id);
				printCart();
			})


			$(document).on('click', '.clearAll', function(){
				cart.clearCart();
				printCart();
			});
			cartIconIncrease()
			function cartIconIncrease(){
				let items= cart.getCart().length
				$(".cartIcon").html(items);
			}

			$('.btn_process').on('click', function(){
				alert()
			})


        })
    </script>


    <script src="{{ asset('assets/js/cart_.js') }}"></script>
@endsection --}}
