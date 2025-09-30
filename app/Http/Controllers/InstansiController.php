<?php

namespace App\Http\Controllers;

use App\Models\Instansi;
use App\Models\Guru_Tu;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instansi = Instansi::with([ 'guru_tu'])->get();
        return view('instansi.index', compact('instansi'));// //
    }

    /**
     * Shinstansi the form for creating a new resource.
     */
    public function create()
    {
         $guru_tu = Guru_Tu::all();
        return view('instansi.create', compact('guru_tu')); //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'tanggal_kunjungan_instansi' => 'required|date_format:Y-m-d\TH:i',
        'nama_pengunjung' => 'required|string',
        'nama_instansi' => 'required|string',
        'alamat_instansi' => 'required|string',
        'telepon_instansi_pengunjung' => 'required|string',
        'tujuan_kepada_guru_tu' => 'required|exists:guru_tu,id_guru_tu',
        'keperluan' => 'required|string',
        'jumlah_pengunjung' => 'required|numeric|min:0',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Proses upload foto
    $imageName = null;
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('imginstansi'), $imageName);
    }

    // Insert data ke database
    Instansi::create([
        'tanggal_kunjungan_instansi' => $request->tanggal_kunjungan_instansi,
        'nama_pengunjung' => $request->nama_pengunjung,
        'nama_instansi' => $request->nama_instansi,
        'alamat_instansi' => $request->alamat_instansi,
        'telepon_instansi_pengunjung' => $request->telepon_instansi_pengunjung,
        'tujuan_kepada_guru_tu' => $request->tujuan_kepada_guru_tu,
        'keperluan' => $request->keperluan,
        'jumlah_pengunjung' => $request->jumlah_pengunjung,
        'foto' => $imageName,
    ]);

    return redirect()->route('instansi.index')->with('success', 'Data berhasil ditambahkan!');
}

    /**
     * Shinstansi the form for editing the specified resource.
     */
    public function edit($id_kunjungan_instansi)
    {
        $instansi = instansi::where('id_kunjungan_instansi', $id_kunjungan_instansi)->firstOrFail();
        $guru_tu = Guru_Tu::all(); //
         return view('instansi.edit', compact('instansi', 'guru_tu'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kunjungan_instansi)
    {
        $instansi = instansi::where('id_kunjungan_instansi', $id_kunjungan_instansi)->firstOrFail();

        $request->validate([
            'nama_pengunjung' => 'required|string|max:255',
                 'nama_instansi' => 'required|string|max:255',   
                   'alamat_instansi' => 'required|string|max:255',
                        'telepon_instansi_pengunjung' => 'required|string|max:255',
            'tujuan_kepada_guru_tu' => 'required|exists:guru_tu,id_guru_tu',
              'keperluan' => 'required|string|max:255',
              'jumlah_pengunjung' => 'required|numeric|min:0',
        ]);

        $data = $request->all();

        // Foto readonly → gunakan hidden input
        $data['foto'] = $request->foto;

        $instansi->update($data);

        return redirect()->route('instansi.index')->with('success', 'Data berhasil diperbarui');
    } //

    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id_kunjungan_instansi)
{
    $instansi = Instansi::findOrFail($id_kunjungan_instansi);
    $instansi->delete();
    return redirect()->route('instansi.index')->with('success', 'Data Kunjungan Instansi berhasil dihapus!');
}

}
