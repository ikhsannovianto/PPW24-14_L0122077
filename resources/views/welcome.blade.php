<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klub Sepak Bola</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .card {
            border: none;
            border-radius: 20px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        .card-header {
            background-color: #3a86ff;
            border-top-left-radius: 20px;
            border-top-right-radius: 20px;
            padding: 2rem;
            transition: background-color 0.3s ease;
        }
        .card-header h1 {
            font-size: 2.5rem;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
            margin-bottom: 0;
        }
        .card-header:hover {
            background-color: #0056b3;
        }
        .card-body {
            padding: 2rem;
        }
        .lead {
            font-size: 1.5rem;
            margin-bottom: 2rem;
            color: #495057;
        }
        .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            border-radius: 10px;
            padding: 12px 32px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            color: #fff;
            font-weight: bold;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #00408b);
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-primary:focus, .btn-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .btn-outline-primary {
            color: #0056b3;
            border-color: #0056b3;
            border-radius: 10px;
            padding: 12px 32px;
            font-size: 1.2rem;
            transition: background-color 0.3s ease, transform 0.2s ease, box-shadow 0.3s ease;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            font-weight: bold;
        }
        .btn-outline-primary:hover {
            background-color: #0056b3;
            color: #fff;
            border-color: #0056b3;
            transform: translateY(-2px);
            box-shadow: 0 6px 8px rgba(0, 0, 0, 0.2);
        }
        .btn-outline-primary:focus, .btn-outline-primary.focus {
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.5);
        }
        .bi {
            vertical-align: middle;
            margin-right: 8px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-8">
                <div class="card animate__animated animate__fadeInUp shadow">
                    <div class="card-header text-white text-center">
                        <h1 class="mb-0">
                            <i class="bi bi-shield-check me-2"></i>
                            Klub Sepak Bola
                        </h1>
                    </div>
                    <div class="card-body text-center">
                        @guest
                            <p class="lead">Selamat datang di aplikasi web untuk mengelola data klub-klub sepak bola!</p>
                            <a href="{{ route('login') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i> Login
                            </a>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">
                                <i class="bi bi-person-plus me-2"></i> Register
                            </a>
                        @else
                            <p class="lead">Selamat datang kembali, {{ Auth::user()->name }}!</p>
                            <a href="{{ route('clubs.index') }}" class="btn btn-primary btn-lg">
                                <i class="bi bi-card-list me-2"></i> Lihat Daftar Klub
                            </a>
                        @endguest
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
