<?php

namespace App\Http\Controllers;

use App\Models\Ow;
use App\Models\Siswa;
use App\Models\GuruTU;
use Illuminate\Http\Request;

class OwController extends Controller
{
    /**
     * Tampilkan semua data Ortu/Wali
     */
    public function index()
    {
        $ortu_wali = Ow::with(['siswa', 'guru_tu'])->get();
        return view('ortu_wali.index', compact('ortu_wali'));
    }

    /**
     * Form tambah data Ortu/Wali
     */
    public function create()
    {
        $siswa = Siswa::all();
        $guru_tu = GuruTU::all();
        return view('ortu_wali.create', compact('siswa', 'guru_tu'));
    }

    /**
     * Simpan data Ortu/Wali baru
     */
   public function store(Request $request)
    {
         $request->validate([
         'tanggal_kunjungan_ow' => 'required|date',
        'nama_ortu_wali' => 'nullable|string|max:100',
        'alamat_ortu_wali' => 'nullable|string|max:255',
        'telepon_ortu_wali' => 'nullable|string|max:255',
        'tujuan_kepada_guru_tu' => 'required|exists:guru_tu,id_guru_tu', 
          'keperluan' => 'required|string|max:255',// Pastikan kategori_id valid
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'id_siswa' => 'required|exists:siswa,id_siswa',  // Validasi gambar
    ]);

    // Proses upload gambar
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '_' . $image->getClientOriginalName(); // Nama unik untuk gambar
        $image->move(public_path('imgow'), $imageName); // Simpan gambar di folder public/sparepart
    } else {
        $imageName = null; // Jika tidak ada gambar yang diupload
    }

    // Menyimpan data sparepart ke database
   Ow::create([
    'tanggal_kunjungan_ow' => $request->tanggal_kunjungan_ow,
    'nama_ortu_wali' => $request->nama_ortu_wali,
    'alamat_ortu_wali' => $request->alamat_ortu_wali,
    'telepon_ortu_wali' => $request->telepon_ortu_wali,
    'tujuan_kepada_guru_tu' => $request->tujuan_kepada_guru_tu, 
    'keperluan' => $request->keperluan,
    'foto' => $imageName, 
    'id_siswa' => $request->id_siswa,
]);


    // Redirect ke halaman index sparepartku dengan pesan sukses
    return redirect()->route('ortu_wali.index')->with('success', 'Data berhasil ditambahkan!');//
    }
    /**
     * Form edit data Ortu/Wali
     */
    public function edit($id_kunjungan_ow)
    {
        $ow = Ow::where('id_kunjungan_ow', $id_kunjungan_ow)->firstOrFail();
        $siswa = Siswa::all();
        $guru_tu = GuruTU::all();
        return view('ortu_wali.edit', compact('ow', 'siswa', 'guru_tu'));
    }

    /**
     * Update data Ortu/Wali
     */
    public function update(Request $request, $id_kunjungan_ow)
    {
        $ow = Ow::where('id_kunjungan_ow', $id_kunjungan_ow)->firstOrFail();

        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'nama_ortu_wali' => 'nullable|string',
            'alamat_ortu_wali' => 'nullable|string',
            'telepon_ortu_wali' => 'nullable|string|max:20',
            'tujuan_kepada_guru_tu' => 'required|exists:guru_tu,id_guru_tu',
              'keperluan' => 'required|string|max:255',
        ]);

        $data = $request->all();

        // Foto readonly → gunakan hidden input
        $data['foto'] = $request->foto;

        $ow->update($data);

        return redirect()->route('ortu_wali.index')->with('success', 'Data berhasil diperbarui');
    }

    /**
     * Hapus data Ortu/Wali
     */
    public function destroy($id_kunjungan_ow)
    {
        $ow = Ow::where('id_kunjungan_ow', $id_kunjungan_ow)->firstOrFail();

        // Hapus file foto jika ada
        if ($ow->foto && file_exists(public_path('orttu_tu/' . $ow->foto))) {
            unlink(public_path('imgow/' . $ow->foto));
        }

        $ow->delete();
        return redirect()->route('ortu_wali.index')->with('success', 'Data berhasil dihapus');
    }
    public function getSiswa($id_siswa)
{
    $siswa = \App\Models\Siswa::find($id_siswa);

    if ($siswa) {
        return response()->json([
            'nama' => $siswa->nama,
            'alamat' => $siswa->alamat,
            'telepon' => $siswa->telepon,
        ]);
    } else {
        return response()->json(['message' => 'Data siswa tidak ditemukan'], 404);
    }
}

}
