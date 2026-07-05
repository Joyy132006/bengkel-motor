<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WorkshopController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ===== PUBLIC =====
Route::get('/', function () {
    return view('welcome');
});

// ===== PUBLIC CUSTOMER ROUTES =====
Route::post('/booking/customer',  [WorkshopController::class, 'bookingCustomer'])->name('booking.customer');
Route::get('/booking',             [WorkshopController::class, 'showBooking'])->name('booking.show');
Route::post('/cek-status',        [WorkshopController::class, 'cekStatus'])->name('cek.status');
Route::get('/cek-status',         [WorkshopController::class, 'showCekStatus'])->name('cek.status.show');
Route::get('/produk',             [WorkshopController::class, 'produkCatalog'])->name('produk.index');

// ===== AUTH ROUTES =====
Route::get('/login',         [AuthController::class, 'showLogin'])->name('login');
Route::get('/lupa-password', [AuthController::class, 'showLupaPassword'])->name('password.lupa');
Route::post('/login',        [AuthController::class, 'login'])->name('login.post');
Route::post('/logout',   [AuthController::class, 'logout'])->name('logout');
Route::get('/register',  [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');

// ===== PROTECTED DASHBOARD ROUTES (harus login) =====
Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [WorkshopController::class, 'index'])->name('dashboard');
    Route::post('/booking/simpan',       [WorkshopController::class, 'simpanBooking'])->name('booking.simpan');
    Route::post('/booking/{id}/status',  [WorkshopController::class, 'updateStatus'])->name('booking.status');
    Route::post('/booking/{id}/bayar',   [WorkshopController::class, 'konfirmasiBayar'])->name('booking.bayar');
    Route::post('/booking/{id}/mekanik', [WorkshopController::class, 'assignMekanik'])->name('booking.mekanik');
    Route::post('/booking/{id}/hapus',   [WorkshopController::class, 'hapusBooking'])->name('booking.hapus');
    Route::post('/mekanik/simpan',       [WorkshopController::class, 'simpanMekanik'])->name('mekanik.simpan');
    Route::post('/mekanik/{id}/update',  [WorkshopController::class, 'updateMekanik'])->name('mekanik.update');
    Route::post('/mekanik/{id}/hapus',   [WorkshopController::class, 'hapusMekanik'])->name('mekanik.hapus');
});

// ===== TEST ROUTES (debugging) =====
Route::get('/test-booking',        [WorkshopController::class, 'testSimpan']);
Route::get('/test-tampil',         [WorkshopController::class, 'testTampil']);
Route::get('/test-update/{id}',    [WorkshopController::class, 'testUpdate']);
Route::get('/test-hapus/{id}',     [WorkshopController::class, 'testHapus']);
Route::get('/test-statistik',      [WorkshopController::class, 'ambilStatistik']);
Route::get('/test-mekanik',        [WorkshopController::class, 'testSimpanMekanik']);
Route::get('/test-relasi',         [WorkshopController::class, 'testTampilRelasi']);
Route::get('/test-cetak/{id}',     [WorkshopController::class, 'cetakPDF']);