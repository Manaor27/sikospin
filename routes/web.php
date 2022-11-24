<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/anggota', function () {
    return view('anggota.home');
});

Route::get('/pengajuan', function () {
    return view('anggota.pengajuan');
});

Route::get('/transaksi', function () {
    return view('anggota.transaksi');
});

Route::get('/riwayat', function () {
    return view('anggota.riwayat');
});

Route::get('/admin', function () {
    return view('admin.home');
});

Route::get('/data_anggota', function () {
    return view('admin.anggota');
});

Route::get('/tambah_anggota', function () {
    return view('admin.tambah_anggota');
});

Route::get('/data_pengajuan', function () {
    return view('admin.pengajuan');
});

Route::get('/data_transaksi', function () {
    return view('admin.transaksi');
});

Route::get('/angsuran', function () {
    return view('admin.angsuran');
});

Route::get('/laporan_anggota', function () {
    return view('admin.laporan_anggota');
});

Route::get('/laporan_pinjaman', function () {
    return view('admin.laporan_pinjaman');
});

Route::get('/jenis_pinjaman', function () {
    return view('admin.jenis_pinjaman');
});

Route::get('/tambah_pinjaman', function () {
    return view('admin.tambah_pinjaman');
});

Route::get('/data_riwayat', function () {
    return view('admin.riwayat');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
