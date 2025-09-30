<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Admin - SMKN 13 Bandung</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex align-items-center justify-content-center vh-100" style="background-color: #eaceb4;">

    <div class="card shadow-lg p-4" style="max-width: 400px; width: 100%;">
        <!-- Logo -->
        <div class="text-center mb-3">
            <img src="{{ asset('images/smk13.png') }}" alt="Logo SMKN 13 Bandung" style="max-height: 70px;">
        </div>

        <div class="auth-card">
            <h1 class="text-center mb-4">Form Registrasi Admin</h1>

            @if (session('status'))
                <div class="error text-red-600 mb-4">{{ session('status') }}</div>
            @endif

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Nama -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" 
                           class="form-control @error('name') is-invalid @enderror" 
                           id="name" 
                           name="name" 
                           required autocomplete="off">
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Email -->
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" 
                           class="form-control @error('email') is-invalid @enderror" 
                           id="email" 
                           name="email" 
                           required autocomplete="off">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Password -->
               <!-- Password -->
<div class="mb-3">
    <label for="password" class="form-label">Password</label>
    <input type="password" 
           class="form-control @error('password') is-invalid @enderror" 
           id="password" 
           name="password" 
           required autocomplete="new-password">
    @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<!-- Konfirmasi Password -->
<div class="mb-3">
    <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
    <input type="password" 
           class="form-control" 
           id="password_confirmation" 
           name="password_confirmation" 
           required autocomplete="new-password">
</div>

                <!-- Remember Me -->
                <div class="form-check mb-3">
                    <input type="checkbox" class="form-check-input" id="remember" name="remember">
                    <label for="remember" class="form-check-label">Remember me</label>
                </div>

                <!-- Tombol -->
                <div class="d-flex justify-content-between align-items-center">
                    <a href="{{ route('login') }}" class="text-decoration-none">Sudah Registrasi?</a>
                    <button type="submit" class="btn btn-primary px-4">Register</button>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
