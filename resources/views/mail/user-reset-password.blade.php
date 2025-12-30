<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Password Reset</title>
    <style>
        /* Basic resets for email clients */
        body {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.06)
        }

        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd
        }

        .header img {
            max-width: 150px;
            height: auto;
            display: block;
            margin: 0 auto
        }

        .content {
            padding: 20px 0
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 10px;
            font-size: 16px;
            color: #fff;
            background-color: #343667;
            text-decoration: none;
            border-radius: 5px
        }

        .footer {
            text-align: center;
            padding: 20px 10px;
            font-size: 13px;
            color: #777;
            border-top: 2px solid #ddd;
            margin-top: 20px;
            line-height: 1.4
        }

        @media only screen and (max-width:480px) {
            .container {
                padding: 12px !important
            }

            .header img {
                max-width: 120px !important
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
            <h2>Password Reset Request</h2>
        </div>

        <div class="content">
            <p>Hello,</p>
            <p>You are receiving this email because we received a password reset request for your account.</p>
            <p style="text-align: center;">
                <a href="{{ url('/reset-password?token=' . $token) }}" class="button">Reset Password</a>
            </p>
            <p>If you did not request a password reset, no further action is required.</p>
            <p>Thanks,<br> {{ config('app.name') }}</p>
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
                Yash Tools (India) Private Limited</p>
            <p style="margin:0;padding:6px 10px;font-size:12px;color:#999;"><strong>Registered Office:</strong> A- 202
                B, Jaswanti Allied Business Centre, Kanchpada, Ramchandra Lane, Next to Khwaish Hotel Malad (West),
                Mumbai- 400064, India. +91-9326 17 8710, +91-9322 25 8458</p>
        </div>
    </div>
</body>

</html>
