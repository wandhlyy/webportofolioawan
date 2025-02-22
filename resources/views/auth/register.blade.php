<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .register-container {
            width: 100%;
            max-width: 400px;
            padding: 2rem;
            background: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0px 4px 10px rgba(255, 255, 255, 0.1);
        }
        .form-control {
            border-radius: 8px;
            background-color: #2a2a2a;
            color: #ffffff;
            border: 1px solid #444;
        }
        .form-control:focus {
            border-color: #ffc107;
            box-shadow: 0 0 8px rgba(255, 193, 7, 0.5);
        }
        .btn-warning {
            border-radius: 8px;
            font-weight: bold;
        }
        a {
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="register-container text-center">
            <h2 class="mb-4">Register</h2>
            <form method="POST" action="{{ route('register.post') }}">
                @csrf
                <div class="mb-3 text-start">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="mb-3 text-start">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-warning w-100 py-2">Register</button>
            </form>
            <p class="mt-3">Sudah punya akun? <a href="{{ route('login') }}" class="text-warning">Login</a></p>
        </div>
    </div>
</body>
</html>
