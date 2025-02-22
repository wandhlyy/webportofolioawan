<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Proyek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: #FFD700;
            font-family: 'Poppins', sans-serif;
            animation: fadeIn 1s ease-in-out;
        }
        .project-card {
            background:rgb(29, 29, 29);
            border-radius: 12px;
            box-shadow: 0px 4px 15px rgba(255, 215, 0, 0.3);
            padding: 25px;
            transition: transform 0.3s ease-in-out;
        }
        .project-card:hover {
            transform: scale(1.02);
        }
        h2 {
            font-weight: bold;
            color: #FFD700;
            animation: glow 1.5s infinite alternate;
        }
        p {
            font-size: 17px;
            color: #FFC300;
        }
        .project-image {
            max-width: 100%;
            border-radius: 10px;
            box-shadow: 0px 2px 10px rgba(255, 215, 0, 0.5);
            transition: transform 0.3s ease-in-out;
        }
        .project-image:hover {
            transform: scale(1.05);
        }
        .btn-back {
            background-color: #FFD700;
            color: #121212;
            font-weight: regular;
            transition: all 0.3s ease-in-out;
        }
        .btn-back:hover {
            background-color: #FFC300;
            color: #000;
            box-shadow: 0px 0px 15px rgba(255, 215, 0, 0.8);
        }

        /* Animasi */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes glow {
            from { text-shadow: 0px 0px 10px rgba(255, 215, 0, 0.6); }
            to { text-shadow: 0px 0px 20px rgba(255, 215, 0, 1); }
        }
    </style>
</head>
<body>
<div class="container mt-5">
    <div class="project-card mx-auto col-md-8">
        <h2 class="mb-3 text-center">{{ $project->title }}</h2>
        
        <p><strong>Author:</strong> {{ $project->author }}</p>
        <p><strong>Tanggal Pembuatan:</strong> {{ $project->project_date }}</p>
        <p><strong>Deskripsi:</strong></p>
        <div>{!! $project->description !!}</div>

        @if($project->image)
            <div class="text-center mt-3">
                <img src="{{ asset('storage/' . $project->image) }}" class="project-image">
            </div>
        @endif

        <div class="text-center mt-4">
            <a href="/detail" class="btn btn-back px-4 py-2 rounded">Kembali</a>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
