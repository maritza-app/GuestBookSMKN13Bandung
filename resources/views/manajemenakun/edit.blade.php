<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Instansi - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <!-- Select2 -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
       <script src="{{ asset('js/script.js') }}"></script>
      
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
      <div class="form-container">
                <h2>Edit Data Akun</h2>
                <br>

                <form action="{{ route('manajemenakun.update', $manajemenakun->id) }}" 
                      method="POST" enctype="multipart/form-data" 
                      class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadinstansi-md mt-10">
                    @csrf
                    @method('PUT')
                   <div class="mb-3">
    <label for="name" class="form-label">Nama Akun</label>
    <input id="name" name="name" class="form-control" value="{{ $manajemenakun->name }}" required></input>
</div>


                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" id="email" name="email" class="form-control"value="{{ $manajemenakun->email }}" required></input>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
 <input type="password" id="password" name="password" class="form-control"value="{{ $manajemenakun->password }}" required></input>
                    </div>
                  
                    <!-- Tombol -->
                    <button type="submit" class="btn btn-success">Update</button>
                    <a href="{{ route('manajemenakun.index') }}" class="btn btn-secondary">Kembali</a>
                </form>

            
      @include('footer')
            </main>
        </div>
    </div>
</div>
</body>
</html>