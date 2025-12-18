<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>News Letter Subscription Confirmation</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border: 1px solid #ddd;">
        <!-- Header Section -->
        <div style="background: #f1f1f1; padding: 15px; text-align: center;">
            <img src="https://yashtools.in/assets/images/logo/logo.png" alt="Company Logo" style="max-width: 150px;">
        </div>
        
        <!-- Main Content -->
        <div>
            <h3 style="text-align: background: #f1f1f1; center; color: #333;">Client Has Submitted Following Data Through Our Online News Letter Form</h3>
            
            <div style="background: #e8f4ff; padding: 15px; border-radius: 5px;">
                <p><strong>Email :</strong> {{$request['email']}}</p>
            </div>
        </div>
    </div>
</body>


</html>