<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pengguna;
// use App\Models\Resep;
use App\Models\Dokumentasi;
use App\Models\GuruTU;
use App\Models\Siswa;
use App\Models\Instansi;
use App\Models\Ow;
use App\Models\Umum;

class LaporanController extends Controller
{
    // public function resep(Request $request)
    // {
    //     $search = $request->input('search');
    //     $query = Resep::with('pengguna');
    //     if ($search) {
    //         $query->where('judul', 'like', "%$search%")
    //               ->orWhereHas('pengguna', function ($q) use ($search) {
    //                   $q->where('username', 'like', "%$search%");
    //               });
    //     }
    //     $resep = $query->get();
    //     return view('laporan.lapresep', compact('resep'));
    // }

    public function pengguna(Request $request)
    {
        $search = $request->input('search');
        $query = Pengguna::query();
        if ($search) {
            $query->where('username', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }
        $users = $query->get();
        return view('laporan.lapusers', compact('users'));
    }

    public function grafik()
    {
        $pengunjung = DB::table('pengguna')
            ->selectRaw('YEAR(created_at) as tahun, WEEK(created_at) as minggu, COUNT(*) as total')
            ->groupBy('tahun', 'minggu')
            ->orderBy('tahun')
            ->orderBy('minggu')
            ->get();

        return view('laporan.grafik', compact('pengunjung'));
    }

    // Laporan Dokumentasi Kunjungan
    public function dokumentasi(Request $request)
    {
        $search = $request->input('search');
        $query = Dokumentasi::query();
        if ($search) {
            $query->where('nama_kegiatan', 'like', "%$search%")
                  ->orWhere('keterangan_tamu', 'like', "%$search%");
        }
        $dokumentasi = $query->get();
        return view('dokumentasi.laporan_dokumentasi', compact('dokumentasi'));
    }

    // Laporan Guru TU
    public function guru_tu(Request $request)
    {
        $search = $request->input('search');
        $query = GuruTU::query();
        if ($search) {
            $query->where('nama_guru_tu', 'like', "%$search%")
                  ->orWhere('nip', 'like', "%$search%");
        }
        $guru_tu = $query->get();
        return view('guru_tu.laporan_guru_tu', compact('guru_tu'));
    }

    // Laporan Siswa
public function siswa(Request $request)
{
    $search = $request->input('search');
    $query = Siswa::query();
    if ($search) {
        $query->where('nama_siswa', 'like', "%$search%")
              ->orWhere('nis', 'like', "%$search%");
    }
    $siswa = $query->get();
    return view('siswa.laporan', compact('siswa'));
}

    // Laporan Instansi
    public function instansi(Request $request)
    {
        $search = $request->input('search');
        $query = Instansi::query();
        if ($search) {
            $query->where('nama_pengunjung', 'like', "%$search%")
                  ->orWhere('nama_instansi', 'like', "%$search%");
        }
        $instansi = $query->get();
        return view('instansi.laporan_instansi', compact('instansi'));
    }

    // Laporan Ortu/Wali
    
public function ow(Request $request)
{
    $search = $request->input('search');
    $query = Ow::query();
    if ($search) {
        $query->where('nama_ortu_wali', 'like', "%$search%")
              ->orWhere('alamat_ortu_wali', 'like', "%$search%");
    }
    $ortu_wali = $query->get();
    return view('ortu_wali.laporan_ow', compact('ortu_wali'));
}

    // Laporan Umum
    public function umum(Request $request)
    {
        $search = $request->input('search');
        $query = Umum::query();
        if ($search) {
            $query->where('nama_pengunjung_umum', 'like', "%$search%")
                  ->orWhere('keperluan', 'like', "%$search%");
        }
        $umum = $query->get();
        return view('umum.laporan', compact('umum'));
    }


}