<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Umum extends Model
{
     protected $table = 'kunjungan_umum'; // Nama tabel yang benar
 protected $primaryKey = 'id_kunjungan_umum';
    protected $fillable = ['id_kunjungan_umum', 'tanggal_kunjungan','nama_pengunjung_umum','berkunjung_sebagai','alamat','nomor_telepon','tujuan_kepada_guru_tu','tujuan_kepada_siswa','keperluan','jumlah_pengunjung','foto'];//
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }


    public function guru_tu()
    {
        return $this->belongsTo(GuruTU::class, 'tujuan_kepada_guru_tu', 'id_guru_tu');
    }
}
