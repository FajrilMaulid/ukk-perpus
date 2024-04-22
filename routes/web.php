<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasBukuController;
use App\Http\Controllers\PetugasUlasanController;
use App\Http\Controllers\AdminPeminjamanController;
use App\Http\Controllers\PetugasKategoriController;
use App\Http\Controllers\PetugasPeminjamanController;

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

Route::get('/', [DashboardController::class, 'showUserForm'])->name('peminjam.dashboard');

Route::get('/books/{category}', [DashboardController::class, 'showBooksByCategory'])->name('books.by.category');

Route::get('/search/books', [DashboardController::class, 'searchBooks'])->name('search.books');

Route::get('/show/{slug}', [DashboardController::class, 'show'])->name('peminjam.show');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'useRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin.dashboard');

    Route::get('/admin/kategori', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/admin/kategori/search', [KategoriController::class, 'search'])->name('kategori.search');
    Route::get('/admin/kategori/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/admin/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/admin/kategori/{id}', [KategoriController::class, 'show'])->name('kategori.show');
    Route::get('/admin/kategori/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/admin/kategori/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/admin/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/admin/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/admin/buku/search', [BukuController::class, 'search'])->name('buku.search');
    Route::get('/admin/buku/export-pdf', [BukuController::class, 'exportPdf'])->name('buku.exportPdf');
    Route::get('/admin/buku/export-excel', [BukuController::class, 'exportExcel'])->name('buku.exportExcel');
    Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/admin/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/admin/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/admin/buku/{id}/remove-sampul', [BukuController::class, 'removeSampul'])->name('buku.remove_sampul');
    Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/admin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/admin/users/search', [UserController::class, 'search'])->name('users.search');
    Route::get('/admin/users/export-pdf', [UserController::class, 'exportPdf'])->name('users.exportPdf');
    Route::get('/admin/users/export-excel', [UserController::class, 'exportExcel'])->name('users.exportExcel');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/admin/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/admin/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/admin/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/admin/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/admin/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjamanForm'])->name('admin.peminjaman.create');
    Route::post('/admin/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjaman'])->name('admin.peminjaman.store');
    Route::get('/admin/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/admin/peminjaman/export-pdf', [AdminPeminjamanController::class, 'exportPdf'])->name('admin.peminjaman.exportPdf');
    Route::get('/admin/peminjaman/export-excel', [AdminPeminjamanController::class, 'exportExcel'])->name('admin.peminjaman.exportExcel');
    Route::get('/admin/peminjaman/search', [AdminPeminjamanController::class, 'search'])->name('admin.peminjaman.search');
    Route::post('/admin/peminjaman/{id}', [AdminPeminjamanController::class, 'tolakbuku'])->name('admin.peminjaman.tolak');
    Route::get('/admin/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::get('/admin/ulasan/export-pdf', [UlasanController::class, 'exportPdf'])->name('ulasan.exportPdf');
    Route::get('/admin/ulasan/export-excel', [UlasanController::class, 'exportExcel'])->name('ulasan.exportExcel');
    Route::delete('/admin/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});

Route::middleware(['auth', 'useRole:petugas'])->group(function () {
    Route::get('/petugas', [PetugasController::class, 'showPetugasForm'])->name('petugas.dashboard');

    Route::get('/petugas/kategori', [PetugasKategoriController::class, 'index'])->name('petugas.kategori.index');
    Route::get('/petugas/kategori/search', [PetugasKategoriController::class, 'search'])->name('petugas.kategori.search');
    Route::get('/petugas/kategori/create', [PetugasKategoriController::class, 'create'])->name('petugas.kategori.create');
    Route::post('/petugas/kategori', [PetugasKategoriController::class, 'store'])->name('petugas.kategori.store');
    Route::get('/petugas/kategori/{id}', [PetugasKategoriController::class, 'show'])->name('petugas.kategori.show');
    Route::get('/petugas/kategori/{id}/edit', [PetugasKategoriController::class, 'edit'])->name('petugas.kategori.edit');
    Route::put('/petugas/kategori/{id}', [PetugasKategoriController::class, 'update'])->name('petugas.kategori.update');
    Route::delete('/petugas/kategori/{id}', [PetugasKategoriController::class, 'destroy'])->name('petugas.kategori.destroy');

    Route::get('/petugas/buku', [PetugasBukuController::class, 'index'])->name('petugas.buku.index');
    Route::get('/petugas/buku/search', [PetugasBukuController::class, 'search'])->name('petugas.buku.search');
    Route::get('/petugas/buku/export-pdf', [PetugasBukuController::class, 'exportPdf'])->name('petugas.buku.exportPdf');
    Route::get('/petugas/buku/export-excel', [BukuController::class, 'exportExcel'])->name('petugas.buku.exportExcel');
    Route::get('/petugas/buku/create', [PetugasBukuController::class, 'create'])->name('petugas.buku.create');
    Route::post('/petugas/buku', [PetugasBukuController::class, 'store'])->name('petugas.buku.store');
    Route::get('/petugas/buku/{id}/edit', [PetugasBukuController::class, 'edit'])->name('petugas.buku.edit');
    Route::put('/petugas/buku/{id}', [PetugasBukuController::class, 'update'])->name('petugas.buku.update');
    Route::get('/petugas/buku/{id}/remove-sampul', [PetugasBukuController::class, 'removeSampul'])->name('petugas.buku.remove_sampul');
    Route::delete('/petugas/buku/{id}', [PetugasBukuController::class, 'destroy'])->name('petugas.buku.destroy');

    Route::get('/petugas/peminjaman/create', [PetugasPeminjamanController::class, 'createPeminjamanForm'])->name('petugas.peminjaman.create');
    Route::post('/petugas/peminjaman/create', [PetugasPeminjamanController::class, 'createPeminjaman'])->name('petugas.peminjaman.store');
    Route::get('/petugas/peminjaman', [PetugasPeminjamanController::class, 'index'])->name('petugas.peminjaman.index');
    Route::get('/petugas/peminjaman/export-pdf', [PetugasPeminjamanController::class, 'exportPdf'])->name('petugas.peminjaman.exportPdf');
    Route::get('/petugas/peminjaman/export-excel', [PetugasPeminjamanController::class, 'exportExcel'])->name('petugas.peminjaman.exportExcel');
    Route::get('/petugas/peminjaman/search', [PetugasPeminjamanController::class, 'search'])->name('petugas.peminjaman.search');
    Route::post('/petugas/peminjaman/{id}', [PetugtasPeminjamanController::class, 'tolakbuku'])->name('petugas.peminjaman.tolak');
    Route::get('/petugas/ulasan', [PetugasUlasanController::class, 'index'])->name('petugas.ulasan.index');
    Route::get('/petugas/ulasan/export-pdf', [PetugasUlasanController::class, 'exportPdf'])->name('petugas.ulasan.exportPdf');
    Route::get('/petugas/ulasan/export-excel', [PetugasUlasanController::class, 'exportExcel'])->name('petugas.ulasan.exportExcel');
    Route::delete('/petugas/ulasan/{id}', [PetugasUlasanController::class, 'destroy'])->name('petugas.ulasan.destroy');
});

Route::middleware(['auth', 'useRole:peminjam'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile.index');
    Route::post('/profile/upload-photo', [ProfileController::class, 'uploadPhoto'])->name('profile.upload-photo');
    Route::put('/profile/update', [ProfileController::class, 'updateProfile'])->name('profile.update');
    Route::post('/pinjam/{id}', [PeminjamanController::class, 'pinjamBuku'])->name('peminjam.buku');
    Route::post('/pengembalian/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('pengembalian.buku');
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/add/comment/{id}', [DashboardController::class, 'addComment'])->name('add.comment');
    Route::get('/comment/{id}/edit', [DashboardController::class, 'editComment'])->name('comment.edit');
    Route::put('/comment/{id}/update', [DashboardController::class, 'updateComment'])->name('comment.update');
    Route::delete('/comment/{id}/delete', [DashboardController::class, 'deleteComment'])->name('comment.delete');
});


