<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Data Ortu / Wali</title>
  <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Internal CSS -->
  <style>
    /* Style container form */
    .form-container {
      max-width: 800px;
      margin: 30px auto;
      background: #E79E85;
      padding: 25px;
      border-radius: 10px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }

    .form-container h2 {
      text-align: center;
      margin-bottom: 20px;
      color: #333;
    }

    /* Label */
    .form-label {
      font-weight: bold;
      margin-bottom: 6px;
      display: block;
      color: #444;
    }

    /* Input, select, textarea */
    .form-control,
    .form-select {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 6px;
      font-size: 14px;
      transition: border-color 0.2s;
    }

    .form-control:focus,
    .form-select:focus {
      border-color: #007bff;
      outline: none;
    }

    textarea.form-control {
      resize: vertical;
      min-height: 70px;
    }

    /* Foto */
    .foto-preview {
      margin: 10px 0;
    }

    .foto-preview img {
      border-radius: 6px;
      border: 1px solid #ddd;
    }

    /* Tombol */
    .btn {
      display: inline-block;
      padding: 8px 18px;
      font-size: 14px;
      border-radius: 6px;
      text-decoration: none;
      margin-right: 8px;
      cursor: pointer;
      transition: background 0.2s;
      border: none;
    }

    .btn-success {
      background: #28a745;
      color: white;
    }

    .btn-success:hover {
      background: #218838;
    }

    .btn-secondary {
      background: #6c757d;
      color: white;
    }

    .btn-secondary:hover {
      background: #5a6268;
    }
  </style>
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar">
    @include('navbar')
  </nav>

  <!-- Layout -->
  <div class="layout-container">
    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
      @include('sidebar')
    </aside>

    <!-- Main Content -->
    <main class="main-content">
      <div class="form-container">
        <h2>Edit Data Ortu / Wali</h2>

        <form action="{{ route('ortu_wali.update', $ow->id_kunjungan_ow) }}" method="POST" enctype="multipart/form-data">
          @csrf
          @method('PUT')

          <!-- Pilih Siswa -->
          <label for="id_siswa" class="form-label">Pilih Siswa</label>
          <select name="id_siswa" id="id_siswa" class="form-select">
            <option value="">-- Pilih Siswa --</option>
            @foreach($siswa as $s)
              <option value="{{ $s->id_siswa }}" {{ $ow->id_siswa == $s->id_siswa ? 'selected' : '' }}>
                {{ $s->nama_siswa }}
              </option>
            @endforeach
          </select>

          <!-- Nama Ortu/Wali -->
          <label for="nama_ortu_wali" class="form-label">Nama Ortu / Wali</label>
          <textarea id="nama_ortu_wali" name="nama_ortu_wali" class="form-control" readonly>{{ $ow->nama_ortu_wali }}</textarea>

          <!-- Alamat Ortu/Wali -->
          <label for="alamat_ortu_wali" class="form-label">Alamat Ortu / Wali</label>
          <textarea id="alamat_ortu_wali" name="alamat_ortu_wali" class="form-control" readonly>{{ $ow->alamat_ortu_wali }}</textarea>

          <!-- Telepon Ortu/Wali -->
          <label for="telepon_ortu_wali" class="form-label">Telepon Ortu / Wali</label>
          <input type="text" id="telepon_ortu_wali" name="telepon_ortu_wali" class="form-control" value="{{ $ow->telepon_ortu_wali }}" readonly>

          <!-- Tujuan Guru/TU -->
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
          <label for="keperluan" class="form-label">Keperluan</label>
          <textarea id="keperluan" name="keperluan" class="form-control">{{ $ow->keperluan }}</textarea>

          <!-- Foto -->
          <label class="form-label">Foto</label>
          <div class="foto-preview">
            @if($ow->foto)
              <img src="{{ asset('imgow/'.$ow->foto) }}" alt="Foto Ortu/Wali" width="150">
            @else
              <p class="text-muted">Tidak ada foto</p>
            @endif
          </div>
          <input type="hidden" name="foto" value="{{ $ow->foto }}">

          <!-- Tombol -->
          <button type="submit" class="btn btn-success">Update</button>
          <a href="{{ route('ortu_wali.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
      </div>
    </main>
  </div>

  @include('footer')

  <!-- Script -->
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
    $(document).ready(function () {
      $('#id_siswa').on('change', function () {
        var id_siswa = $(this).val();
        if (id_siswa) {
          $.ajax({
            url: '/get-siswa/' + id_siswa,
            type: 'GET',
            success: function (data) {
              $('#nama_ortu_wali').val(data.nama_ortu_wali ?? '');
              $('#alamat_ortu_wali').val(data.alamat_ortu_wali ?? '');
              $('#telepon_ortu_wali').val(data.telepon_ortu_wali ?? '');
            },
            error: function () {
              alert('Data siswa tidak ditemukan');
            }
          });
        }
      });
    });
  </script>
</body>
</html>
