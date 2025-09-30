<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OwController;
use App\Http\Controllers\TamuController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\GuruTuController;
use App\Http\Controllers\InstansiController;
use App\Http\Controllers\UmumController;
use App\Http\Controllers\DokumentasiController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManajemenakunController;

/*
|--------------------------------------------------------------------------
| Guest Routes (tanpa login)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('welcome-qr'));
Route::get('/admin', fn () => view('welcome'))->name('admin');

// Tamu umum (akses tanpa login)
Route::prefix('tampil_pengunjung')->group(function () {
    Route::get('/', [TamuController::class, 'index'])->name('tampil_pengunjung.index');
    Route::get('/instansi', [TamuController::class, 'instansi'])->name('tampil_pengunjung.instansi');
    Route::get('/ortu', [TamuController::class, 'ortu'])->name('tampil_pengunjung.ortu');
    Route::get('/umum', [TamuController::class, 'umum'])->name('tampil_pengunjung.umum');

    Route::post('/ortu/store', [TamuController::class, 'storeOrtu'])->name('tampil_pengunjung.storeOrtu');
    Route::post('/instansi/store', [TamuController::class, 'storeInstansi'])->name('tampil_pengunjung.storeInstansi');
    Route::post('/umum/store', [TamuController::class, 'storeUmum'])->name('tampil_pengunjung.storeUmum');
});

/*
|--------------------------------------------------------------------------
| Protected Routes (butuh login)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Ortu / Wali
    Route::prefix('ortu_wali')->group(function () {
        Route::get('/', [OwController::class, 'index'])->name('ortu_wali.index');
        Route::get('/create', [OwController::class, 'create'])->name('ortu_wali.create');
        Route::post('/store', [OwController::class, 'store'])->name('ortu_wali.store');
        Route::get('/{id_kunjungan_ow}/edit', [OwController::class, 'edit'])->name('ortu_wali.edit');
        Route::put('/{id_kunjungan_ow}', [OwController::class, 'update'])->name('ortu_wali.update');
        Route::delete('/{id_kunjungan_ow}', [OwController::class, 'destroy'])->name('ortu_wali.destroy');
        Route::get('/laporan', [LaporanController::class, 'ow'])->name('ortu_wali.laporan');
    });

    // Siswa
    Route::prefix('siswa')->group(function () {
        Route::get('/', [SiswaController::class, 'index'])->name('siswa.index');
        Route::get('/create', [SiswaController::class, 'create'])->name('siswa.create');
        Route::post('/store', [SiswaController::class, 'store'])->name('siswa.store');
        Route::get('/{id_siswa}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
        Route::put('/{id_siswa}', [SiswaController::class, 'update'])->name('siswa.update');
        Route::delete('/{id_siswa}', [SiswaController::class, 'destroy'])->name('siswa.destroy');
        Route::get('/laporan', [LaporanController::class, 'siswa'])->name('siswa.laporan');
        Route::get('/get-siswa/{id_siswa}', [SiswaController::class, 'getSiswa']);
        Route::get('/siswa/import', [SiswaController::class, 'showImportForm'])->name('siswa.import.form');
        Route::post('/siswa/import', [SiswaController::class, 'import'])->name('siswa.import');
    });

    // Guru TU
    Route::prefix('guru_tu')->group(function () {
        Route::get('/', [GuruTuController::class, 'index'])->name('guru_tu.index');
        Route::get('/create', [GuruTuController::class, 'create'])->name('guru_tu.create');
        Route::post('/store', [GuruTuController::class, 'store'])->name('guru_tu.store');
        Route::get('/{id_guru_tu}/edit', [GuruTuController::class, 'edit'])->name('guru_tu.edit');
        Route::put('/{id_guru_tu}', [GuruTuController::class, 'update'])->name('guru_tu.update');
        Route::delete('/{id_guru_tu}', [GuruTuController::class, 'destroy'])->name('guru_tu.destroy');
        Route::get('/laporan', [LaporanController::class, 'guru_tu'])->name('guru_tu.laporan');
    });

    // Instansi
    Route::prefix('instansi')->group(function () {
        Route::get('/', [InstansiController::class, 'index'])->name('instansi.index');
        Route::get('/create', [InstansiController::class, 'create'])->name('instansi.create');
        Route::post('/store', [InstansiController::class, 'store'])->name('instansi.store');
        Route::get('/{id_kunjungan_instansi}/edit', [InstansiController::class, 'edit'])->name('instansi.edit');
        Route::put('/{id_kunjungan_instansi}', [InstansiController::class, 'update'])->name('instansi.update');
        Route::delete('/{id_kunjungan_instansi}', [InstansiController::class, 'destroy'])->name('instansi.destroy');
        Route::get('/laporan', [LaporanController::class, 'instansi'])->name('instansi.laporan');
    });

    // Umum
    Route::prefix('umum')->group(function () {
        Route::get('/', [UmumController::class, 'index'])->name('umum.index');
        Route::get('/create', [UmumController::class, 'create'])->name('umum.create');
        Route::post('/store', [UmumController::class, 'store'])->name('umum.store');
        Route::get('/{id_kunjungan_umum}/edit', [UmumController::class, 'edit'])->name('umum.edit');
        Route::put('/{id_kunjungan_umum}', [UmumController::class, 'update'])->name('umum.update');
        Route::delete('/{id_kunjungan_umum}', [UmumController::class, 'destroy'])->name('umum.destroy');
        Route::get('/laporan', [LaporanController::class, 'umum'])->name('umum.laporan');
    });

    // Dokumentasi
    Route::prefix('dokumentasi')->group(function () {
        Route::get('/', [DokumentasiController::class, 'index'])->name('dokumentasi.index');
        Route::get('/create', [DokumentasiController::class, 'create'])->name('dokumentasi.create');
        Route::post('/store', [DokumentasiController::class, 'store'])->name('dokumentasi.store');
        Route::get('/{id_dokumentasi}/edit', [DokumentasiController::class, 'edit'])->name('dokumentasi.edit');
        Route::put('/{id_dokumentasi}', [DokumentasiController::class, 'update'])->name('dokumentasi.update');
        Route::delete('/{id_dokumentasi}', [DokumentasiController::class, 'destroy'])->name('dokumentasi.destroy');
        Route::get('/laporan_dokumentasi', [LaporanController::class, 'dokumentasi'])->name('dokumentasi.laporan_dokumentasi');
    });
Route::prefix('manajemenakun')->group(function () {
    Route::get('/', [ManajemenakunController::class, 'index'])->name('manajemenakun.index');
    Route::get('/{id}/edit', [ManajemenakunController::class, 'edit'])->name('manajemenakun.edit');
    Route::put('/{id}', [ManajemenakunController::class, 'update'])->name('manajemenakun.update');
    Route::delete('/{id}', [ManajemenakunController::class, 'destroy'])->name('manajemenakun.destroy');
});

});

// Auth routes (login, register, logout, dll.)
require __DIR__.'/auth.php';
