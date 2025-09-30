<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #F2E9D0, #EACEB4);
            font-family: 'Segoe UI', sans-serif;
        }
        h1 {
            color: #5b2828;
            letter-spacing: 1px;
        }
        p {
            color: #5b2828;
        }
        .logo-container img {
        
            padding: 8px;
        }
        .btn-login {
            background-color: #BB5A5A;
            color: #fff;
            border: none;
            transition: 0.3s;
        }
        .btn-login:hover {
            background-color: #de7373;
        }
        .btn-register {
            background-color: #BB5A5A;
            color: #fff;
            border: none;
            transition: 0.3s;
        }
        .btn-register:hover {
            background-color: #de7373;
        }
      
    </style>
</head>
<body class="d-flex align-items-center justify-content-center vh-100">

<div class="card-box text-center">
    <div class="logo-container d-flex justify-content-center align-items-center gap-3 mb-4">
        <img src="{{ asset('images/smk13.png') }}" alt="Logo Sekolah" class="img-fluid" style="max-height: 100px;">
        <img src="{{ asset('images/logobukutamu.png') }}" alt="Logo Buku Tamu" class="img-fluid" style="max-height: 120px;">
    </div>

    <h1 class="fw-bold mb-2">BUKU TAMU DIGITAL</h1>
    <p class="fs-5 mb-4">SMK Negeri 13 Bandung</p>

    <div class="d-flex justify-content-center gap-3">
        <a href="{{ route('login') }}" class="btn btn-login px-4">Login</a>
        <a href="{{ route('register') }}" class="btn btn-register px-4">Registrasi</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
