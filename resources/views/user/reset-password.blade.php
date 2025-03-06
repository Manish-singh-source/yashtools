<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f4f4;
            font-family: Arial, sans-serif;
        }
        .reset-container {
            max-width: 400px;
            margin: 50px auto;
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .btn-reset {
            background-color: #007bff;
            color: white;
        }
        .btn-reset:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <div class="reset-container">
        <h3 class="text-center">Reset Password</h3>
        <p class="text-center">Enter your new password below</p>

        <!-- Password Reset Form -->
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            @method('POST')
            <input type="hidden" name="token" value="{{ request()->query('token') }}">

            <!-- New Password -->
            <div class="mb-3">
                <label for="password" class="form-label">New Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>

            <!-- Confirm Password -->
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-reset w-100">Update Password</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
