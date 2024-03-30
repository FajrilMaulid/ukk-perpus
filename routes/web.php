<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\KoleksiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\AdminPeminjamanController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/show/{id}', [DashboardController::class, 'show'])->name('peminjam.show');

Route::post('/pinjam/{id}', [PeminjamanController::class, 'pinjamBuku'])->name('peminjam.buku');

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
    Route::delete('/kategori/{id}', [KategoriController::class, 'destroy'])->name('kategori.destroy');

    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::get('/buku/{id}/remove-sampul', [BukuController::class, 'removeSampul'])->name('buku.remove_sampul');
    Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::get('/users/{id}', [UserController::class, 'show'])->name('users.show');
    Route::get('/users/{id}/edit', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjamanForm'])->name('admin.peminjaman.create');
    Route::post('/peminjaman/create', [AdminPeminjamanController::class, 'createPeminjaman'])->name('admin.peminjaman.store');
    Route::get('/peminjaman', [AdminPeminjamanController::class, 'index'])->name('admin.peminjaman.index');
    Route::get('/ulasan', [UlasanController::class, 'index'])->name('ulasan.index');
    Route::delete('/ulasan/{id}', [UlasanController::class, 'destroy'])->name('ulasan.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::post('/pengembalian/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('pengembalian.buku');
    Route::get('/koleksi', [KoleksiController::class, 'index'])->name('koleksi.index');
    Route::post('/add/comment/{id}', [DashboardController::class, 'addComment'])->name('add.comment');
    Route::get('/comment/{id}/edit', [DashboardController::class, 'editComment'])->name('comment.edit');
    Route::put('/comment/{id}/update', [DashboardController::class, 'updateComment'])->name('comment.update');
    Route::delete('/comment/{id}/delete', [DashboardController::class, 'deleteComment'])->name('comment.delete');
});



