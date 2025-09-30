<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Guru/TU - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <!-- CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- JS jQuery & Select2 -->
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

        form input:focus,C
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

        <!-- Main Content -->
        <main class="main-content">
                <div class="container">
                    <h1>Form Tambah Data Guru/TU</h1>
                    <form action="{{ route('guru_tu.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- NIP -->
                        <div class="mb-3">
                            <label for="nip">NIP</label>
                            <input type="text" name="nip" id="nip" class="form-control" required>
                        </div>

                        <!-- Nama Guru/TU -->
                        <div class="mb-3">
                            <label for="nama_guru_tu">Nama Guru/TU</label>
                            <input type="text" name="nama_guru_tu" id="nama_guru_tu" class="form-control" required>
                        </div>

                        <!-- Jenis Kelamin -->
                        <div class="mb-3">
                            <label for="jk">Jenis Kelamin</label>
                            <select name="jk" id="jk" class="form-select" required>
                                <option value="">-- pilih --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <!-- Alamat -->
                        <div class="mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea name="alamat" id="alamat" class="form-control" required></textarea>
                        </div>

                        <!-- Telepon -->
                        <div class="mb-3">
                            <label for="telepon">Telepon</label>
                            <input type="text" name="telepon" id="telepon" class="form-control" required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control"></textarea>
                        </div>
   <div class="mb-3">
                            <label for="foto" class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                            <p>maximal ukuran foto 2Mb</p>
                        </div>
                    
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('guru_tu.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                        @include('footer')
                </div>
            </main>
        </div>
    </div>

</div>
</body>
</html>