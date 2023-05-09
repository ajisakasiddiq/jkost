<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataKostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\Userpemilik;
use App\Http\Controllers\Admin\Userpencari;
use App\Http\Controllers\Pemilik\KamarController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', [admindashboardController::class, 'index'])->name('dashboard-admin');

// controller frontend
Route::get('/dash', [App\Http\Controllers\DashController::class, 'index'])->name('dash');
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/Tentang-Kami', [App\Http\Controllers\AboutController::class, 'index'])->name('about');
Route::get('/Pelayanan', [App\Http\Controllers\PelayananController::class, 'index'])->name('pelayanan');
Route::get('/Pemesanan', [App\Http\Controllers\PemesananController::class, 'index'])->name('pemesanan');
Route::get('/Pemesanan/details/{slug}', [App\Http\Controllers\PemesananController::class, 'details'])->name('pemesanan-details');
Route::get('/Pemesanan/details/{slug}/checkout', [App\Http\Controllers\CheckoutController::class, 'index'])->name('checkout');






Route::prefix('admin')
    ->middleware('checkrole:admin')
    ->namespace('App\Http\Controllers\Admin')
    ->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard-admin');


        Route::resource('profile', ProfileController::class);
        Route::resource('transaction', TransactionController::class);
        Route::resource('datakost', DataKostController::class);


        Route::get('/profile', [ProfileController::class, 'index'])->name('profileAdmin-admin');
        Route::get('/transaction', [TransactionController::class, 'index'])->name('transaction-admin');
        Route::get('/data-kost', [DataKostController::class, 'index'])->name('DataKost-admin');
        Route::get('/pencari', [Userpencari::class, 'index'])->name('UserPencari-admin');
        Route::get('/pemilik', [Userpemilik::class, 'index'])->name('UserPemilik-admin');
    });

Auth::routes();

// controller user
Route::middleware('checkrole:pemilik')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Pemilik\dashboardController::class, 'index'])->name('dashboard');
    Route::get('/data-kost', [App\Http\Controllers\Pemilik\KostController::class, 'index'])->name('data-kost');
    Route::get('/data-kamar', [App\Http\Controllers\Pemilik\KamarController::class, 'index'])->name('data-kamar');
    Route::get('/transaction', [App\Http\Controllers\Pemilik\transactionController::class, 'index'])->name('transaction');
    // Route::resource('kamar', KamarController::class);
});

Route::middleware('checkrole:pencari')->group(function () {
    Route::get('/home-kost', [App\Http\Controllers\Pencari\DashboardKostController::class, 'index'])->name('Home-Kost');
    Route::get('/transaction-kost', [App\Http\Controllers\Pencari\PembayaranController::class, 'index'])->name('Pembayaran-Kost');
    Route::get('/riwayat-transaction', [App\Http\Controllers\Pencari\RiwayatController::class, 'index'])->name('riwayat-Kost');
});


Route::post('/kamarkost-add', [App\Http\Controllers\Pemilik\KamarController::class, 'tambah']);
Route::delete('/kamarkost-delete/{id}', [App\Http\Controllers\Pemilik\KamarController::class, 'destroy']);
Route::post('/kostkamar-add', [App\Http\Controllers\Pemilik\KostController::class, 'store']);
Route::delete('/kostkamar-delete/{id}', [App\Http\Controllers\Pemilik\KostController::class, 'destroy']);
