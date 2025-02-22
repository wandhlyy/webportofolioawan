<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Web Portofolio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding-top: 80px;
        }

        .navbar {
            background-color: #1e1e1e;
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }
        .navbar-brand {
            color: #f1c40f;
            font-size: 1.8rem;
            font-weight: bold;
        }
        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1rem;
            margin-right: 20px;
        }
        .navbar-nav .nav-link:hover {
            color: #f1c40f;
        }
        .btn-logout {
            background-color: #ff4d4d;
            border: none;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            transition: 0.3s;
        }
        .btn-logout:hover {
            background-color: #cc0000;
        }

        .hero {
            height: 90vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
            background: linear-gradient(to right, #000000, #1e1e1e);
            padding: 100px 20px 50px;
        }
        .hero h1 {
            font-size: 3.5rem;
            font-weight: 700;
            color: #f1c40f;
            margin-bottom: 20px;
        }
        .hero p {
            font-size: 1.2rem;
            max-width: 600px;
            margin: 0 auto 20px;
        }
        .btn-custom {
            background-color: #f1c40f;
            color: #121212;
            padding: 12px 24px;
            font-size: 1.1rem;
            font-weight: 600;
            border-radius: 8px;
            transition: 0.3s;
            text-decoration: none;
        }
        .btn-custom:hover {
            background-color: #d4ac0d;
            color: #fff;
        }

        .section {
            padding: 80px 20px;
            text-align: center;
        }
        .section h2 {
            font-size: 2.5rem;
            color: #f1c40f;
            margin-bottom: 20px;
        }
        .section p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto;
            color: #cccccc;
        }

        .footer {
            background-color: #1e1e1e;
            padding: 20px;
            text-align: center;
            color: #aaaaaa;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">Web Portofolio</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <li class="nav-item">
                        @if(Auth::check() && Auth::user()->email === 'admin1234@gmail.com')
                            <a class="nav-link" href="/projects">Admin</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="btn btn-logout">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Selamat Datang di Web Portofolio</h1>
        <p>Tempat terbaik untuk mengumpulkan dan menampilkan karya kreator berbakat.</p>
        <a href="/detail" class="btn-custom mt-4">Jelajahi Proyek</a>
    </div>

    <div id="about" class="section">
        <div class="container">
            <h2>Tentang Web Portofolio</h2>
            <p>Web Portofolio adalah platform yang memungkinkan kreator untuk membagikan proyek mereka kepada dunia.</p>
        </div>
    </div>

    <div id="contact" class="section bg-dark">
        <div class="container">
            <h2>Hubungi Kami</h2>
            <a href="https://wa.me/6289519142908" target="_blank" class="btn-custom">Hubungi via WhatsApp</a>
        </div>
    </div>

    <div class="footer">
        &copy; {{ date('Y') }} Web Portofolio. Dibuat dengan ❤️ oleh Ahmad Awan Dhely.
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
