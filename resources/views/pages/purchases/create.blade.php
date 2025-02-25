<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pharmacy Purchase Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            margin: 20px;
            padding: 20px;
        }
        .invoice-container {
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 800px;
            margin: auto;
        }
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-bottom: 2px solid #ddd;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .logo {
            max-width: 100px;
        }
        .invoice-details, .supplier-details {
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        th {
            background: #007bff;
            color: #fff;
        }
        .total {
            text-align: right;
            font-weight: bold;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 12px;
            color: #555;
        }
        .print-btn {
            display: block;
            width: 150px;
            margin: 20px auto;
            padding: 10px;
            background: #007bff;
            color: white;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
        .print-btn:hover {
            background: #0056b3;
        }
        .signature {
            display: flex;
            justify-content: space-between;
            margin-top: 40px;
        }
        .signature div {
            text-align: center;
            border-top: 1px solid #000;
            width: 45%;
            padding-top: 10px;
        }
    </style>
</head>
<body>

    <div class="invoice-container">
        <div class="header">
            <img src="https://via.placeholder.com/100" alt="Pharmacy Logo" class="logo">
            <h2>Pharmacy Purchase Invoice</h2>
        </div>

        <div class="invoice-details">
            <p><strong>Invoice ID:</strong> #INV12345</p>
            <p><strong>Date:</strong> <span id="invoice-date"></span></p>
        </div>

        <div class="supplier-details">
            <p><strong>Supplier:</strong> ABC Pharma Ltd.</p>
            <p><strong>Address:</strong> 123, Medical Street, Dhaka</p>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Unit Price (৳)</th>
                    <th>Total Price (৳)</th>
                </tr>
            </thead>
            <tbody id="invoice-body">
                <tr>
                    <td>Paracetamol 500mg</td>
                    <td>10</td>
                    <td>5.00</td>
                    <td class="total-price">50.00</td>
                </tr>
                <tr>
                    <td>Vitamin C Tablets</td>
                    <td>5</td>
                    <td>10.00</td>
                    <td class="total-price">50.00</td>
                </tr>
                <tr>
                    <td>Antibiotic Capsule</td>
                    <td>20</td>
                    <td>15.00</td>
                    <td class="total-price">300.00</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="total">Subtotal</td>
                    <td id="subtotal">400.00 ৳</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">VAT (5%)</td>
                    <td id="vat">20.00 ৳</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Discount (৳)</td>
                    <td id="discount">0.00 ৳</td>
                </tr>
                <tr>
                    <td colspan="3" class="total">Grand Total</td>
                    <td id="grand-total">420.00 ৳</td>
                </tr>
            </tfoot>
        </table>

        <div class="signature">
            <div>
                <p>Authorized Signature</p>
            </div>
            <div>
                <p>Supplier Signature</p>
            </div>
        </div>

        <a href="#" class="print-btn" onclick="window.print();">Print Invoice</a>

        <div class="footer">
            <p>Thank you for your business! If you have any questions, please contact us.</p>
        </div>
    </div>

    <script>
        document.getElementById("invoice-date").innerText = new Date().toLocaleDateString();

        function calculateInvoice() {
            let totalElements = document.querySelectorAll(".total-price");
            let subtotal = 0;

            totalElements.forEach(el => {
                subtotal += parseFloat(el.innerText);
            });

            let vat = subtotal * 0.05;
            let discount = 0; // Change if needed
            let grandTotal = subtotal + vat - discount;

            document.getElementById("subtotal").innerText = subtotal.toFixed(2) + " ৳";
            document.getElementById("vat").innerText = vat.toFixed(2) + " ৳";
            document.getElementById("discount").innerText = discount.toFixed(2) + " ৳";
            document.getElementById("grand-total").innerText = grandTotal.toFixed(2) + " ৳";
        }

        calculateInvoice();
    </script>

</body>
</html>
