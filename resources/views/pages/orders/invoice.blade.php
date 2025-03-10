@extends('layout.backend.main')

@section('page_content')
    <div id="invoice">
        <header class="d-flex justify-content-between align-items-center border-bottom pb-3 mb-3">
            <div>
                <img src="{{ asset('assets/images/logo-icon.png') }}" width="120" alt="Company Logo">
            </div>
            <div class="text-end">
                <h2 class="fw-bold text-primary">MF-Pharma</h2>
                <p>61, Progoti Sharoni, Dhaka-1212</p>
                <p>(+880)16344-31926 | mf-pharma25@gmail.com</p>
            </div>
        </header>

        <main>
            <div class="row mb-4">
                <div class="col-md-6">
                    <h4 class="text-primary">INVOICE TO:</h4>
                    <p>Name: {{ optional($order->customer)->name ?? 'N/A' }}</p>
                    <p>Email: {{ optional($order->customer)->email ?? 'N/A' }}</p>
                    <p>Phone: {{ optional($order->customer)->phone ?? 'N/A' }}</p>
                    <p>Address: {{ optional($order->customer)->address ?? 'N/A' }}</p>
                </div>
                <div class="col-md-6 text-end">
                    <h1 class="invoice-id">INVOICE #{{ $order->id }}</h1>
                    {{-- <p>Date: {{ $order->order_date->format('d/m/Y') }}</p> --}}
                    {{ optional($order->order_date)->format('d-m-Y') ?? 'N/A' }}

                    {{-- <p>Due Date: {{ $order->delivery_date->format('d/m/Y') }}</p> --}}
                    {{ optional($order->delivery_date)->format('d-m-Y') ?? 'N/A' }}

                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead class="bg-primary text-white fw-bold">
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
                                <td>{{optional ($detail->product)->name ?? 'N/A'}}</td>
                                <td>{{ $detail->qty }}</td>
                                <td>${{ number_format($detail->price, 2) }}</td>
                                <td>${{ number_format($detail->discount, 2) }}</td>
                                <td>${{ number_format($detail->price * $detail->qty - $detail->discount, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot class="fw-bold">
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
            </div>

            <div class="text-center mt-4">
                <button type="button" class="btn btn-dark printInvoice"><i class="fa fa-print"></i> Print</button>
            </div>
        </main>
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
@endsection
