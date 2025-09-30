<?php

namespace App\Imports;

use App\Models\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithCalculatedFormulas;

class SiswaImport implements ToModel, WithHeadingRow, WithCalculatedFormulas
{
   public function model(array $row)
{
    // $row = array_change_key_case(array_map('trim', $row), CASE_LOWER);

    // Skip kalau NIS kosong
    if (empty($row['nis'])) {
        return null;
    }

    $mapJurusan = [
        'KA'  => 'Analis Kimia',
        'RPL' => 'Rekayasa Perangkat Lunak',
        'TKJ' => 'Teknik Komputer Jaringan',
    ];

    $jurusanExcel = $row['jur'] ?? null;
    $jurusan = $mapJurusan[$jurusanExcel] ?? $jurusanExcel;

    return new Siswa([
        'nis'              => (int) $row['nis'], // pastikan integer
        'nama_siswa'       => $row['nama_siswa'] ?? null,
        'alamat_siswa'     => null,
        'jenis_kelamin'    => $row['l/p'] ?? $row['lp'] ?? null,
        'kelas'            => $row['kls'] ?? null,
        'jurusan'          => $jurusan,
         'telepon_siswa'    => null,
        'nama_ayah'   => null,
          'nama_ibu'   => null,
            'nama_wali'   => null,
        'alamat_ortu_wali' => null,
        'telepon_ortu_wali'=> null,
    ]);
}


}
