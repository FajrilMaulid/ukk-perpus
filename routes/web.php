<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KategoriController;

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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'useRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin.dashboard');

    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/search', [KategoriController::class, 'search'])->name('kategori.search');
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}', [BukuController::class, 'show'])->name('buku.show');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/{id}/remove-sampul', [BukuController::class, 'removeSampul'])->name('buku.remove_sampul');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
});

Route::middleware(['auth', 'useRole:petugas'])->group(function () {

});
Route::middleware(['auth', 'useRole:peminjam'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

