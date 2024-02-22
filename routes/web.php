<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BukuController;
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


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register')->middleware('guest');

Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth', 'useRole:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'showAdminForm'])->name('admin.dashboard');
    Route::get('/buku',[BukuController::class, 'index']);
    Route::get('/buku/create',[BukuController::class, 'create']);
});

Route::middleware(['auth', 'useRole:petugas'])->group(function () {

});
Route::middleware(['auth', 'useRole:peminjam'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});

