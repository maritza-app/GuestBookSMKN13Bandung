<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kunjungan Orang Tua/Wali</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
     <script src="{{ asset('js/script.js') }}"></script>
     <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

    <style>
        
        /* Layout dasar */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* .layout-container {
            display: flex;
        } */

       .sidebar {
  width: 250px;
  background: #fff;
  position: fixed;
  top: 0;
  left: -250px; /* tersembunyi dulu */
  height: 100%;
  transition: 0.3s;
  z-index: 1000;
}

.sidebar.active {
  left: 0; /* muncul */
}

/* biar konten geser kalau sidebar aktif */
.layout-container {
  margin-left: 0;
  transition: 0.3s;
}
.sidebar.active ~ .main-content {
  margin-left: 250px;
}
/* Wrapper table */

/* Table style */
.action-btns {
    display: flex;
    flex-direction: column; /* tetap atas-bawah */
    gap: 5px;
    align-items: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 8px rgba(0,0,0,0.1);
}
thead {
    background: #f2f2f2;   /* abu muda, bisa diganti #fff kalau mau putih polos */
    color: #333;           /* teks abu gelap biar jelas terbaca */
    text-align: center;    /* semua teks di tengah */
}
thead th {
    padding: 12px;
    font-size: 14px;
    font-weight: 600;
    text-align: center;    /* pastikan kolom juga rata tengah */
}

tbody td {
    padding: 10px;
    font-size: 13px;
    text-align: center;
}
tbody tr:nth-child(even) {
    background: #f9f9f9;
}
tbody tr:hover {
    background: #ffe3e3;
    transition: 0.2s;
}
td img {
    border-radius: 8px;
    width: 70px;
    height: 70px;
    object-fit: cover;
}

/* Tombol style */
.btn {
    border: none;
    padding: 6px 12px;
    border-radius: 6px;
    font-size: 13px;
    cursor: pointer;
    transition: 0.2s;
}
.btn-warning {
    background: #f0ad4e;
    color: white;
}
.btn-warning:hover {
    background: #ec971f;
}
.btn-danger {
    background: #d9534f;
    color: white;
}
.btn-danger:hover {
    background: #c9302c;
}
.btn-primary {
    background: #c94f4f;
    color: white;
}
.btn-primary:hover {
    background: #a83232;
}
/* Tombol Tambah Data */
.btn-add {
    background: linear-gradient(45deg, #BB5A5A, #d65f5f);
    color: #fff;
    padding: 10px 18px;
    border-radius: 30px;
    text-decoration: none;
    font-weight: bold;
    font-size: 14px;
    display: inline-block;
    transition: all 0.3s ease;
    box-shadow: 0 3px 6px rgba(0,0,0,0.2);
}
.btn-add:hover {
    background: linear-gradient(45deg, #BB5A5A, #d65f5f);
    transform: translateY(-2px);
}

/* Grup tombol di tabel */
.action-btns {
    display: flex;
    flex-direction: column;
    gap: 6px;
    align-items: center;
}

/* Tombol Edit */
.btn-edit,
.btn-delete {
    padding: 5px 10px;
    font-size: 12px;       /* biar ga kebesaran */
    border-radius: 20px;   /* tombol oval */
    min-width: 65px;       /* lebar minimal */
    text-align: center;
}

.btn-edit {
    background: #ffb84d;
    color: #fff;
    padding: 10px 24px;   /* diperbesar */
    border-radius: 25px;
    font-size: 14px;      /* diperbesar */
    text-decoration: none;
    transition: 0.3s ease;
    font-weight: 600;
    display: inline-block; /* biar tetap sejajar */
    margin: 5px;          /* jarak antar tombol */
    white-space: nowrap;  /* biar teks ga turun ke bawah */
}
.btn-edit:hover {
    background: #e69500;
    transform: scale(1.08);
}


/* Tombol Delete */
.btn-delete {
    background: #ff4d4d;
    color: #fff;
    padding: 10px 24px;   /* lebih besar */
    border-radius: 25px;
    font-size: 14px;
    font-weight: 600;
    border: none;
    cursor: pointer;
    transition: 0.3s ease;
    display: inline-block;
    margin: 5px;
    white-space: nowrap;
}
.btn-delete:hover {
    background: #cc0000;
    transform: scale(1.08);
}

        /* Tombol menu (hamburger) */
        .menu-toggle {
            display: none;
            font-size: 24px;
            cursor: pointer;
            background: none;
            border: none;
            color: #343a40;
            margin: 10px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                left: 0;
                top: 0;
                height: 100%;
                transform: translateX(-100%);
                z-index: 1000;
            }

            .sidebar.active {
                transform: translateX(0);
            }

            .menu-toggle {
                display: block;
            }

            .layout-container {
                flex-direction: column;
            }

            .main-content {
                margin-top: 10px;
            }
        }

    
    </style>
</head>
<body>
    <!-- Navbar -->
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
            <div class="d-flex justify-content-between align-items-center mb-3 flex-wrap">
                <center><h2 class="m-0" style="color: #a83232">Data Kunjungan Orang Tua / Wali</h2></center>
                <a href="{{ route('ortu_wali.create') }}" class="btn-add mb-3">+ Tambah Data</a>

            </div>
            <br>
          
              <table id="kunjunganTable" class="table table-sm table-striped table-bordered align-middle shadow-sm text-nowrap">
    <thead class="table-dark text-center">
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>Tgl</th>
            <th>Nama Ortu/Wali</th>
            <th>NIS - Nama</th>
            <th>Alamat</th>
            <th>Telp</th>
            <th>Guru/TU</th>
            <th>Keperluan</th>
            <th>Foto</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @foreach($ortu_wali as $row)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->id_kunjungan_ow }}</td>
            <td>{{ $row->tanggal_kunjungan_ow }}</td>
            <td>{{ $row->nama_ortu_wali }}</td>
            <td>
                @if($row->siswa)
                    {{ $row->siswa->nis }} - {{ $row->siswa->nama_siswa }}
                @else
                    <span class="text-muted fst-italic">Data siswa terhapus</span>
                @endif
            </td>
            <td>{{ $row->alamat_ortu_wali }}</td>
            <td>{{ $row->telepon_ortu_wali }}</td>
            <td>
                @if($row->guru_tu)
                    {{ $row->guru_tu->nip }} - {{ $row->guru_tu->nama_guru_tu }}
                @else
                    <span class="text-muted fst-italic">Data guru terhapus</span>
                @endif
            </td>
            <td>{{ $row->keperluan }}</td>
            <td>
                <img src="{{ asset('imgow/' . $row->foto) }}" 
                     alt="Foto" 
                     class="img-thumbnail rounded" 
                     style="max-width: 50px; height: auto;">
            </td>
            <td>
                <div class="d-flex gap-1 justify-content-center flex-wrap">
                    <a href="{{ route('ortu_wali.edit', $row->id_kunjungan_ow) }}" class="btn-edit">🖊️ Edit</a>
                    <form action="{{ route('ortu_wali.destroy', $row->id_kunjungan_ow) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete">🗑 Hapus</button>
                    </form>
                </div>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

            

            @include('footer')
        </main>
    </div>

    <script>
document.addEventListener("DOMContentLoaded", function () {
    const sidebar = document.getElementById("sidebar");
    const toggleBtn = document.querySelector(".navbar .menu-toggle");

    if (toggleBtn && sidebar) {
        toggleBtn.addEventListener("click", function () {
            sidebar.classList.toggle("active");
        });
    }
});
</script>

</body>
<script>
$(document).ready(function () {
    $('#kunjunganTable').DataTable({
        "pageLength": 10, // default 10 data per halaman
        "lengthMenu": [5, 10, 25, 50, 100], // opsi jumlah data
        "ordering": true, // aktifkan sorting kolom
    });
});
</script>

@if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}",
            timer: 3000,
            showConfirmButton: false
        });
    </script>
@endif
</html>
