<?php

namespace App\Http\Controllers;

use App\Models\GuruTU;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class GuruTuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $guru_tu = GuruTU::all(); // Ambil semua data kategori
        return view('guru_tu.index', compact('guru_tu'));// //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('guru_tu.create');  //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
         'nip'=>'required|numeric|min:0',
        'nama_guru_tu' => 'required|string|max:100',
        'jk' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Proses upload foto
    $imageName = null;
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('imgguru_tu'), $imageName);
    }

    // Menyimpan data sparepart ke database
    GuruTU::create([
        'nip' => $request->nip,
        'nama_guru_tu' => $request->nama_guru_tu,
        'jk' => $request->jk,
        'alamat' => $request->alamat,
        'telepon' => $request->telepon,
         'deskripsi' => $request->deskripsi,
          'foto' => $imageName,
    ]);

    // Redirect ke halaman index sparepartku dengan pesan sukses
    return redirect()->route('guru_tu.index')->with('success', 'Data berhasil ditambahkan!'); //
    }

    /**
     * Display the specified resource.
     */
    public function show(Guru_Tu $guru_Tu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_guru_tu)
    {
        $guru_tu = GuruTU::findOrFail($id_guru_tu);
    return view('guru_tu.edit', compact('guru_tu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_guru_tu)
    {
         $guru_tu = GuruTU::where('id_guru_tu', $id_guru_tu)->firstOrFail();

        $request->validate([
            
           'nip'=>'required|numeric|min:0',
        'nama_guru_tu' => 'required|string|max:100',
        'jk' => 'required|in:Laki-laki,Perempuan',
        'alamat' => 'required|string|max:255',
        'telepon' => 'required|string|max:255',
        'deskripsi' => 'required|string|max:255',
        ]);

        $data = $request->all();

        // Foto readonly → gunakan hidden input
        $data['foto'] = $request->foto;

        $guru_tu->update($data);

        return redirect()->route('guru_tu.index')->with('success', 'Data berhasil diperbarui');//
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_guru_tu)
{
    // Update semua kunjungan supaya id_guru_tu jadi NULL
    DB::table('kunjungan_ortu_wali')
        ->where('tujuan_kepada_guru_tu', $id_guru_tu)
        ->update(['tujuan_kepada_guru_tu' => NULL]);
         DB::table('kunjungan_instansi')
        ->where('tujuan_kepada_guru_tu', $id_guru_tu)
        ->update(['tujuan_kepada_guru_tu' => NULL]);

    // Update kunjungan_umum -> set tujuan_kepada_guru_tu jadi 'sudah tidak ada data guru_tu'
   DB::table('kunjungan_umum')
    ->where('tujuan_kepada_guru_tu', $id_guru_tu)
    ->update(['tujuan_kepada_guru_tu' => NULL]);

    // Baru hapus guru_tu
    $guru_tu = GuruTU::findOrFail($id_guru_tu);
    $guru_tu->delete();

    return redirect()->route('guru_tu.index')->with('success', 'Data berhasil dihapus');
}
}
