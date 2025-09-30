<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokumentasi Kunjungan</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <img src="{{ asset('images/smk13.png') }}" alt="Logo Sekolah" class="school-logo">
        <h1>Buku Tamu Digital SMK Negeri 13 Bandung</h1>
        <button class="mobile-menu-toggle" onclick="toggleSidebar()">☰</button>

        {{-- <button class="mobile-menu-toggle" onclick="toggleSidebar()">☰</button> --}}
       <form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit" class="logout-btn">Logout</button>
</form>

</body>