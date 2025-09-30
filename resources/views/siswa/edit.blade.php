<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Siswa - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                <h2>Edit Data Siswa</h2>

                <form action="{{ route('siswa.update', $siswa->id_siswa) }}" 
                      method="POST" enctype="multipart/form-data" 
                      class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadsiswa-md mt-10">
                    @csrf
                    @method('PUT')

    <div class="mb-3">
    <label for="nis" class="form-label">NIS</label>
    <input type="text" id="nis" name="nis" class="form-control" required value="{{ $siswa->nis }}">
</div>

<div class="mb-3">
    <label for="nama_siswa" class="form-label">Nama Siswa</label>
    <input type="text" id="nama_siswa" name="nama_siswa" class="form-control" required value="{{ $siswa->nama_siswa }}">
</div>



                   <div class="mb-3">
    <label for="alamat_siswa" class="form-label">Alamat Siswa</label>
    <textarea id="alamat_siswa" name="alamat_siswa" class="form-control" required>{{ $siswa->alamat_siswa }}</textarea>
</div>

                   <div class="mb-3">
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select id="jk" name="jk" class="form-select" required>
        <option value="Laki-laki" {{ $siswa->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $siswa->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>


                   <div class="mb-3">
    <label for="kelas" class="form-label">Kelas</label>
    <input type="text" id="kelas" name="kelas" class="form-control" required value="{{ $siswa->kelas }}">
</div>

                                     <div class="mb-3">
    <label for="jurusan" class="form-label">Jurusan</label>
    <select id="jurusan" name="jurusan" class="form-select" required>
        <option value="Analis Kimia" {{ $siswa->jurusan == 'Analis Kimia' ? 'selected' : '' }}>Analis Kimia</option>
        <option value="Teknik Komputer Jaringan" {{ $siswa->jurusan == 'Teknik Komputer Jaringan' ? 'selected' : '' }}>Teknik Komputer Jaringan</option>
          <option value="Rekayasa Perangkat Lunak" {{ $siswa->jurusan == 'Rekayasa Perangkat Lunak' ? 'selected' : '' }}>Rekayasa Perangkat Lunak</option>
    </select>
</div>

                   <div class="mb-3">
    <label for="telepon_siswa" class="form-label">Telepon Siswa</label>
    <input type="number" id="telepon_siswa" name="telepon_siswa" class="form-control" required value="{{ $siswa->telepon_siswa }}">
</div>
<div class="mb-3">
    <label for="nama_ayah" class="form-label">Nama Ayah</label>
    <input type="text" id="nama_ayah" name="nama_ayah" class="form-control" required value="{{ $siswa->nama_ayah }}">
</div>

<div class="mb-3">
    <label for="nama_ibu" class="form-label">Nama Ibu</label>
    <input type="text" id="nama_ibu" name="nama_ibu" class="form-control" required value="{{ $siswa->nama_ibu }}">
</div>
<div class="mb-3">
    <label for="nama_wali" class="form-label">Nama Wali</label>
    <input type="text" id="nama_wali" name="nama_wali" class="form-control" value="{{ $siswa->nama_wali }}">
</div>

<div class="mb-3">
    <label for="alamat_ortu_wali" class="form-label">Alamat Orang Tua / Wali</label>
    <textarea id="alamat_ortu_wali" name="alamat_ortu_wali" class="form-control">{{ $siswa->alamat_ortu_wali }}</textarea>
</div>

<div class="mb-3">
    <label for="telepon_ortu_wali" class="form-label">Telepon Orang Tua / Wali</label>
    <input type="text" id="telepon_ortu_wali" name="telepon_ortu_wali" class="form-control" value="{{ $siswa->telepon_ortu_wali}}">
</div>


                    <!-- Tombol -->
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('siswa.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

    @include('footer')
            </main>
        </div>
    </div>
</div>
</body>
</html>
