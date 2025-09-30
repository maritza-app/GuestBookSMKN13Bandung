<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- CSS Select2 harus di-load di head -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- JS jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       <script src="{{ asset('js/script.js') }}"></script>
        <style>
        /* === FORM STYLE === */
        .container {
          background: #E79E85;
          padding: 25px;
          border-radius: 12px;
          box-shadow: 0 4px 8px rgba(0,0,0,0.08);
          max-width: 700px;
          margin: 20px auto;
        }

        h1 {
          font-size: 30px;
          margin-bottom: 20px;
          text-align: center;
          color: #333;
        }

        form label {
          display: block;
          font-weight: 600;
          margin-bottom: 6px;
          color: #444;
        }

        form input[type="text"],
        form input[type="datetime-local"],
        form input[type="file"],
        form input[type="number"],
        form textarea,
        form select {
          width: 100%;
          padding: 10px 12px;
          margin-bottom: 15px;
          border: 1px solid #ccc;
          border-radius: 8px;
          font-size: 14px;
          transition: border-color 0.2s, box-shadow 0.2s;
        }

        form input:focus,
        form textarea:focus,
        form select:focus {
          border-color: rgba(187, 90, 90);
          box-shadow: 0 0 0 2px rgba(187, 90, 90);
          outline: none;
        }

        form textarea {
          resize: vertical;
          min-height: 80px;
        }

        form button,
        form a.btn {
          display: inline-block;
          padding: 7px 20px;
          margin-right: 10px;
          font-size: 14px;
          border-radius: 8px;
          text-decoration: none;
          margin-top: 10px;
          cursor: pointer;
          transition: 0.2s;
        }

        form .btn-primary {
          background:rgba(187, 90, 90);
          color: #fff;
          border: none;
        }
        form .btn-primary:hover {
          background: rgb(96, 46, 46);
        }

        form .btn-secondary {
          background:rgba(187, 90, 90);
          color: #fff;
          border: none;
        }
        form .btn-secondary:hover {
          background: rgb(96, 46, 46);
        }
    </style>
</head>
<body>
 <nav class="navbar">
        @include('navbar')
    </nav>

    <!-- Layout Container -->
    <div class="layout-container">
        <!-- Sidebar -->
        <aside class="sidebar" id="sidebar">
           @include('sidebar')
        </aside>

            {{-- Main Content --}}
               <main class="main-content">
                <div class="container">
                    <h1>Form Tambah Data Kunjungan Instansi</h1>
                 <form action="{{ route('instansi.store') }}" method="POST" enctype="multipart/form-data">

                        @csrf
                         <div class="mb-3">
                            <label for="tanggal_kunjungan_instansi">Tanggal Kunjungan</label>
                            <input type="datetime-local" name="tanggal_kunjungan_instansi" id="tanggal_kunjungan_instansi" readonly>
                        </div>

                        <!-- Nama Pengunjung -->
                        <div class="mb-3">
                            <label for="nama_pengunjung" class="form-label">Nama Pengunjung</label>
                            <input type="text" name="nama_pengunjung" id="nama_pengunjung" class="form-control" required>
                        </div>

                        <!-- Nama Instansi -->
                        <div class="mb-3">
                            <label for="nama_instansi" class="form-label">Nama Instansi</label>
                            <input type="text" name="nama_instansi" id="nama_instansi" class="form-control" required>
                        </div>

                        <!-- Alamat Instansi -->
                        <label for="alamat_instansi">Alamat Instansi</label>
                        <textarea name="alamat_instansi" id="alamat_instansi" required></textarea>
<br>
                        <!-- Telepon Instansi -->
                        <label for="telepon_instansi_pengunjung">Telepon Instansi</label>
                        <input type="text" name="telepon_instansi_pengunjung" id="telepon_instansi_pengunjung" required>
<br>
                        <!-- Tujuan Kepada Guru/TU -->
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

                        <!-- Keperluan -->
                        <label for="keperluan">Keperluan</label>
                        <textarea name="keperluan" id="keperluan" required></textarea>
<br>
                        <!-- Jumlah Pengunjung -->
                        <div class="mb-3">
                            <label for="jumlah_pengunjung" class="form-label">Jumlah Pengunjung</label>
                            <input type="number" name="jumlah_pengunjung" id="jumlah_pengunjung" class="form-control" required>
                        </div>

                        <!-- Foto -->
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" required>
                             <p>maximal ukuran foto 2Mb</p>
                        </div>
<br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('instansi.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                </div>
                  @include('footer')
            </main>
        </div>
    </div>
  
</div>

<script>
     const guru_tu = @json($guru_tu->map(function($guru) {
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

        const filtered = guru_tu.filter(g => g.nama.toLowerCase().includes(keyword));
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
$(document).ready(function() {
    // Tanggal kunjungan auto isi
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    $('#tanggal_kunjungan_instansi').val(`${year}-${month}-${day}T${hours}:${minutes}`);})
</script>
</body>
</html>