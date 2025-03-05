<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Status Update</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .header {
            text-align: center;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border-radius: 8px 8px 0 0;
        }

        .content {
            padding: 20px;
            text-align: center;
        }

        .status {
            font-size: 18px;
            font-weight: bold;
            color: #ff0000;
            /* Red for cancelled */
        }

        .status.success {
            color: #28a745;
            /* Green for successful payment */
        }

        .button {
            display: inline-block;
            padding: 10px 20px;
            margin-top: 15px;
            text-decoration: none;
            color: white;
            background-color: #007bff;
            border-radius: 5px;
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2>Order Status Update</h2>
        </div>
        <div class="content">
            <p>Dear <strong>{{ $user->fullname }}</strong>,</p>
            <p>Your order <strong>#{{ $enquiry->enquiry_id }}</strong> status has been updated.</p>
            <p class="status {{ status_class }}">{{ $enquiry->status }}</p>
            <a href="#" class="button">View Order</a>
        </div>
        <div class="footer">
            <p>&copy; 2025 Your Company. All rights reserved.</p>
        </div>
    </div>
</body>

</html>
