<!-- filepath: c:\xampp\htdocs\buku_tamu\buku_tamu\resources\views\dokumentasi\edit.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Dokumentasi Kunjungan - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="{{ asset('js/script.js') }}"></script>
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
      <div class="form-container">
                <h2>Edit Data Dokumentasi Kunjungan</h2>
                <br>

                <form action="{{ route('dokumentasi.update', $dokumentasi->id_dokumentasi) }}" 
                      method="POST" enctype="multipart/form-data" 
                      class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-md mt-10">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="tanggal_kunjungan" class="form-label">Tanggal Kunjungan</label>
                        <input type="datetime-local" id="tanggal_kunjungan" name="tanggal_kunjungan" class="form-control" required 
                            value="{{ \Carbon\Carbon::parse($dokumentasi->tanggal_kunjungan)->format('Y-m-d\TH:i') }}">
                    </div>

                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" id="nama_kegiatan" name="nama_kegiatan" class="form-control" required value="{{ $dokumentasi->nama_kegiatan }}">
                    </div>

                    <div class="mb-3">
                        <label for="kategori_tamu" class="form-label">Kategori Tamu</label>
                        <select id="kategori_tamu" name="kategori_tamu" class="form-select" required>
                            <option value="Instansi" {{ $dokumentasi->kategori_tamu == 'Instansi' ? 'selected' : '' }}>Instansi</option>
                            <option value="Sekolah" {{ $dokumentasi->kategori_tamu == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
                            <option value="Lainnya" {{ $dokumentasi->kategori_tamu == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_tamu" class="form-label">Keterangan Tamu</label>
                        <input type="text" id="keterangan_tamu" name="keterangan_tamu" class="form-control" required value="{{ $dokumentasi->keterangan_tamu }}">
                    </div>

                    <div class="mb-3">
                        <label for="keterangan_kegiatan" class="form-label">Keterangan Kegiatan</label>
                        <textarea id="keterangan_kegiatan" name="keterangan_kegiatan" class="form-control" required>{{ $dokumentasi->keterangan_kegiatan }}</textarea>
                    </div>

                    <!-- Dokumentasi (Foto) -->
                    <div class="mb-3">
                        <label class="form-label">Dokumentasi (Foto)</label>
                        @if($dokumentasi->dokumentasi)
                            <img src="{{ asset('imgdokumentasi/'.$dokumentasi->dokumentasi) }}" 
                                 alt="Dokumentasi" width="150" class="rounded shadow-sm mb-2">
                        @else
                            <p class="text-muted">Tidak ada foto</p>
                        @endif
                        <input type="file" name="dokumentasi" class="form-control">
                        <input type="hidden" name="old_dokumentasi" value="{{ $dokumentasi->dokumentasi }}">
                    </div>

                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
                    @include('footer')
        </main>
</body>
</html>