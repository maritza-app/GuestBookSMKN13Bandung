<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokumentasi extends Model
{
   
    protected $table = 'dokumentasi_kunjungan';
    protected $primaryKey = 'id_dokumentasi';
    public $timestamps = false;

    protected $fillable = [
        'tanggal_kunjungan',
        'nama_kegiatan',
        'kategori_tamu',
        'keterangan_tamu',
        'keterangan_kegiatan',
        'dokumentasi',
    ];
}//

