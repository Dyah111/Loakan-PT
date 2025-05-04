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


    //Route Buku
    Route::get('/buku', [BukuController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('buku.index');

    // Route Elektronik
    Route::get('/elektronik', [ElektronikController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('elektronik.index');

    // Route Furnitur
    Route::get('/furnitur', [FurniturController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('furnitur.index');

    // Route Barang Lainnya
    Route::get('/lainnya', [LainnyaController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('lainnya.index');

    // Route MakeUp
    Route::get('/makeup', [MakeUpController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('makeup.index');

    // Route Pakaian
    Route::get('/pakaian', [PakaianController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('pakaian.index');

    Route::get('/forum', [ForumController::class, 'index'])
    ->name('forum.index');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
