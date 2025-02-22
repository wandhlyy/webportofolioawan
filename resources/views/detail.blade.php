<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #121212;
            color: #ffffff;
            margin: 0;
            padding-top: 80px; /* Tambahkan padding untuk menghindari navbar bertabrakan */
        }

        /* Navbar */
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

        /* Hero Section */
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

        /* Section */
        .section {
            padding: 80px 20px;
            text-align: center;
        }
        .section h2 {
            font-size: 2.5rem;
            color: #f1c40f;
            margin-bottom: 20px;
        }

        /* Kartu Proyek */
        .card {
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(255, 255, 255, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
        }
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 6px 12px rgba(255, 255, 255, 0.2);
        }
        .card-img-top {
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            height: 200px;
            object-fit: cover;
        }
        .card-body {
            padding: 20px;
            text-align: center;
        }
        .card-title {
            font-size: 1.4rem;
            font-weight: bold;
            color: #f1c40f;
        }
        .card-text {
            font-size: 1rem;
            color: #cccccc;
        }
        .btn-info {
            background-color: #f1c40f;
            border: none;
            color: #121212;
            padding: 8px 16px;
            border-radius: 6px;
            transition: background 0.3s;
        }
        .btn-info:hover {
            background-color: #d4ac0d;
            color: white;
        }

        /* Footer */
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
                    <li class="nav-item"><a class="nav-link" href="/dashboard">Dashboard</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#about">About</a></li>
                    <li class="nav-item"><a class="nav-link" href="#daftar-proyek">Daftar Projects</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="hero">
        <h1>Selamat Datang di Web Portofolio</h1>
        <p>Tempat terbaik untuk mengumpulkan dan menampilkan karya kreator berbakat.</p>
    </div>

    <div id="about" class="section">
        <div class="container">
            <h2>Tentang Web Portofolio</h2>
            <p>Web Portofolio adalah platform yang memungkinkan kreator untuk membagikan proyek mereka kepada dunia.</p>
        </div>
    </div>

    <div id="daftar-proyek" class="section">
        <div class="container mt-5">
            <h2 class="mb-4">Daftar Proyek</h2>
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            <div class="row">
                @foreach($projects as $project)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" class="card-img-top" alt="Gambar Proyek">
                        @else
                            <div class="text-center py-4 bg-light">Tidak ada gambar</div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $project->title }}</h5>
                            <p class="card-text">Author: {{ $project->author }}</p>
                            <p class="card-text"><small class="text-muted">Tanggal: {{ $project->project_date }}</small></p>
                            <a href="{{ route('projects.show', $project->id) }}" class="btn btn-info">Detail</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        &copy; {{ date('Y') }} Web Portofolio. Dibuat dengan ❤️ oleh Ahmad Awan Dhely.
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
