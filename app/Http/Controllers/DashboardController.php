<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ow;
use App\Models\Instansi;
use App\Models\Umum;

class DashboardController extends Controller
{
    public function index()
    {
        // Ambil 5 data kunjungan terakhir
        $kunjungan_terakhir_ow = DB::table('kunjungan_ortu_wali')
            ->orderBy('tanggal_kunjungan_ow', 'desc')
            ->limit(5)
            ->get();

        $kunjungan_terakhir_instansi = DB::table('kunjungan_instansi')
            ->orderBy('tanggal_kunjungan_instansi', 'desc')
            ->limit(5)
            ->get();

        $kunjungan_terakhir_umum = DB::table('kunjungan_umum')
            ->orderBy('tanggal_kunjungan', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact('kunjungan_terakhir_ow','kunjungan_terakhir_instansi','kunjungan_terakhir_umum'));
    }
}
