<?php

namespace App\Http\Controllers;

use App\Models\Dokumentasi;
use Illuminate\Http\Request;

class DokumentasiController extends Controller
{
    public function index()
    {
        $dokumentasi = Dokumentasi::all();
        return view('dokumentasi.index', compact('dokumentasi'));
    }

    public function create()
    {
        return view('dokumentasi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'nama_kegiatan' => 'required|string|max:255',
            'kategori_tamu' => 'required|in:Instansi,Sekolah,Lainnya',
            'keterangan_tamu' => 'required|string|max:255',
            'keterangan_kegiatan' => 'required|string',
            'dokumentasi' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('dokumentasi')) {
            $image = $request->file('dokumentasi');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imgdokumentasi'), $imageName);
        }

        Dokumentasi::create([
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'kategori_tamu' => $request->kategori_tamu,
            'keterangan_tamu' => $request->keterangan_tamu,
            'keterangan_kegiatan' => $request->keterangan_kegiatan,
            'dokumentasi' => $imageName,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil ditambahkan!');
    }

    public function edit($id_dokumentasi)
    {
        $dokumentasi = Dokumentasi::findOrFail($id_dokumentasi);
        return view('dokumentasi.edit', compact('dokumentasi'));
    }

    public function update(Request $request, $id_dokumentasi)
    {
        $dokumentasi = Dokumentasi::findOrFail($id_dokumentasi);

        $request->validate([
            'tanggal_kunjungan' => 'required|date',
            'nama_kegiatan' => 'required|string|max:255',
            'kategori_tamu' => 'required|in:Instansi,Sekolah,Lainnya',
            'keterangan_tamu' => 'required|string|max:255',
            'keterangan_kegiatan' => 'required|string',
            'dokumentasi' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $imageName = $request->old_dokumentasi;
        if ($request->hasFile('dokumentasi')) {
            $image = $request->file('dokumentasi');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('imgdokumentasi'), $imageName);
        }

        $dokumentasi->update([
            'tanggal_kunjungan' => $request->tanggal_kunjungan,
            'nama_kegiatan' => $request->nama_kegiatan,
            'kategori_tamu' => $request->kategori_tamu,
            'keterangan_tamu' => $request->keterangan_tamu,
            'keterangan_kegiatan' => $request->keterangan_kegiatan,
            'dokumentasi' => $imageName,
        ]);

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil diperbarui!');
    }

    public function destroy($id_dokumentasi)
    {
        $dokumentasi = Dokumentasi::findOrFail($id_dokumentasi);
        $dokumentasi->delete();

        return redirect()->route('dokumentasi.index')->with('success', 'Data berhasil dihapus!');
    }
}