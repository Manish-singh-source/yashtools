<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enquiry Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }

        .email-container {
            max-width: 600px;
            background: #ffffff;
            padding: 20px;
            margin: auto;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            background: #007bff;
            color: #ffffff;
            padding: 10px;
            border-radius: 5px 5px 0 0;
        }

        .content {
            padding: 20px;
        }

        .order-details {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-details th,
        .order-details td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="email-container">
        <div class="header">
            <h2>Order Confirmation</h2>
        </div>
        <div class="content">
            <p>Dear <strong>{{ $user->fullname }}</strong>,</p>
            <p>Thank you for your order! Your order <strong>#{{ $enquiry_id }}</strong> has been successfully placed.
            </p>
            <table class="order-details">

                <tr>
                    <th>Product</th>
                    <th>Part Number</th>
                    <th>Quantity</th>
                </tr>
                @foreach ($requestData as $key => $product)
                    <tr>
                        <td>
                            <img src="{{ asset('/uploads/products/thumbnails/1739870015.png') }}" alt="">
                            {{ $product->product_name }}
                        </td>
                        <td>{{ $partNumber }}</td>
                        <td>{{ $productQuantities[$key] }}</td>
                    </tr>
                @endforeach
                {{-- {{ order_items }} --}}
            </table>
            <p>We will notify you once your order is shipped.</p>
            <p>For any queries, contact us at <a href="mailto:support@example.com">support@example.com</a></p>
        </div>
        <div class="footer">
            <p>&copy; 2025 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
