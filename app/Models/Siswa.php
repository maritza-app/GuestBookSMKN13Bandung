<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa'; // Nama tabel
    protected $primaryKey = 'id_siswa';

    protected $fillable = [
        'nis',
        'nama_siswa',
        'alamat_siswa',
        'jk',
        'kelas',
        'jurusan',
        'nama_ayah',
        'nama_ibu',
        'nama_wali',
        'telepon_siswa',
        'alamat_ortu_wali',   // <-- tambahkan ini
        'telepon_ortu_wali',  // sudah ada
    ];
}
