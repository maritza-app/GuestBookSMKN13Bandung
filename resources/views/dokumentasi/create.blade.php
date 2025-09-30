<!-- filepath: c:\xampp\htdocs\buku_tamu\buku_tamu\resources\views\dokumentasi\create.blade.php -->
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dokumentasi Kunjungan - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
      <script src="{{ asset('js/script.js') }}"></script>
       <style>
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
<div class="main-container">
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
                <div class="container">
                    <h1>Form Tambah Data Dokumentasi Kunjungan</h1>
                    <form action="{{ route('dokumentasi.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Tanggal Kunjungan -->
                        <div class="mb-3">
                            <label for="tanggal_kunjungan">Tanggal Kunjungan</label>
                            <input type="datetime-local" name="tanggal_kunjungan" id="tanggal_kunjungan" class="form-control" required>
                        </div>

                        <!-- Nama Kegiatan -->
                        <div class="mb-3">
                            <label for="nama_kegiatan">Nama Kegiatan</label>
                            <input type="text" name="nama_kegiatan" id="nama_kegiatan" class="form-control" required>
                        </div>

                        <!-- Kategori Tamu -->
                        <div class="mb-3">
                            <label for="kategori_tamu">Kategori Tamu</label>
                            <select name="kategori_tamu" id="kategori_tamu" class="form-select" required>
                                <option value="">-- pilih --</option>
                                <option value="Instansi">Instansi</option>
                                <option value="Sekolah">Sekolah</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                        </div>

                        <!-- Keterangan Tamu -->
                        <div class="mb-3">
                            <label for="keterangan_tamu">Keterangan Tamu</label>
                            <input type="text" name="keterangan_tamu" id="keterangan_tamu" class="form-control" required>
                        </div>

                        <!-- Keterangan Kegiatan -->
                        <div class="mb-3">
                            <label for="keterangan_kegiatan">Keterangan Kegiatan</label>
                            <textarea name="keterangan_kegiatan" id="keterangan_kegiatan" class="form-control" required></textarea>
                        </div>

                        <!-- Dokumentasi (Foto) -->
                        <div class="mb-3">
                            <label for="dokumentasi" class="form-label">Dokumentasi (Foto)</label>
                            <input type="file" name="dokumentasi" class="form-control" required>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('dokumentasi.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                    @include('footer')
                </div>
            </main>
        </div>
    </div>
</div>
</body>
<script>
  $(document).ready(function() {
    // Tanggal kunjungan auto isi
    const now = new Date();
    const year = now.getFullYear();
    const month = String(now.getMonth() + 1).padStart(2, '0');
    const day = String(now.getDate()).padStart(2, '0');
    const hours = String(now.getHours()).padStart(2, '0');
    const minutes = String(now.getMinutes()).padStart(2, '0');
    $('#tanggal_kunjungan').val(`${year}-${month}-${day}T${hours}:${minutes}`);})
  </script>
</html>