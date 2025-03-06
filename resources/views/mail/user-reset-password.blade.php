<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Password Reset</title>
</head>

<body style="font-family: Arial, sans-serif; background-color: #f4f4f4; padding: 20px;">
    <div style="max-width: 600px; background-color: #fff; padding: 20px; margin: auto; border-radius: 5px;">
        <h2 style="color: #333;">Password Reset Request</h2>
        <p>Hello,</p>
        <p>You are receiving this email because we received a password reset request for your account.</p>
        <p>Click the button below to reset your password:</p>
        <p style="text-align: center;">
            <a href="{{ url('/reset-password?token=' . $token) }}"
                style="background-color: #007bff; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;">
                Reset Password
            </a>
        </p>
        <p>If you did not request a password reset, no further action is required.</p>
        <p>Thanks,<br> {{ config('app.name') }}</p>
    </div>
</body>

</html>
