<?php

use App\Http\Controllers\ElektronikController;
use App\Http\Controllers\FurniturController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\LainnyaController;
use App\Http\Controllers\MakeUpController;
use App\Http\Controllers\PakaianController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\ProdukController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProdukController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Daftar buku
Route::get('/buku', [BukuController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('buku.index');
// Form tambah buku
Route::get('/buku/create', [BukuController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('buku.create');
// Proses simpan buku
Route::post('/buku', [BukuController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('buku.store');
// Detail buku
Route::get('/buku/{id}', [BukuController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('buku.detail');
// Delete buku
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])
    ->name('buku.destroy');


// Route Elektronik
Route::get('/elektronik', [ElektronikController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('elektronik.index');
// Form tambah furnitur
Route::get('/elektronik/create', [ElektronikController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('elektronik.create');
// Proses simpan buku
Route::post('/elektronik', [ElektronikController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('elektronik.store');
// Detail buku
Route::get('/elektronik/{id}', [ElektronikController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('elektronik.detail');
// Delete buku
Route::delete('/elektronik{id}', [ElektronikController::class, 'destroy'])
    ->name('elektronik.destroy');

// Route Furnitur
Route::get('/furnitur', [FurniturController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('furnitur.index');
// Form tambah buku
Route::get('/furnitur/create', [FurniturController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('furnitur.create');
// Proses simpan buku
Route::post('/furnitur', [FurniturController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('furnitur.store');
// Detail buku
Route::get('/furnitur/{id}', [FurniturController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('furnitur.detail');
// Delete buku
Route::delete('/furnitur/{id}', [FurniturController::class, 'destroy'])
    ->name('furnitur.destroy');

// Route Barang Lainnya
Route::get('/lainnya', [LainnyaController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('lainnya.index');
// Form tambah buku
Route::get('/lainnya/create', [LainnyaController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('lainnya.create');
// Proses simpan buku
Route::post('/lainnya', [LainnyaController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('lainnya.store');
// Detail buku
Route::get('/lainnya/{id}', [LainnyaController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('lainnya.detail');
// Delete buku
Route::delete('/lainnya/{id}', [LainnyaController::class, 'destroy'])
    ->name('lainnya.destroy');

// Route MakeUp
Route::get('/makeup', [MakeUpController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('makeup.index');
// Form tambah buku
Route::get('/makeup/create', [MakeUpController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('makeup.create');
// Proses simpan buku
Route::post('/makeup', [MakeUpController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('makeup.store');
// Detail buku
Route::get('/makeup/{id}', [MakeUpController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('makeup.detail');
// Delete buku
Route::delete('/makeup/{id}', [MakeUpController::class, 'destroy'])
    ->name('makeup.destroy');

// Route Pakaian
Route::get('/pakaian', [PakaianController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('pakaian.index');
/// Form tambah buku
Route::get('/pakaian/create', [PakaianController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('pakaian.create');
// Proses simpan buku
Route::post('/pakaian', [PakaianController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('pakaian.store');
// Detail buku
Route::get('/pakaian/{id}', [PakaianController::class, 'detail'])
    ->middleware(['auth', 'verified'])->name('pakaian.detail');
// Delete buku
Route::delete('/pakaian/{id}', [PakaianController::class, 'destroy'])
    ->name('pakaian.destroy');

// Route forum
Route::get('/forum', [ForumController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('forum.index');
// Simpan Forum
Route::post('/forum', [ForumController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('forum.store');
// Delete Forum
Route::delete('/forum/{id}', [ForumController::class, 'destroy'])
    ->name('forum.destroy');


Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
