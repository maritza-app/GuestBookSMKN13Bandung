<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang</title>
    
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <style>
       
        .card {
            border-radius: 20px;
            box-shadow: 0 4px 10px rgba(0,0,0,0.15);
        }
        .qr-img {
            margin-top: 15px;
            border: 4px solid #ddd;
            border-radius: 10px;
        }
        a {
            text-decoration: none;
        }
        .logo-side {
            max-width: 120px;
            height: auto;
        }

    </style>
</head>
<body>
     
<div class="container d-flex justify-content-center align-items-start" 
     style=" padding-top: 150px;">
      <img  src="{{ asset('images/smk13.png')}}" 
         alt="Logo Kiri" 
         class="position-absolute top-0 start-0 m-3" 
         style="width:100px;">
          <img src="{{ asset('images/logobukutamu.png') }}" 
         alt="Logo Kanan" 
         class="position-absolute top-0 end-0 m-3" 
         style="width:100px;">
         
        <div class="card shadow-lg p-4 text-center w-100 mt-n5" 
       style="background-color: #f4a48d; border-radius: 20px;">

            <h1 class="mb-3 fw-bold">Selamat Datang Di<br>SMK Negeri 13 Bandung!</h1>
            <p class="text-muted">Scan QR Code di bawah ini untuk mengisi buku tamu:</p>

            {{-- QR Code --}}
            <div class="d-flex justify-content-center mb-3">
      <img src="https://api.qrserver.com/v1/create-qr-code/?size=200x200&data={{ urlencode(url('/tampil_pengunjung')) }}" 
                alt="QR Code" class="qr-img img-fluid" style="width: 300px; height: 300px;"> 
    </div>
                

            <h6 class="mt-3 text-muted">Atau klik tombol di bawah untuk langsung masuk:</h6>

            <a href="{{ route('tampil_pengunjung.index') }}"  class="btn btn-dark w-20 d-block mx-auto" style="background-color:#bb5a5a; color:white; border:none;">
                🚀 Masuk ke Buku Tamu    </a>
           
        </div>
         
    </div>

     @include('footer')
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
