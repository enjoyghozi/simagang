<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\Admin\PendaftaranMagangController;
use App\Http\Controllers\Admin\DokumenController;
use App\Http\Controllers\Admin\UploadBerkasController;
use App\Http\Controllers\Admin\MonitoringPenilaianController;
use App\Http\Controllers\Admin\ManajemenPendaftarContoller;
use App\Http\Controllers\Mahasiswa\PesertaController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('mahasiswa/beranda');
});

Auth::routes();

Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    

});
// Route::middleware(['auth'])->group(function () {
 //   Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
//});
Route::resource('akun', AkunController::class);
Route::get('/akun/status/{id}/{status}', [AkunController::class, 'ubahStatus'])->name('akun.status');
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Auth::routes();
//Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
  
Route::middleware(['auth', 'isAdmin'])->prefix('admin')->name('admin.')->group(function () {
   // Route::get('/pendaftaran', [PendaftaranMagangController::class, 'index'])->name('pendaftaran');
    Route::resource('pendaftaran', PendaftaranMagangController::class);
    Route::post('/pendaftaran/{id}/aksi', [PendaftaranMagangController::class, 'proses'])->name('pendaftaran.aksi');
    Route::get('/dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::post('/dokumen/{id}/upload', [DokumenController::class, 'upload'])->name('dokumen.upload');
    Route::get('/upload-berkas', [UploadBerkasController::class, 'index'])->name('admin.upload-berkas.index');
    Route::post('/upload-berkas', [UploadBerkasController::class, 'store'])->name('admin.upload-berkas.store');
    Route::get('/monitoring-penilaian', [MonitoringPenilaianController::class, 'index'])->name('monitoring-penilaian.index');
    Route::post('/monitoring-penilaian', [MonitoringPenilaianController::class, 'store'])->name('admin.monitoring-penilaian.store');
    Route::post('/monitoring-penilaian', [MonitoringPenilaianController::class, 'store'])->name('admin.monitoring-penilaian.store');
});

Route::get('/kirim-wa/{id}', [AkunController::class, 'kirimWa'])->name('kirim.wa');


// =======================
// ROUTE MAHASISWA
// =======================
Route::middleware(['auth', 'isPeserta'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
     Route::get('/', function () {
        return redirect()->route('mahasiswa.dashboard');
    })->name('mahasiswa.index');

    Route::get('/dashboard', [PesertaController::class, 'index'])->name('dashboard');
    Route::get('/profile', [PesertaController::class, 'profile'])->name('profile');
});

Route::middleware(['auth', 'isPesertaaktif'])->group(function () {
    Route::get('mahasiswa/uploadlaporan', [PesertaController::class, 'uploadLaporan'])->name('mahasiswa.uploadlaporan');
    Route::post('mahasiswa/uploadlaporan', [PesertaController::class, 'storeLaporan'])->name('mahasiswa.storelaporan');
    Route::get('mahasiswa/pendaftaran', [PesertaController::class, 'formPendaftaran'])->name('mahasiswa.pendaftaran');
    Route::post('mahasiswa/pendaftaran', [PesertaController::class, 'storePendaftaran'])->name('mahasiswa.pendaftaran.store');
    Route::get('mahasiswa/dokumen', [PesertaController::class, 'dokumen'])->name('mahasiswa.dokumen');
    Route::get('mahasiswa/dokumen/balasan', [PesertaController::class, 'cetakBalasan'])->name('mahasiswa.cetak.balasan');
    Route::get('mahasiswa/dokumen/selesai', [PesertaController::class, 'cetakSelesai'])->name('mahasiswa.cetak.selesai');
    Route::get('mahasiswa/peserta', [PesertaController::class, 'pesertaTerdaftar'])->name('mahasiswa.peserta.index');
    Route::get('mahasiswa/peserta/create', [PesertaController::class, 'createPeserta'])->name('mahasiswa.peserta.create');
    Route::post('mahasiswa/peserta', [PesertaController::class, 'storePeserta'])->name('mahasiswa.peserta.store');
    Route::get('mahasiswa/peserta/{id}/edit', [PesertaController::class, 'edit'])->name('mahasiswa.peserta.edit');
    Route::get('mahasiswa/peserta/{id}/update', [PesertaController::class, 'update'])->name('mahasiswa.peserta.update');
    Route::delete('mahasiswa/peserta/{id}', [PesertaController::class, 'destroy'])->name('mahasiswa.peserta.destroy');
    // Route::get('/nilai', [PesertaController::class, 'lihatNilai'])->name('mahasiswa.nilai');
});

//Route::middleware(['auth', 'isPeserta'])->prefix('mahasiswa')->name('mahasiswa.')->group(function () {
  //  Route::get('/nilai', [PesertaController::class, 'lihatNilai'])->name('nilai');
//});

Route::get('/mahasiswa/beranda', [App\Http\Controllers\Mahasiswa\PesertaController::class, 'beranda'])->name('mahasiswa.beranda');
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
