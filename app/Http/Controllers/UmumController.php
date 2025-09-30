<?php

namespace App\Http\Controllers;

use App\Models\Umum;
use App\Models\GuruTU;
use App\Models\Siswa;
use Illuminate\Http\Request;

class UmumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $umum = Umum::with(['siswa', 'guru_tu'])->get();
        return view('umum.index', compact('umum'));// //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
         $guru_tu = GuruTU::all();
        return view('umum.create', compact('guru_tu','siswa')); //
    }

    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $request->validate([
        'tanggal_kunjungan' => 'required|date_format:Y-m-d\TH:i',
        'nama_pengunjung_umum' => 'required|string',
        'berkunjung_sebagai' => 'required|string',
        'alamat' => 'required|string',
        'nomor_telepon' => 'required|string',
        'tujuan_kepada_guru_tu' => 'nullable|exists:guru_tu,id_guru_tu',
        'tujuan_kepada_siswa' => 'nullable|exists:siswa,id_siswa',
        'keperluan' => 'required|string',
        'jumlah_pengunjung' => 'required|numeric|min:0',
        'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:16384',
    ]);

    // proses upload foto
    if ($request->hasFile('foto')) {
        $image = $request->file('foto');
        $imageName = time() . '_' . $image->getClientOriginalName();
        $image->move(public_path('imgumum'), $imageName);
    } else {
        $imageName = null;
    }

    // simpan data ke database
    Umum::create([
        'tanggal_kunjungan' => $request->tanggal_kunjungan,
        'nama_pengunjung_umum' => $request->nama_pengunjung_umum,
        'berkunjung_sebagai' => $request->berkunjung_sebagai,
        'alamat' => $request->alamat,
        'nomor_telepon' => $request->nomor_telepon,
        'tujuan_kepada_guru_tu' => $request->tujuan_kepada_guru_tu,
        'tujuan_kepada_siswa' => $request->tujuan_kepada_siswa,
        'keperluan' => $request->keperluan,
        'jumlah_pengunjung' => $request->jumlah_pengunjung,
        'foto' => $imageName,
    ]);

    return redirect()->route('umum.index')->with('success', 'Data berhasil ditambahkan!');
}

    /**
     * Display the specified resource.
     */
    public function show(Umum $umum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id_kunjungan_umum)
    {
        
        $umum = Umum::where('id_kunjungan_umum', $id_kunjungan_umum)->firstOrFail();
        $guru_tu = GuruTU::all();
        $siswa = Siswa::all();  //
         return view('umum.edit', compact('umum', 'guru_tu','siswa'));//
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id_kunjungan_umum)
    {
       $umum = Umum::where('id_kunjungan_umum', $id_kunjungan_umum)->firstOrFail();

        $request->validate([
          
        'nama_pengunjung_umum' => 'required|string',
        'berkunjung_sebagai' => 'required|string',
        'alamat' => 'required|string',
        'nomor_telepon' => 'required|string',
        'tujuan_kepada_guru_tu' => 'nullable|exists:guru_tu,id_guru_tu',
        'tujuan_kepada_siswa' => 'nullable|exists:siswa,id_siswa',
        'keperluan' => 'required|string',
        'jumlah_pengunjung' => 'required|numeric|min:0',
        
        ]);

        $data = $request->all();

        // Foto readonly → gunakan hidden input
        $data['foto'] = $request->foto;

        $umum->update($data);

        return redirect()->route('umum.index')->with('success', 'Data berhasil diperbarui'); //
    }

    /**
     * Remove the specified resource from storage.
     */
      public function destroy($id_kunjungan_umum)
{
    $umum = Umum::findOrFail($id_kunjungan_umum);
    $umum->delete();
    return redirect()->route('umum.index')->with('success', 'Data Kunjungan Umum berhasil dihapus!');
}
}
