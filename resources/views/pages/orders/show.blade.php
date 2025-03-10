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


        @media print {
            body * {
                visibility: hidden;
            }

            #invoice,
            #invoice * {
                visibility: visible;
            }

            #invoice {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
            }

            .printInvoice {
                display: none;
            }
        }
  </style>




    <div class="card">
        <div class="card-body">
            <div id="invoice">
                <div class="toolbar hidden-print">
                    <div class="text-end">
                        <button type="button" class="btn btn-dark printInvoice"><i class="fa fa-print"></i> Print</button>
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
                                    <div class="text-gray-light"><h4>INVOICE TO:</h4></div>
                                    <p>Name: {{ optional($order->customer)->name ?? 'N/A' }}</p>
                                    <p>Email: {{ optional($order->customer)->email ?? 'N/A' }}</p>
                                    <p>Phone: {{ optional($order->customer)->phone ?? 'N/A' }}</p>
                                    <p>Address: {{ optional($order->customer)->address ?? 'N/A' }}</p>
                                </div>
                                <div class="col invoice-details">
                                    <h1 class="invoice-id">INVOICE#CP-{{ $order->id }}</h1>
                                    {{ optional($order->order_date)->format('d-m-Y') ?? 'N/A' }}

                                    {{ optional($order->delivery_date)->format('d-m-Y') ?? 'N/A' }}

                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Item</th>
                                        <th>Qty</th>
                                        <th>Unit Price</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($order->orderDetails as $detail)
                                        <tr>
                                            <td>{{ optional($detail->product)->name ?? 'N/A' }}</td>
                                            <td>{{ $detail->qty }}</td>
                                            <td>${{ number_format($detail->price, 2) }}</td>
                                            <td>${{ number_format($detail->discount, 2) }}</td>
                                            <td>${{ number_format($detail->price * $detail->qty - $detail->discount, 2) }}
                                            </td>
                                        </tr>
                                    @endforeach


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4" class="text-end">Subtotal</td>
                                        <td>${{ number_format($order->total_order, 2) }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" class="text-end">VAT ({{ $order->vat }}%)</td>
                                        <td>${{ number_format($order->total_order * ($order->vat / 100), 2) }}</td>
                                    </tr>
                                    <tr class="bg-light">
                                        <td colspan="4" class="text-end text-primary">Grand Total</td>
                                        <td class="text-primary">
                                            ${{ number_format($order->total_order + $order->total_order * ($order->vat / 100), 2) }}
                                        </td>
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

                            <div class="signature-section"
                                style="margin-top: 40px; padding-top: 20px; border-top: 1px solid #ddd;">
                                <div style="display: flex; justify-content: space-between; margin-top: 30px;">
                                    <div style="width: 45%;">
                                        <div class="signature-line"
                                            style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Customer Signature</div>

                                    </div>

                                    <div style="width: 45%;">
                                        <div class="signature-line"
                                            style="border-bottom: 1px solid #000; width: 80%; margin: 20px 0;"></div>
                                        <div style="font-weight: bold;">Pharmacy Authorized Signature</div>

                                    </div>
                                </div>
                            </div>

                        </main>
                        {{-- <div class="text-center mt-4">
                            <button type="button" class="btn btn-dark printInvoice"><i class="fa fa-print"></i> Print</button>
                        </div> --}}
                        <footer>Pharmacy Invoice - Valid without signature</footer>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('script')
    <script>
        $(document).ready(function() {
            $('.printInvoice').on('click', function() {
                var printContents = document.getElementById('invoice').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            });
        });
    </script>





    {{-- <script>
        $(document).ready(function() {
            $('.printInvoice').on('click', function() {
                var printContents = document.getElementById('invoice').innerHTML;
                var printWindow = window.open('', '_blank');

                printWindow.document.write('<html><head><title>Invoice</title>');
                printWindow.document.write('<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">');
                printWindow.document.write('</head><body>');
                printWindow.document.write(printContents);
                printWindow.document.write('</body></html>');
                printWindow.document.close();
                printWindow.focus();
                setTimeout(function() {
                    printWindow.print();
                    printWindow.close();
                }, 500);
            });
        });
    </script> --}}



@endsection
