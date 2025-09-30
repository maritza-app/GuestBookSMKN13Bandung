<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu Digital</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
 <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSS Custom -->
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: #EACEB4;
            min-height: 100vh;
            margin: 0;
        }

        .logo13, .logobuku {
            max-width: 100%;
            height: auto;
        }

        .form-box {
            background: #e79e85;
            border-radius: 15px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .form-box h1 {
            color: #333;
            font-weight: 600;
            font-size: 1.5rem;
        }

        .form-box label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #333;
            text-align: left;
        }

        .form-box input[type="text"],
        .form-box input[type="number"],
        .form-box input[type="datetime-local"],
        .form-box textarea,
        .form-box select {
            width: 100%;
            padding: 12px;
            margin-bottom: 20px;
            border: 2px solid #ddd;
            border-radius: 8px;
            font-size: 16px;
            box-sizing: border-box;
        }

        .form-box textarea {
            min-height: 80px;
            resize: vertical;
        }

        .form-box button {
            background: #fff;
            color: #333;
            border: 2px solid #ddd;
            padding: 12px 20px;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
            font-weight: 600;
            transition: all 0.3s;
        }

        .form-box button:hover {
            background: #f8f9fa;
            border-color: #adb5bd;
        }

        #video, #photoPreview {
            max-width: 100%;
            height: auto;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        

        /* Responsive breakpoints */
        @media (max-width: 768px) {
            .container {
                padding: 10px;
            }

            .logo13, .logobuku {
                width: 80px !important;
                max-width: 80px;
            }
/* 
            .form-box {
                width: 95% !important;
                 margin-top: 30px !important; 
                padding: 20px !important;
            } */

            .form-box h1 {
                font-size: 1.2rem;
                line-height: 1.4;
            }

            .d-flex.justify-content-between {
                flex-direction: column;
                gap: 10px;
            }

            .d-flex.justify-content-between button {
                width: 100% !important;
            }

            #video {
                width: 100%;
                max-width: 300px;
            }

            .row .col-md-6 {
                margin-bottom: 15px;
            }
        }

        @media (max-width: 480px) {
            .logo13, .logobuku {
                width: 60px !important;
                max-width: 60px;
            }

            .form-box {
                margin-top: 10px !important;
                padding: 15px !important;
            }

            .form-box h1 {
                font-size: 1.1rem;
            }

            .form-box input[type="text"],
            .form-box input[type="number"],
            .form-box input[type="datetime-local"],
            .form-box textarea,
            .form-box select,
            .form-box button {
                font-size: 14px;
                padding: 10px;
            }

            #video {
                max-width: 250px;
            }

            .row .col-md-6 {
                margin-bottom: 10px;
            }

            #noPhoto {
                height: 150px !important;
            }
        }

        @media (min-width: 1200px) {
            .form-box {
                max-width: 800px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body>
<!-- Bungkus semua dengan flexbox untuk center -->
<div class="container text-center">

  <!-- Logo -->
  <div class="d-flex justify-content-between align-items-center flex-wrap">
    <img src="{{ asset('images/smk13.png') }}" alt="Logo" class="logo13" style="width:100px;">
    <img src="{{ asset('images/logobukutamu.png') }}" alt="Logo Buku" class="logobuku" style="width:120px;">
  </div>

  <!-- Form Box -->
  <div class="form-box mx-auto p-4" style="width:80%; max-width: 1000px; background:#e79e85; border-radius:15px; box-shadow:0 4px 12px rgba(0,0,0,0.1); margin-top:10px;">
    <h1 class="mb-4 text-center">FORM DATA KUNJUNGAN INSTANSI<br>SMKN 13 BANDUNG</h1>

    <form action="{{ route('tampil_pengunjung.storeInstansi') }}" method="POST" enctype="multipart/form-data" onsubmit="return prepareSnapshot()">
      @csrf
 <div class="mb-3">
            <label for="tanggal_kunjungan_instansi" class="form-label">Tanggal Kunjungan</label>
            <input type="datetime-local" name="tanggal_kunjungan_instansi" id="tanggal_kunjungan_instansi" class="form-control" readonly>
        </div>


       <label>Nama Pengunjung</label>
        <input type="text" name="nama_pengunjung" required>

         <label>Nama Instansi</label>
        <input type="text" name="nama_instansi" required>

    <label>Alamat Instansi</label>
        <textarea name="alamat_instansi" required></textarea>

        <label>Nomor Telepon Instansi/Pribadi</label>
        <input type="text" name="telepon_instansi_pengunjung" required>

      <label>Tujuan Kepada Guru/TU</label>
<div class="guru-container" style="display:flex; align-items:center; gap:10px;">
    <div class="guru-input-wrapper" style="position:relative; flex:1;">
        <input type="text" id="guruTuInput" placeholder="Ketik nama guru/TU" autocomplete="off" class="form-control">
        <ul id="guruTuDropdown" 
            style="display:none; position:absolute; top:100%; left:0; width:100%; background:#fff; 
                   border:1px solid #ccc; list-style:none; padding:0; margin:0; z-index:1000;"></ul>
    </div>

    <!-- Foto guru terpilih -->
    <img id="selectedGuruPhoto" class="selected-guru-photo" 
         alt="Foto Guru Terpilih"
         style="display:none; width:50px; height:50px; border-radius:50%; object-fit:cover;">
</div>

<input type="hidden" name="tujuan_kepada_guru_tu" id="guruTuHidden" required>

        <label>Keperluan</label>
        <textarea name="keperluan" required></textarea>

         <label>Jumlah Pengunjung</label>
        <input type="number" name="jumlah_pengunjung" required>

      <!-- Kamera -->
      <div class="mb-3 text-start">
    <label>Foto
        <button 
            type="button" 
            class="btn btn-custom mb-2 d-inline-block w-auto" 
            onclick="takeSnapshot()">
            📸 Ambil Foto
        </button>
    </label>
</div>

        <!-- Camera Layout: Kiri Video, Kanan Foto -->
      <div class="row justify-content-center">
  <!-- Preview Kamera -->
  <div class="col-md-6 col-12 text-center mb-3">
    <p><strong>Preview Kamera</strong></p>
    <div class="photo-box" >
      <video id="video" style=" width:200px; height:200px;" autoplay playsinline muted></video>
    </div>
  </div>
          
          <!-- Preview hasil foto di kanan -->
   <!-- Hasil Foto -->
  <div class="col-md-6 col-12 text-center mb-3">
    <p><strong>Hasil</strong></p>
    <div class="photo-box">   <!-- Wadah fix -->
        <img id="photoPreview" style="display:none; width:200px; height:200px;" />
        <div id="noPhoto">Foto belum diambil</div>
    </div>
  </div>
</div>
        
        <canvas id="canvas" style="display:none;"></canvas>
        <input type="hidden" name="foto_base64" id="foto_base64">
      

      <div class="d-flex justify-content-between mt-4">
    <button type="button" class="btn-custom btn-back" onclick="history.back()">
        🔙 Kembali
    </button>
    <button type="submit" class="btn-custom btn-submit">
        ✅ Submit
    </button>
</div>

  
    </form>
    
  </div>
</div>

<!-- Footer placeholder -->
<div style="height: 50px;"></div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0');
        const day = String(now.getDate()).padStart(2, '0');
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const formatted = `${year}-${month}-${day}T${hours}:${minutes}`;
        document.getElementById('tanggal_kunjungan_instansi').value = formatted;
    });
    // Data dummy guru/TU (replace with actual data dari backend Laravel)
    const guruTus = @json($guruTus->map(function($guru) {
        return [
            'id' => $guru->id_guru_tu,
            'nama' => $guru->nama_guru_tu,
            'foto' => $guru->foto
                ? asset('../imgguru_tu/' . $guru->foto) 
                : null
        ];
    }));

    const input = document.getElementById('guruTuInput');
    const dropdown = document.getElementById('guruTuDropdown');
    const hiddenInput = document.getElementById('guruTuHidden');
    const selectedPhoto = document.getElementById('selectedGuruPhoto');

    // 🔍 Cari guru berdasarkan ketikan
    input.addEventListener('input', function() {
        const keyword = input.value.toLowerCase();
        dropdown.innerHTML = '';
        if (keyword.length === 0) {
            dropdown.style.display = 'none';
            return;
        }

        const filtered = guruTus.filter(g => g.nama.toLowerCase().includes(keyword));
        if (filtered.length === 0) {
            dropdown.style.display = 'none';
            return;
        }

        filtered.forEach(guru => {
            const li = document.createElement('li');
            li.classList.add("dropdown-item");

            // Nama guru
            const spanNama = document.createElement('span');
            spanNama.textContent = guru.nama;

            // Foto guru kecil di list
            const imgFoto = document.createElement('img');
            imgFoto.src = guru.foto;
            imgFoto.alt = guru.nama;
            imgFoto.style.width = "50px";
            imgFoto.style.height = "50px";
            imgFoto.style.borderRadius = "10px";
            imgFoto.style.marginLeft = "8px";

            li.appendChild(spanNama);
            li.appendChild(imgFoto);

            li.onclick = function() {
                input.value = guru.nama;
                hiddenInput.value = guru.id;

                // ✅ Tampilkan foto guru yang dipilih di pojok kanan
                selectedPhoto.src = guru.foto;
                selectedPhoto.alt = guru.nama;
                selectedPhoto.style.display = 'block';
                

                  // 🔧 Atur jadi kotak dengan sudut tumpul
    selectedPhoto.style.width = "60px";        // ukuran bebas
    selectedPhoto.style.height = "60px";
    selectedPhoto.style.borderRadius = "12px"; // sudut tumpul (bisa 8px, 12px, 15px sesuai selera)
    selectedPhoto.style.objectFit = "cover";   // biar fotonya rapi, nggak ketarik

    dropdown.innerHTML = '';
    dropdown.style.display = 'none';
            };
            dropdown.appendChild(li);
        });
        dropdown.style.display = 'block';
    });

    // Klik di luar untuk menutup dropdown
    document.addEventListener('click', function(e) {
        if (!input.contains(e.target) && !dropdown.contains(e.target)) {
            dropdown.style.display = 'none';
        }
    });

    // Bersihkan foto jika input kosong
    input.addEventListener('input', function() {
        if (input.value === '') {
            selectedPhoto.style.display = 'none';
            hiddenInput.value = '';
        }
    });

    // ================= CAMERA =================
    const video = document.getElementById('video');
  const canvas = document.getElementById('canvas');
  const fotoInput = document.getElementById('foto_base64');
  const photoPreview = document.getElementById('photoPreview');

  // Akses kamera
  navigator.mediaDevices.getUserMedia({ video: true })
    .then(stream => { 
      video.srcObject = stream; 
    })
    .catch(err => { 
      alert("Gagal mengakses kamera: " + err.message); 
    });

  // Ambil foto dari kamera
  function takeSnapshot() {
    const context = canvas.getContext('2d');
    canvas.width = video.videoWidth;
    canvas.height = video.videoHeight;
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    const imageData = canvas.toDataURL('image/jpeg');
    fotoInput.value = imageData;

    // Tampilkan preview foto dan sembunyikan placeholder
    photoPreview.src = imageData;
    photoPreview.style.display = 'block';
    document.getElementById('noPhoto').style.display = 'none';
  }

  // Cek sebelum submit
  function prepareSnapshot() {
    if (!fotoInput.value) {
      alert("Silakan ambil foto terlebih dahulu.");
      return false;
    }
    return true;
  }
 

    

</script>


</body>
</html>