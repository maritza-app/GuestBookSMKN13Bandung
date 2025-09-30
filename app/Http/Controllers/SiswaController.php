<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all(); // Ambil semua data kategori
        return view('siswa.index', compact('siswa'));// //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('siswa.create'); //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(Request $request)
    // {
        
    // //     $request->validate([
    // //      'nis'=>'required|numeric|min:0',
    // //     'nama_siswa' => 'required|string|max:100',
    // //     'alamat_siswa' => 'required|string|max:255',
    // //     'jk' => 'required|in:Laki-laki,Perempuan',
    // //     'kelas' => 'required|string|max:255',
    // //     'jurusan' => 'required|in:Analis Kimia,Teknik Komputer Jaringan,Rekayasa Perangkat Lunak',
    // //     'telepon_siswa' => 'required|string|max:255',
    // //     'nama_ayah' => 'required|string|max:255',// Pastikan kategori_id valid
    // //      'nama_ibu' => 'required|string|max:255',
    // //       'nama_wali' => 'required|string|max:255',
    // //       'alamat_ortu_wali' => 'required|string|max:255',
    // //         'telepon_ortu_wali' => 'required|string|max:255',
    // // ]);

    // // // Menyimpan data sparepart ke database
    // // Siswa::create([
    // //     'nis' => $request->nis,
    // //     'nama_siswa' => $request->nama_siswa,
    // //     'alamat_siswa' => $request->alamat_siswa,
    // //     'jk' => $request->jk,
    // //     'kelas' => $request->kelas,
    // //     'jurusan' => $request->jurusan,
    // //      'telepon_siswa' => $request->telepon_siswa,
    // //       'nama_ayah' => $request->nama_ayah,
    // //        'nama_ibu' => $request->nama_ibu,
    // //         'nama_wali' => $request->nama_wali,
    // //          'alamat_ortu_wali' => $request->alamat_ortu_wali,
    // //           'telepon_ortu_wali' => $request->telepon_ortu_wali,
    // // ]);

    // // // Redirect ke halaman index sparepartku dengan pesan sukses
    
public function store(Request $request)
{
    $data = Siswa::create([
        'nis' => $request->nis,
        'nama_siswa' => $request->nama_siswa,
        'alamat_siswa' => $request->alamat_siswa,
        'jk' => $request->jk,
        'kelas' => $request->kelas,
        'jurusan' => $request->jurusan,
        'nama_ayah' => $request->nama_ayah,
        'nama_ibu' => $request->nama_ibu,
        'nama_wali' => $request->nama_wali,
        'telepon_siswa' => $request->telepon_siswa,
        'alamat_ortu_wali' => $request->alamat_ortu_wali,
        'telepon_ortu_wali' => $request->telepon_ortu_wali,
    ]);

   return redirect()->route('siswa.index')->with('success', 'Data berhasil ditambahkan!');
}
// ========================
// Import Excel
// ========================
public function import(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:xlsx,xls,csv'
    ]);

    \Maatwebsite\Excel\Facades\Excel::import(new \App\Imports\SiswaImport, $request->file('file'));

    return redirect()->route('siswa.index')->with('success', 'Data siswa berhasil diimport!');
}

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_siswa)
    {
        $siswa = Siswa::where('id_siswa', $id_siswa)->firstOrFail();
        return view('siswa.edit', compact('siswa'));
    }

    // ========================
    // Update
    // ========================
    public function update(Request $request, $id_siswa)
    {
        $siswa = Siswa::where('id_siswa', $id_siswa)->firstOrFail();

        $validated = $request->validate([
            'nis'               => 'required|numeric|min:0',
            'nama_siswa'        => 'required|string|max:100',
            'alamat_siswa'      => 'required|string|max:255',
            'jk'                => 'required|in:Laki-laki,Perempuan',
            'kelas'             => 'required|string|max:255',
            'jurusan'           => 'required|in:Analis Kimia,Teknik Komputer Jaringan,Rekayasa Perangkat Lunak',
            'telepon_siswa'     => 'required|string|max:255',
            'nama_ayah'         => 'required|string|max:255',
            'nama_ibu'          => 'required|string|max:255',
            'nama_wali'         => 'required|string|max:255',
            'alamat_ortu_wali'  => 'required|string|max:255',
            'telepon_ortu_wali' => 'required|string|max:255',
        ]);

        $siswa->update($validated);

        return redirect()->route('siswa.index')->with('success', 'Data berhasil diperbarui');
    }


    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id_siswa)
{
    // Update semua kunjungan supaya id_siswa jadi NULL
    DB::table('kunjungan_ortu_wali')
        ->where('id_siswa', $id_siswa)
        ->update(['id_siswa' => NULL]);

    // Update kunjungan_umum -> set tujuan_kepada_siswa jadi 'sudah tidak ada data siswa'
   DB::table('kunjungan_umum')
    ->where('tujuan_kepada_siswa', $id_siswa)
    ->update(['tujuan_kepada_siswa' => 0]);

    // Baru hapus siswa
    $siswa = Siswa::findOrFail($id_siswa);
    $siswa->delete();

    return redirect()->route('siswa.index')->with('success', 'Data berhasil dihapus');
}

  // SiswaController.php
public function getSiswa($id)
{
    $siswa = Siswa::find($id);

    if ($siswa) {
        $namaOrtuWali = [];

        if (!empty($siswa->nama_ayah)) {
            $namaOrtuWali[] = "Ayah: " . $siswa->nama_ayah;
        }
        if (!empty($siswa->nama_ibu)) {
            $namaOrtuWali[] = "Ibu: " . $siswa->nama_ibu;
        }
        if (!empty($siswa->nama_wali)) {
            $namaOrtuWali[] = "Wali: " . $siswa->nama_wali;
        }

        return response()->json([
            'nama_ortu_wali' => implode("\n", $namaOrtuWali),
            'alamat_ortu_wali' => $siswa->alamat_ortu_wali,
            'telepon_ortu_wali' => $siswa->telepon_ortu_wali,
        ]);
    }

    return response()->json([], 404);
}

}
