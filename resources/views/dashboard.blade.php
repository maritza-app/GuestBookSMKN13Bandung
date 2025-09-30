<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Buku Tamu Digital SMKN 13 BDG</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/script.js') }}"></script>
    <style>
.last-visit-wrapper {
    background: #ffffff;
    padding: 15px;
    margin-bottom: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}

.last-visit-wrapper h3 {
    margin-bottom: 10px;
    font-size: 18px;
    color: #333;
}

.last-visit-marquee {
    overflow-x: auto;   /* bisa di scroll kanan-kiri */
    -webkit-overflow-scrolling: touch; /* biar smooth di iOS/Android */
    position: relative;
    height: auto;
    white-space: nowrap; /* biar item tetap sejajar */
}

.last-visit-content {
    display: inline-flex;
    gap: 20px;
  
    min-width: max-content; /* biar panjang ngikutin isi */
}


.visit-item {
    background: #fff6e6;
    padding: 10px 15px;
    border-radius: 8px;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    min-width: 220px;
    max-width: 250px;
    white-space: normal; /* biar bisa turun ke bawah */
    word-wrap: break-word;
    display: inline-block; /* biar tetap bisa jalan */
    vertical-align: top;   /* rata atas */
}

.visit-item p {
    margin: 2px 0;
    font-size: 14px;
    line-height: 1.4;
    color: #000;
}

.last-visit-content {
    display: inline-flex;
    gap: 20px;
   /* sekali jalan, lalu berhenti */
}


</style>

</head>
<body>
    <!-- Navbar -->
    <nav class="navbar">
        @include('navbar')
    </nav>

    <!-- Layout Container -->
    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
           @include('sidebar')
        </aside>

        <!-- Main Content -->
      
          <main class="main-content">
    {{-- Welcome Card --}}
    <div class="welcome-card">
        <br>
        <p class="welcome-text">
            Selamat datang di Dashboard Buku Tamu Digital SMK Negeri 13 Bandung!<br>
            Sistem ini membantu mengelola dan memantau kunjungan tamu, siswa, guru, dan dokumentasi kegiatan sekolah dengan lebih efisien dan terorganisir.
        </p>
    </div>
    <br>
            <!-- Kunjungan Terakhir -->
<div class="last-visit-wrapper">
    <h3>Kunjungan Terakhir Orang tua / Wali</h3>
    <div class="last-visit-marquee">
        <div class="last-visit-content">
            @foreach($kunjungan_terakhir_ow as $k)
                <div class="visit-item">
                    <p><strong>Nama:</strong> {{ $k->nama_ortu_wali }}</p>
                    <p><strong>Keperluan:</strong> {{ $k->keperluan }}</p>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($k->tanggal_kunjungan_ow)->format('d-m-Y H:i') }}</p>
                </div>
            @endforeach
        </div>
    </div>
</div>

<div class="last-visit-wrapper">
    <h3>Kunjungan Terakhir Instansi</h3>
    <div class="last-visit-marquee">
          <div class="last-visit-content">
            @foreach($kunjungan_terakhir_instansi as $k)
            <div class="visit-item">
                    <p><strong> Nama Pengunjung:</strong> {{ $k->nama_pengunjung }} </p>
                    <p><strong>Nama Instansi: </strong>{{ $k->nama_instansi }}</p> 
                    <p><strong>Jumlah Pengunjung: </strong>{{ $k->jumlah_pengunjung }}  </p>
                    <p><strong>Keperluan: </strong>{{ $k->keperluan }} </p>
                    <p><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($k->tanggal_kunjungan_instansi)->format('d-m-Y H:i') }}</p>
            </div>
            @endforeach
        </div>
    </div>
</div>
<div class="last-visit-wrapper">
    <h3>Kunjungan Terakhir Umum</h3>
    <div class="last-visit-marquee">
          <div class="last-visit-content">
            @foreach($kunjungan_terakhir_umum as $k)
                 <div class="visit-item">
                      <p><strong> Nama Pengunjung Umum: </strong>{{ $k->nama_pengunjung_umum }} </p>
                      <p><strong>Berkunjung sebagai:  </strong>{{ $k->berkunjung_sebagai }}</p>
                      <p><strong>Jumlah Pengunjung:  </strong>{{ $k->jumlah_pengunjung }} </p>
                      <p><strong>Keperluan: </strong> {{ $k->keperluan }} </p>
                      <p><strong>Tanggal:  </strong>{{ \Carbon\Carbon::parse($k->tanggal_kunjungan)->format('d-m-Y H:i') }}</p>
               </div>
            @endforeach
        </div>
    </div>
</div>
  @include('footer')

        
<script>
document.addEventListener("DOMContentLoaded", function() {
    let maxDuration = 0;

    document.querySelectorAll('.last-visit-content').forEach(el => {
        const textLength = el.scrollWidth;   // panjang isi
        const containerWidth = el.parentElement.offsetWidth; 
        const speed = 100; // pixel per detik

        const duration = (textLength + containerWidth) / speed;

        // cari yang paling lama (biar semua ikut)
        if(duration > maxDuration) {
            maxDuration = duration;
        }
    });

    // set semua durasi sama (pakai yang paling panjang)
    document.querySelectorAll('.last-visit-content').forEach(el => {
        el.style.animationDuration = maxDuration + "s";
    });
});
</script>


   
</body>
</html>