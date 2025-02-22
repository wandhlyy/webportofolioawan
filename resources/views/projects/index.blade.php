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

        .container {
            max-width: 1000px;
        }
        .card {
            background-color: #1e1e1e;
            border-radius: 12px;
            box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.3);
            border: none;
            color: #ffffff;
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

        .table th {
            background-color: #f1c40f;
            color: #121212;
        }
        .table-hover tbody tr:hover {
            background-color: #2c2c2c;
        }
        .btn-primary {
            background-color: #f1c40f;
            border: none;
            color: #121212;
        }
        .btn-primary:hover {
            background-color: #d4ac0d;
            color: #ffffff;
        }
        .badge {
            font-size: 0.9em;
            padding: 5px 10px;
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

    <div class="container mt-5">
        <div class="card p-4">
            <h1 class="mb-4 text-center">Daftar Proyek</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-primary mb-3">Tambah Proyek</a>
            
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Judul Proyek</th>
                        <th>Karya</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($projects as $project)
                        <tr>
                            <td><strong>{{ $project->title }}</strong></td>
                            <td>{{ $project->author }}</td>
                            <td>{{ $project->project_date }}</td>
                            <td>
                                <a href="{{ route('projects.edit', $project->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('projects.destroy', $project->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="card p-4 mt-4">
            <h3 class="text-center">Riwayat Proyek</h3>
            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th>Email</th>
                        <th>Karya</th>
                        <th>Judul Proyek</th>
                        <th>Tanggal</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($histories as $history)
                    <tr>
                        <td>{{ $history->user_email }}</td>
                        <td>{{ $history->author }}</td>
                        <td>{{ $history->project_title }}</td>
                        <td>{{ \Carbon\Carbon::parse($history->project_date)->format('d-m-Y') }}</td>
                        <td>
                            <span class="badge bg-{{ $history->status == 'valid' ? 'success' : ($history->status == 'in process' ? 'warning' : 'danger') }}">
                                {{ ucfirst($history->status) }}
                            </span>
                        </td>
                        <td>
                            <form action="{{ route('projects.updateStatus', $history->id) }}" method="POST" class="d-flex align-items-center gap-2">
                                @csrf
                                @method('PUT')
                                <select name="status" class="form-select form-select-sm w-auto">
                                    <option value="valid" {{ $history->status == 'valid' ? 'selected' : '' }}>Valid</option>
                                    <option value="in process" {{ $history->status == 'in process' ? 'selected' : '' }}>In Process</option>
                                    <option value="tidak valid" {{ $history->status == 'tidak valid' ? 'selected' : '' }}>Tidak Valid</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
