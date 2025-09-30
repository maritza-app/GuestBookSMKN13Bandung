 <!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dokumentasi Kunjungan</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logobukutamu.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

    <div class="sidebar-logo">
                <img src="{{ asset('images/logobukutamu.png') }}" alt="Logo buku tamu">
            </div>

            <ul class="sidebar-menu">
    <li>
        <a href="{{ route('dashboard') }}" 
           class="sidebar-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
           Dashboard
        </a>
    </li>
                    <details>
                        <summary>Kunjungan Orang Tua / Wali</summary>
                        <ul class="submenu">    
                          <li><a href="{{ route('ortu_wali.index') }}">Data</a></li>
                     <li><a href="{{ route('ortu_wali.laporan') }}">Laporan</a></li>
                </ul>
                        
                    </details>
                </li>

                <li>
                    <details>
                        <summary>Kunjungan Instansi</summary>
                        <ul class="submenu">
                     <li><a href="{{ route('instansi.index') }}">Data</a></li>
                     <li><a href="{{ route('instansi.laporan') }}">Laporan</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>Kunjungan Tamu Umum</summary>
                        <ul class="submenu">
                            <li><a href="{{ route('umum.index') }}">Data</a></li>
                    <li><a href="{{ route('umum.laporan') }}">Laporan</a></li>

                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>Siswa</summary>
                        <ul class="submenu">
                              <li><a href="{{ route('siswa.index') }}">Data</a></li>
                     <li><a href="{{ route('siswa.laporan') }}">Laporan</a></li>
                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>Guru / TU</summary>
                        <ul class="submenu">
                             <li><a href="{{ route('guru_tu.index') }}">Data</a></li>
                    <li><a href="{{ route('guru_tu.laporan') }}">Laporan</a></li>

                        </ul>
                    </details>
                </li>

                <li>
                    <details>
                        <summary>Dokumentasi</summary>
                        <ul class="submenu">
                           <li><a href="{{ route('dokumentasi.index') }}">Data</a></li>
                    <li><a href="{{ route('dokumentasi.laporan_dokumentasi') }}">Laporan</a></li>
                        </ul>
                    </details>
                </li>
                 <li>
        <a href="{{ route('manajemenakun.index') }}" 
           class="sidebar-link {{ request()->routeIs('manajemenakun.index') ? 'active' : '' }}">
           Manajemen Akun
        </a>
    </li>
            </ul>