<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Instansi extends Model
{
     protected $table = 'kunjungan_instansi'; // Nama tabel yang benar
     protected $primaryKey = 'id_kunjungan_instansi';
    protected $fillable = ['id_kunjungan_instansi', 'tanggal_kunjungan_instansi','nama_pengunjung','nama_instansi','alamat_instansi','telepon_instansi_pengunjung','tujuan_kepada_guru_tu','keperluan','jumlah_pengunjung','foto'];//
     public function guru_tu()
    {
        return $this->belongsTo(GuruTU::class, 'tujuan_kepada_guru_tu', 'id_guru_tu');
    }
}
