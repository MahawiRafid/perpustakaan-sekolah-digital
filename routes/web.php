<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\BukuController;
use App\Http\Controllers\Admin\AnggotaController;
use App\Http\Controllers\Siswa\RegisterController;
use App\Http\Controllers\Admin\TransaksiController as AdminTransaksiController;
use App\Http\Controllers\Siswa\TransaksiController as SiswaTransaksiController;

Route::get('/', function () {
    return view('welcome');
});

//login
Route::get('/login', [AuthController::class, 'loginForm']);
Route::post('/login', [AuthController::class, 'login']);

//logout
Route::get('/logout', [AuthController::class, 'logout']);

//admin
Route::get('/admin', function () {
    return view('admin.dashboard');
});

//siswa
Route::get('/siswa', function () {
    return view('siswa.dashboard');
});

//buku
Route::get('/admin/buku', [BukuController::class, 'index']);
Route::get('/admin/buku/create', [BukuController::class, 'create']);
Route::post('/admin/buku', [BukuController::class, 'store']);
Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit']);
Route::post('/admin/buku/{id}', [BukuController::class, 'update']);
Route::get('/admin/buku/{id}/delete', [BukuController::class, 'destroy']);

//anggota
Route::get('/admin/anggota', [AnggotaController::class, 'index']);
Route::get('/admin/anggota/create', [AnggotaController::class, 'create']);
Route::post('/admin/anggota', [AnggotaController::class, 'store']);
Route::get('/admin/anggota/{id}/edit', [AnggotaController::class, 'edit']);
Route::post('/admin/anggota/{id}', [AnggotaController::class, 'update']);
Route::get('/admin/anggota/{id}/delete', [AnggotaController::class, 'destroy']);

//register
Route::get('/register-siswa', [RegisterController::class, 'form']);
Route::post('/register-siswa', [RegisterController::class, 'store']);

//transaksi siswa
Route::get('/siswa/pinjam', [SiswaTransaksiController::class, 'pinjamForm']);
Route::post('/siswa/pinjam', [SiswaTransaksiController::class, 'pinjam']);

Route::get('/siswa/kembali', [SiswaTransaksiController::class, 'kembaliForm']);
Route::get('/siswa/kembali/{id}', [SiswaTransaksiController::class, 'kembali']);

//transaksi admin
Route::get('/admin/transaksi', [AdminTransaksiController::class, 'index']);

//proteksi role admin dari selain admin
Route::group([], function () {

    // PROTEKSI ADMIN (manual check di tiap route)
    Route::get('/admin', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return view('admin.dashboard');
    });

    Route::get('/admin/buku', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return app(\App\Http\Controllers\Admin\BukuController::class)->index();
    });

    Route::get('/admin/anggota', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return app(\App\Http\Controllers\Admin\AnggotaController::class)->index();
    });

    Route::get('/admin/transaksi', function () {
        if (session('role') !== 'admin') {
            return redirect('/login');
        }
        return app(\App\Http\Controllers\Admin\TransaksiController::class)->index();
    });

});