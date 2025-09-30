<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data guru_tu - SMKN 13 Bandung</title>
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
                <h2>Edit Data Guru / TU</h2>
                
                <form action="{{ route('guru_tu.update', $guru_tu->id_guru_tu) }}" 
                      method="POST" enctype="multipart/form-data" 
                      class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadguru_tu-md mt-10">
                    @csrf
                    @method('PUT')
<div class="mb-3">
    <label for="nip" class="form-label">NIP</label>
    <input type="text" id="nip" name="nip" class="form-control" required value="{{ $guru_tu->nip }}">
</div>

                    <div class="mb-3">
    <label for="nama_guru_tu" class="form-label">Nama Guru TU</label>
    <input type="text" id="nama_guru_tu" name="nama_guru_tu" class="form-control" required value="{{ $guru_tu->nama_guru_tu }}">
</div>

<div class="mb-3">
    <label for="jk" class="form-label">Jenis Kelamin</label>
    <select id="jk" name="jk" class="form-select" required>
        <option value="Laki-laki" {{ $guru_tu->jk == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
        <option value="Perempuan" {{ $guru_tu->jk == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
    </select>
</div>

                 <div class="mb-3">
    <label for="alamat" class="form-label">Alamat</label>
    <textarea id="alamat" name="alamat" class="form-control" required>{{ $guru_tu->alamat }}</textarea>
</div>

                  <div class="mb-3">
    <label for="telepon" class="form-label">Telepon</label>
    <input type="text" id="telepon" name="telepon" class="form-control" required value="{{ $guru_tu->telepon }}">
</div>


                  <div class="mb-3">
    <label for="deskripsi" class="form-label">Deskripsi</label>
    <textarea id="deskripsi" name="deskripsi" class="form-control">{{ $guru_tu->deskripsi }}</textarea>
</div>
                    <!-- Foto (readonly) -->
                    <div class="mb-3">
                        <label class="form-label">Foto</label><br>
                        @if($guru_tu->foto)
                            <img src="{{ asset('imgguru_tu/'.$guru_tu->foto) }}" 
                                 alt="Foto guru_tu" width="150" class="rounded shadguru_tu-sm">
                        @else
                            <p class="text-muted">Tidak ada foto</p>
                        @endif
                        <input type="hidden" name="foto" value="{{ $guru_tu->foto }}">
                    </div>

                    <!-- Tombol -->
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('guru_tu.index') }}" class="btn btn-secondary">Kembali</a>
                </form>
     @include('footer')
            </main>
        </div>
    </div>
</div>
</body>
</html>
