<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DataKostController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\Userpemilik;
use App\Http\Controllers\Admin\Userpencari;
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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', [admindashboardController::class, 'index'])->name('dashboard-admin');


Route::prefix('admin')
    // ->middleware('auth', 'isAdmin')
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

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
