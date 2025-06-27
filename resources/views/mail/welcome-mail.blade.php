<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 2px solid #ddd;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            padding: 20px 0;
        }
        .footer {
            text-align: center;
            padding: 20px;
            font-size: 14px;
            color: #777;
            border-top: 2px solid #ddd;
            margin-top: 20px;
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
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="assets/images/logo/logo.png" alt="Company Logo">
            <h2>Welcome to Yash Tools</h2>
        </div>
        
        <div class="content">
            <p>Dear <b class="text-capitalize">{{$name}}</b>,
                {!! $msgformat !!}
            </p>
        </div>
        
        <div class="footer">
            <p>Best Regards,<br><strong>Yashtools</strong></p>
            <p>Contact Us: sales@yashtools.in | +91-9326 17 8710</p>
        </div>
    </div>
</body>
</html>
