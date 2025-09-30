<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\GuruTU;
use App\Models\Siswa;
use App\Models\Ow;
use App\Models\Instansi;
use App\Models\Umum;
use Illuminate\Support\Facades\File;


class TamuController extends Controller
{
    public function index()
    {
        return view('tampilan_pengunjung.index');
    }

    public function instansi()
    {
        $guruTus = GuruTU::all();
        return view('tampilan_pengunjung.instansi', compact('guruTus'));
    }

   public function ortu()
{
    $guruTus = GuruTU::all();
    $siswaList = Siswa::all();
    return view('tampilan_pengunjung.ortu', compact('guruTus', 'siswaList'));

}
public function umum()
{
    $guruTus = GuruTU::select('id_GuruTU', 'nama_GuruTU', 'foto')->get();
    $siswaList = Siswa::all();
    return view('tampilan_pengunjung.umum', compact('guruTus', 'siswaList'));


}
    // Menyimpan data dari form kunjungan
    public function storeOrtu(Request $request)
    {
        $request->validate([
            'tanggal_kunjungan_ow' => 'required|date_format:Y-m-d\TH:i',
            'nama_ortu_wali' => 'required|string',
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'alamat_ortu_wali' => 'required|string',
            'telepon_ortu_wali' => 'required|string',
            'tujuan_kepada_GuruTU' => 'required|exists:GuruTU,id_GuruTU',
            'keperluan' => 'required|string',
            'foto_base64' => 'required|string'
        ]);

        // Simpan data kunjungan
        $data = new Ow();
        $data->tanggal_kunjungan_ow = $request->tanggal_kunjungan_ow;
        $data->nama_ortu_wali = $request->nama_ortu_wali;
        $data->id_siswa = $request->id_siswa;
        $data->alamat_ortu_wali = $request->alamat_ortu_wali;
        $data->telepon_ortu_wali = $request->telepon_ortu_wali;
        $data->tujuan_kepada_GuruTU = $request->tujuan_kepada_GuruTU;
        $data->keperluan = $request->keperluan;

        // Proses simpan foto base64
        if ($request->has('foto_base64')) {
            $image = $request->foto_base64;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'foto_' . time() . '.jpg';
            File::put(public_path('imgow/') . $imageName, base64_decode($image));
            $data->foto = $imageName;
        }

        $data->save();

        return redirect()->route('tampil_pengunjung.index')->with('success', 'Data berhasil disimpan!');
    }
    public function storeInstansi(Request $request)
    {
        $request->validate([
            'tanggal_kunjungan_instansi' => 'required|date_format:Y-m-d\TH:i',
            'nama_pengunjung' => 'required|string',
           'nama_instansi' => 'required|string',
            'alamat_instansi' => 'required|string',
            'telepon_instansi_pengunjung' => 'required|string',
            'tujuan_kepada_GuruTU' => 'required|exists:GuruTU,id_GuruTU',
            'keperluan' => 'required|string',
             'jumlah_pengunjung'=>'required|numeric|min:0',
            'foto_base64' => 'required|string'
        ]);

        // Simpan data kunjungan
        $data = new Instansi();
        $data->tanggal_kunjungan_instansi = $request->tanggal_kunjungan_instansi;
        $data->nama_pengunjung = $request->nama_pengunjung;
        $data->nama_instansi = $request->nama_instansi;
        $data->alamat_instansi = $request->alamat_instansi;
        $data->telepon_instansi_pengunjung = $request->telepon_instansi_pengunjung;
        $data->tujuan_kepada_GuruTU = $request->tujuan_kepada_GuruTU;
        $data->keperluan = $request->keperluan;
 $data->jumlah_pengunjung = $request->jumlah_pengunjung;
        // Proses simpan foto base64
        if ($request->has('foto_base64')) {
            $image = $request->foto_base64;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'foto_' . time() . '.jpg';
            File::put(public_path('imginstansi/') . $imageName, base64_decode($image));
            $data->foto = $imageName;
        }

        $data->save();

        return redirect()->route('tampil_pengunjung.index')->with('success', 'Data berhasil disimpan!');
    }
     public function storeUmum(Request $request)
    {
        $request->validate([
            'tanggal_kunjungan' => 'required|date_format:Y-m-d\TH:i',
            'nama_pengunjung_umum' => 'required|string',
           'berkunjung_sebagai' => 'required|string',
            'alamat' => 'required|string',
            'nomor_telepon' => 'required|string',
            'tujuan_kepada_GuruTU' => 'nullable|exists:GuruTU,id_GuruTU',
             'tujuan_kepada_siswa' => 'nullable|exists:siswa,id_siswa',
            'keperluan' => 'required|string',
             'jumlah_pengunjung'=>'required|numeric|min:0',
            'foto_base64' => 'required|string'
        ]);

        // Simpan data kunjungan
        $data = new Umum();
        $data->tanggal_kunjungan = $request->tanggal_kunjungan;
        $data->nama_pengunjung_umum = $request->nama_pengunjung_umum;
        $data->berkunjung_sebagai = $request->berkunjung_sebagai;
        $data->alamat = $request->alamat;
        $data->nomor_telepon = $request->nomor_telepon;
        $data->tujuan_kepada_GuruTU = $request->tujuan_kepada_GuruTU;
        $data->tujuan_kepada_siswa = $request->tujuan_kepada_siswa;
        $data->keperluan = $request->keperluan;
         $data->jumlah_pengunjung = $request->jumlah_pengunjung;

        // Proses simpan foto base64
        if ($request->has('foto_base64')) {
            $image = $request->foto_base64;
            $image = str_replace('data:image/jpeg;base64,', '', $image);
            $image = str_replace(' ', '+', $image);
            $imageName = 'foto_' . time() . '.jpg';
            File::put(public_path('imgumum/') . $imageName, base64_decode($image));
            $data->foto = $imageName;
        }

        $data->save();

        return redirect()->route('tampil_pengunjung.index')->with('success', 'Data berhasil disimpan!');
    }
}

