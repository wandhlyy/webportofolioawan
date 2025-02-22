<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Portofolio</title>
    <!-- Link Google Fonts Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #f8f9fa;
            font-family: 'Poppins', sans-serif;
        }
        .navbar {
            position: fixed;
            top: 0;
            right: 0;
            padding: 15px 30px;
            z-index: 1000;
            display: flex;
            gap: 20px; /* Menambahkan jarak antar tautan */
        }
        .navbar a {
            color: #f1c40f;
            font-size: 1rem;
            font-weight: normal;
            text-decoration: none;
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #d4ac0d;
        }
        .hero {
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(to right, #000000, #1e1e1e);
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: #f1c40f;
        }
        .hero p {
            font-size: 1.2rem;
            color: #dcdcdc;
            max-width: 600px;
            margin: 0 auto;
        }
        .btn-custom {
            background-color: #f1c40f;
            color: #121212;
            padding: 12px 24px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
            display: inline-block;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #d4ac0d;
            color: #fff;
        }
        .footer {
            position: absolute;
            bottom: 20px;
            width: 100%;
            text-align: center;
            color: #777;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <div class="navbar">
        <a href="{{ route('login') }}">Login</a>
        <a href="{{ route('register') }}">Register</a>
    </div>

    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Web Portofolio</h1>
            <p>Tempat terbaik untuk mengumpulkan dan menampilkan karya terbaik dari berbagai kreator.</p>
            <a href="" class="btn-custom mt-4">Jelajahi Proyek</a>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Web Portofolio. Dibuat dengan ❤️ oleh Ahmad Awan Dhely.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
