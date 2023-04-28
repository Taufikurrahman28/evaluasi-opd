<?php

use App\Http\Controllers\EvaluasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PeriodikController;
use App\Http\Controllers\SubkategoriController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('test');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');



Route::resource('periodik',PeriodikController::class);

Route::resource('kategori',KategoriController::class);

Route::resource('sub_kategori',SubkategoriController::class);

Route::resource('evaluasi',EvaluasiController::class);

