<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order Sent</title>
    <style>
        /* Basic resets for email clients */
        body {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .header img {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .content {
            padding: 20px 0;
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
            padding: 20px 10px;
            font-size: 13px;
            color: #777;
            border-top: 2px solid #ddd;
            margin-top: 20px;
            line-height: 1.4;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            color: #fff;
            background: #343667;
            border-radius: 5px;
            text-decoration: none
        }

        @media only screen and (max-width:480px) {
            .container {
                padding: 12px !important;
            }

            .header img {
                max-width: 120px !important;
            }

            .order-details td img {
                width: 40px;
            }
        }
    </style>
    <style>
        /* Basic resets for email clients */
        body {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06);
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }

        .header img {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto;
        }

        .content {
            padding: 20px 0;
        }

        .footer {
            text-align: center;
            padding: 20px 10px;
            font-size: 13px;
            color: #777;
            border-top: 2px solid #ddd;
            margin-top: 20px;
            line-height: 1.4;
        }

        .footer .small-text {
            font-size: 12px;
            color: #999;
            margin: 8px 0 0 0;
            line-height: 1.4;
        }

        .footer table {
            width: 100%;
            margin: 10px 0;
            border-collapse: collapse;
        }

        .footer img {
            display: block;
            /* prevents image gaps in many clients */
            border: 0;
            line-height: 0;
        }

        .footer .hashtag {
            font-weight: 700;
            color: #2b2b2b;
            font-size: 16px;
            display: inline-block;
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #343667;
            text-decoration: none;
            border-radius: 5px;
        }

        .button:hover {
            background-color: #0056b3;
        }

        /* Mobile stacking for clients that support media queries */
        @media only screen and (max-width:480px) {
            .container {
                padding: 12px !important;
            }

            .header img {
                max-width: 120px !important;
            }

            .footer table,
            .footer tr,
            .footer td {
                display: block !important;
                width: 100% !important;
                text-align: center !important;
                padding: 6px 0 !important;
            }

            .footer .hashtag {
                display: block !important;
                margin: 6px 0 !important;
            }
        }
    </style>
</head>

<body style="background-color: #f4f4f4; padding: 20px;">
    <div class="container">
        <div class="header">
            <img src="https://yashtools.in/assets/images/logo/logo.png" alt="Company Logo">
            <h2>Order Sent</h2>
        </div>

        <div class="content">
            <p>Dear <strong>{{ $user->fullname }}</strong>,</p>
            <p>Thank you for your order! Your order ID <strong>#{{ $enquiry_id }}</strong> has been successfully
                submitted.</p>

            <table class="order-details">
                <tr>
                    <th>Product</th>
                    <th>Part Number</th>
                    <th>Quantity</th>
                </tr>
                @foreach ($requestData as $key => $product)
                    <tr>
                        <td style="vertical-align:middle;">
                            <img src="{{ asset('uploads/products/thumbnails/' . $product->product_thumbain) }}"
                                style="width:50px;vertical-align:middle;margin-right:8px;"
                                alt="{{ $product->product_name }}">
                            {{ $product->product_name }}
                        </td>
                        <td>{{ $partNumber ?? 'N/A' }}</td>
                        <td>{{ $productQuantities[$key] ?? 'N/A' }}</td>
                    </tr>
                @endforeach
            </table>

            <p>Our team will review your order and get back to you soon.</p>
        </div>

        <div class="footer">

            <div style="text-align:left;">
                <p style="text-align:left;margin:0;padding:0 0 10px 0;">Thanks & Regards , <br><strong>Yash Tools
                        (India) Team</strong></p>
            </div>  

            <table role="presentation" cellpadding="0" cellspacing="0"
                style="width:100%;margin:10px 0;border-collapse:collapse;">
                <tr>
                    <td align="left" style="vertical-align:middle;width:33%;padding:0 6px;">
                        <a href="#" target="_blank"
                            style="text-decoration:none;display:inline-block;margin-right:6px;">
                            <img src="https://cdn-icons-png.flaticon.com/24/733/733547.png" alt="Facebook"
                                style="display:block;width:34px;height:34px;border:0;">
                        </a>
                        <a href="#" target="_blank" style="text-decoration:none;display:inline-block;">
                            <img src="https://cdn-icons-png.flaticon.com/24/174/174857.png" alt="LinkedIn"
                                style="display:block;width:34px;height:34px;border:0;">
                        </a>
                    </td>
                    <td align="center" style="vertical-align:middle;width:34%;padding:0 6px;">
                        <span class="hashtag" style="display:inline-block;">#YashTools</span>
                    </td>
                    <td align="right" style="vertical-align:middle;width:33%;padding:0 6px;">
                        <!-- Social Icons -->
                        <a href="#" target="_blank" rel="noopener noreferrer"
                            style="text-decoration:none;display:inline-block;margin-left:6px;">
                            <img src="https://cdn-icons-png.flaticon.com/24/733/733579.png" alt="Twitter"
                                style="display:block;height:34px;border:0;">
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer"
                            style="text-decoration:none;display:inline-block;margin-left:6px;">
                            <img src="https://cdn-icons-png.flaticon.com/24/2111/2111463.png" alt="Instagram"
                                style="display:block;height:34px;border:0;">
                        </a>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div style="max-width:600px;margin:0 auto;padding:10px 0;font-size:12px;color:#999;text-align:center;">
        <div style="text-align:center;">
            <p style="margin:0;padding:6px 10px;font-size:12px;color:#999;">{{ date('Y') }}. All Rights Reserved by
                Yash Tools (India)</p>
            {{-- <p style="margin:0;padding:6px 10px;font-size:12px;color:#999;">{{ date('Y') }}. All Rights Reserved by
                Yash Tools (India) Private Limited</p> --}}
            <p style="margin:0;padding:6px 10px;font-size:12px;color:#999;"><strong>Registered Office:</strong> A- 202
                B, Jaswanti Allied Business Centre, Kanchpada, Ramchandra Lane, Next to Khwaish Hotel Malad (West),
                Mumbai- 400064, India. +91-9326 17 8710, +91-9322 25 8458</p>
        </div>
    </div>
</body>

</html>
