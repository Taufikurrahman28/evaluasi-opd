<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeriodikController;
use App\Http\Controllers\SubkategoriController;

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
    return view('auth.login');
});

Route::middleware('auth')->group(function() {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('periodik',PeriodikController::class);

    Route::resource('kategori',KategoriController::class);

    Route::resource('sub_kategori',SubkategoriController::class);

    Route::resource('evaluasi',EvaluasiController::class);
    Route::get('/evaluasi/getSubKategori/{kategori_id}', [EvaluasiController::class, 'getSubKategori'])->name('evaluasi.getSubKategori');
    Route::get('/evaluasi/print/{evaluasi_id}', [EvaluasiController::class, 'printPDF'])->name('evaluasi.print');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
