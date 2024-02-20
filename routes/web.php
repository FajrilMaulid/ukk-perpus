<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
})->middleware('auth','useRole:peminjam');

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login']);

// Route untuk proses logout
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk dashboard admin
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
});

// // Route untuk dashboard petugas
// Route::middleware(['auth', 'role:petugas'])->group(function () {
//     Route::get('/petugas/dashboard', [PetugasController::class, 'dashboard'])->name('petugas.dashboard');
// });

// // Route untuk dashboard peminjam
// Route::middleware(['auth', 'role:peminjam'])->group(function () {
//     Route::get('/peminjam/dashboard', [PeminjamController::class, 'dashboard'])->name('peminjam.dashboard');
// });

// Menampilkan form registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Proses registrasi
Route::post('/register', [AuthController::class, 'register']);

