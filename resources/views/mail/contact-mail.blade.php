<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; margin: 0 auto; background: #ffffff; padding: 20px; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); border: 1px solid #ddd;">
        <!-- Header Section -->
        <div style="background: #343667; padding: 15px; text-align: center;">
            <img src="https://yashtools.in/assets/images/logo/logo.png" alt="Company Logo" style="max-width: 150px;">
        </div>
        
        <!-- Main Content -->
        <div>
            <h3 style="text-align: background: #343667; center; color: #333;">Client Has Submitted Following Data Through Our Online Contact Form</h3>
            
            <div style="background: #ffc8c5; padding: 15px; border-radius: 5px;">
                <p><strong>Fast Name :</strong> {{$request['name']}}</p>
                <p><strong>Mobile No :</strong> {{$request['phone']}}</p>
                <p><strong>Email ID :</strong> <a href="mailto:{{$request['email']}}" style="color: #343667;">{{$request['email']}}</a></p>
                <p><strong>Message :</strong> {{$request['message']}}</p>
            </div>
        </div>

        <!-- Footer Section -->
        <div>
            <p style="margin: 5px 0;">Email: <a href="mailto:sales@yashtools.in" style="color: #343667;">sales@yashtools.in</a></p>
            <p style="margin: 5px 0;">Contact No: +91-9326 17 8710</p>
        </div>
    </div>
</body>


</html>