<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru_Tu extends Model
{
   protected $table = 'guru_tu'; // Nama tabel yang benar
 protected $primaryKey = 'id_guru_tu'; 
    protected $fillable = ['id_guru_tu', 'nip','nama_guru_tu','jk','alamat','telepon','deskripsi','foto'];//
}
