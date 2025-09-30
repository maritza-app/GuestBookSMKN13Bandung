<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Dokumentasi Kunjungan - SMKN 13 Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
      <script src="{{ asset('js/script.js') }}"></script>
      <!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<!-- DataTables CSS -->
<link href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css" rel="stylesheet">

<!-- DataTables Buttons CSS -->
<link href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.bootstrap5.min.css" rel="stylesheet">

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>

<!-- Buttons JS -->
<script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.bootstrap5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.print.min.js"></script>

     <style>
      /* ====== TABLE STYLE ELEGAN ====== */
.table-container {
    margin-top: 15px;
    border-radius: 15px;
    overflow: hidden;
    background: #fff;
    padding: 10px;
    box-shadow: 0 6px 16px rgba(0,0,0,0.12);
}

/* HEADER */
thead {
    background: #c94f4f;
    color: white;
}
thead th {
    padding: 14px;
    font-size: 14px;
    font-weight: 700;
    text-align: center;
    border-bottom: 3px solid #a83232;
    box-shadow: inset 0 -2px 0 rgba(255,255,255,0.2);
    /* text-transform: uppercase; */
    letter-spacing: 0.5px;
}

/* BODY */
tbody td {
    padding: 14px;
    font-size: 13px;
    text-align: center;
    vertical-align: middle;
    border-bottom: 1px solid #f3dcdc;
}
tbody tr {
    transition: all 0.3s ease-in-out;
}
tbody tr:nth-child(even) {
    background: #fff7f7;
}
tbody tr:hover {
    background: #ffe3e3 !important;
    box-shadow: none !important;
    border-radius: 0 !important;
}
#slideTable {
    margin-top: 0 !important;
}



/* IMAGE STYLE */
td img {
    border-radius: 10px;
    width: 75px;
    height: 75px;
    object-fit: cover;
    border: 2px solid #c94f4f;
    transition: all 0.3s ease-in-out;
}
/* td img:hover {
    transform: scale(1.15) rotate(2deg);
    border-color: #a83232;
} */

/* PAGINATION */
.dataTables_paginate .paginate_button {
    border-radius: 6px !important;
    padding: 6px 12px !important;
    margin: 2px;
}
.dataTables_paginate .paginate_button.current {
    background: #c94f4f !important;
    color: white !important;
    border: none !important;
}
/* Kasih jarak dropdown "Tampilkan _MENU_" */
.dataTables_length {
    margin-bottom: 0 !important;   /* hapus jarak bawah */
    padding-bottom: 2px;           /* kasih sedikit ruang biar ga terlalu dempet */

}

/* Kasih jarak search box */
.dataTables_filter {
    margin-bottom: 15px;   /* jarak ke bawah */
    margin-left: 20px;     /* geser kanan */
}

/* Kasih jarak info ("Menampilkan halaman...") */
.dataTables_info {
    margin-top: 15px;
}

/* Kasih jarak pagination */
.dataTables_paginate {
    margin-top: 15px;
}
.dataTables_wrapper .row:first-child {
    margin-bottom: 0 !important;
}


/* BUTTON EXPORT */
.dt-buttons .btn {
    border-radius: 8px;
    margin-right: 6px;
    font-size: 13px;
    box-shadow: 0 2px 6px rgba(0,0,0,0.15);
}
.dt-buttons {
    margin-right: 15px; /* kasih jarak ke kanan */
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
        <h2>Laporan Data Guru/TU</h2>
        <br>
<form id="filterForm" class="mb-3">
  <div class="row g-2">
    <div class="col-md-3">
      <select id="bulan" class="form-select">
        <option value="">-- Pilih Bulan --</option>
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
    <div class="col-md-3">
      <select id="tahun" class="form-select">
        <option value="">-- Pilih Tahun --</option>
        @php
          $tahunSekarang = date('Y');
        @endphp
        @for ($i = $tahunSekarang; $i >= 2020; $i--)
          <option value="{{ $i }}">{{ $i }}</option>
        @endfor
      </select>
    </div>
    <div class="col-md-3">
      <button type="button" id="resetFilter" class="btn btn-secondary">Reset</button>
    </div>
  </div>
</form>
        <div id="table-laporan">
                   <table id="slideTable" class="table table-striped table-bordered align-middle">
                <thead>
                    
                <tr>
                        <th>No</th>
                          <th>Tanggal Pembuatan</th>
                        <th>NIP</th>
                        <th>Nama Guru TU</th>
                        <th>Jenis Kelamin</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Deskripsi</th>
                        <th>Foto</th>
                        
                    </tr>


                </thead>
                <tbody>
                 @forelse ($guru_tu as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                             <td>{{ $row->created_at }}</td>
                            <td>{{ $row->nip }}</td>
                            <td>{{ $row->nama_guru_tu }}</td>
                            <td>{{ $row->jk }}</td>
                            <td>{{ $row->alamat }}</td>
                            <td>{{ $row->telepon }}</td>
                            <td>{{ $row->deskripsi }}</td>
                            <td>
                                @if($row->foto)
                                    <img src="{{ asset('imgguru_tu/' . $row->foto) }}" alt="Foto" width="80">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Data tidak ditemukan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </main>
</body>
<script>
$(document).ready(function () {
    // 🔹 Inisialisasi DataTable
    var table = $('#slideTable').DataTable({
       dom: '<"topbar d-flex justify-content-start align-items-center mb-1"<"dt-buttons me-2"B><"dataTables_length me-3"l><"ms-auto"f>>t<"bottom-row d-flex justify-content-between"ip>',
        buttons: [
            {
                extend: 'excelHtml5',
                text: '📊 Export Excel',
                className: 'btn btn-success btn-sm me-2',
               exportOptions: {
    columns: ':visible',
    format: {
        body: function (data, row, column, node) {
            if ($(node).find('img').length) {
                var src = $(node).find('img').attr('src');
                // ambil nama file saja, buang path/https
                return src.split('/').pop();
            }
            return data;
        }
    }
}

            },
            {
                extend: 'print',
                text: '🖨️ Print',
                className: 'btn btn-secondary btn-sm me-2',
                exportOptions: {
                    columns: ':visible',
                    stripHtml: false
                },
                customize: function (win) {
                    $(win.document.body).find('td img').css({
                        'width': '70px',
                        'height': '70px',
                        'object-fit': 'cover',
                        'border-radius': '8px'
                    });
                }
            }
        ],
        pageLength: 10,
        lengthMenu: [5, 10, 25, 50, 100],
        ordering: true,
        language: {
            lengthMenu: "Tampilkan _MENU_ data per halaman",
            zeroRecords: "Data tidak ditemukan",
            info: "Menampilkan halaman _PAGE_ dari _PAGES_",
            infoEmpty: "Tidak ada data tersedia",
            infoFiltered: "(difilter dari total _MAX_ data)",
            search: "Cari:",
            paginate: {
                first: "Pertama",
                last: "Terakhir",
                next: "Berikutnya",
                previous: "Sebelumnya"
            }
        }
    });

    // 🔹 Custom Filter Bulan & Tahun
    $.fn.dataTable.ext.search.push(function(settings, data, dataIndex) {
        var bulan = $('#bulan').val();
        var tahun = $('#tahun').val();
        var tanggal = data[1] || ""; // kolom tanggal (index 1)

        if (bulan && tahun) {
            return tanggal.includes(tahun + "-" + bulan);
        } else if (tahun) {
            return tanggal.includes(tahun);
        } else if (bulan) {
            return tanggal.includes("-" + bulan + "-");
        }
        return true; // kalau filter kosong, tampilkan semua
    });

    // 🔹 Trigger filter saat bulan/tahun berubah
    $('#bulan, #tahun').on('change', function () {
        table.draw();
    });

    // 🔹 Reset filter
    $('#resetFilter').on('click', function () {
        $('#bulan').val('');
        $('#tahun').val('');
        table.draw();
    });
});

</script>


</html>