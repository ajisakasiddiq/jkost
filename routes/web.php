<?php

use App\Http\Controllers\admindashboardController;
use App\Http\Controllers\profileAdminController;
use App\Http\Controllers\transactionController;
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

Route::get('/dashboard', [admindashboardController::class, 'index'])->name('dashboard-admin');
Route::get('/profile', [profileAdminController::class, 'index'])->name('profileAdmin-admin');
Route::get('/transaction', [transactionController::class, 'index'])->name('transaction-admin');
