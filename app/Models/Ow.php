<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ow extends Model
{
    protected $table = 'kunjungan_ortu_wali'; // Nama tabel yang benar
    protected $primaryKey = 'id_kunjungan_ow';
    protected $fillable = [
        'id_kunjungan_ow',
        'tanggal_kunjungan_ow',
        'nama_ortu_wali',
        'alamat_ortu_wali',
        'telepon_ortu_wali',
        'tujuan_kepada_guru_tu',
        'keperluan',
        'foto',
        'id_siswa'
    ];

    /**
     * Relasi ke tabel siswa
     * Ow.id_siswa -> siswa.id_siswa
     */
    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'id_siswa', 'id_siswa');
    }


    public function guru_tu()
    {
        return $this->belongsTo(GuruTU::class, 'tujuan_kepada_guru_tu', 'id_guru_tu');
    }
}
