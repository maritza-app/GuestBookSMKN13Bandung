<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Buku Tamu Digital</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS Custom -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">

</head>
<body>
    <div class="container text-center py-5">

        <!-- Logo -->
        <div class="mb-4">
            <img src="{{ asset('images/smk13.png') }}" alt="Logo" class="logo13 me-3" style="width:100px;">
            <img src="{{ asset('images/logobukutamu.png') }}" alt="Logo Buku" class="logobuku"style="width:100px;">
        </div>
<br>
        <!-- Judul -->
        <h1 class="fw-bold mb-3">
            GUEST BOOK <br> SMK Negeri 13 Bandung
        </h1>
        <p class="lead">Berkunjung Sebagai:</p>

        <!-- Tombol -->


<div class="d-grid gap-3 col-md-6 mx-auto mt-4">
    <a href="{{ route('tampil_pengunjung.instansi') }}" class="btn d-inline-block w-auto">
        🏢 Perwakilan Instansi
    </a>
    <a href="{{ route('tampil_pengunjung.ortu') }}" class="btn  d-inline-block w-auto">
        👨‍👩‍👧 Orang Tua Siswa/Wali Siswa
    </a>
    <a href="{{ route('tampil_pengunjung.umum') }}" class="btn d-inline-block w-auto">
        👥 Pengunjung Umum
    </a>
</div>

        </div>

        <!-- Footer -->
        <div class="mt-5">
            @include('footer')
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Terima Kasih!',
            text: '{{ session('success') }}',
            showConfirmButton: false,
            timer: 3000
        })
    </script>
    @endif
</body>
</html>
