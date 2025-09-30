<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Siswa - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <!-- CSS Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- JS jQuery & Select2 -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                    
                    <h1>Form Tambah Data Siswa</h1>
                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- NIS -->
                        <div class="mb-3">
                            <label for="nis">NIS</label>
                            <input type="text" name="nis" id="nis" class="form-control" required>
                        </div>

                        <!-- Nama Siswa -->
                        <div class="mb-3">
                            <label for="nama_siswa">Nama Siswa</label>
                            <input type="text" name="nama_siswa" id="nama_siswa" class="form-control" required>
                        </div>

                        <!-- Alamat Siswa -->
                        <div class="mb-3">
                            <label for="alamat_siswa">Alamat Siswa</label>
                            <textarea name="alamat_siswa" id="alamat_siswa" class="form-control" required></textarea>
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

                        <!-- Kelas -->
                        <div class="mb-3">
                            <label for="kelas">Kelas</label>
                            <input type="text" name="kelas" id="kelas" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="jurusan">Jurusan</label>
                            <select name="jurusan" id="jurusan" class="form-select" required>
                                <option value="">-- pilih --</option>
                                <option value="Analis Kimia">Analis Kimia</option>
                                <option value="Teknik Komputer Jaringan">Teknik Komputer Jaringan</option>
                                  <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                            </select>
                        </div>

                        <!-- Telepon Siswa -->
                        <div class="mb-3">
                            <label for="telepon_siswa">Telepon Siswa</label>
                            <input type="text" name="telepon_siswa" id="telepon_siswa" class="form-control" required>
                        </div>

                        <!-- Nama Ayah -->
                        <div class="mb-3">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" name="nama_ayah" id="nama_ayah" class="form-control">
                        </div>

                        <!-- Nama Ibu -->
                        <div class="mb-3">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" name="nama_ibu" id="nama_ibu" class="form-control">
                        </div>

                        <!-- Nama Wali -->
                        <div class="mb-3">
                            <label for="nama_wali">Nama Wali</label>
                            <input type="text" name="nama_wali" id="nama_wali" class="form-control">
                        </div>

                        <!-- Alamat Ortu/Wali -->
                        <div class="mb-3">
                            <label for="alamat_ortu_wali">Alamat Ortu/Wali</label>
                            <textarea name="alamat_ortu_wali" id="alamat_ortu_wali" class="form-control"></textarea>
                        </div>

                        <!-- Telepon Ortu/Wali -->
                        <div class="mb-3">
                            <label for="telepon_ortu_wali">Telepon Ortu/Wali</label>
                            <input type="text" name="telepon_ortu_wali" id="telepon_ortu_wali" class="form-control">
                        </div>

                        <br>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                    </form>
                      @include('footer')
                </div>
            </main>
        </div>
    </div>

</div>
</body>
</html>