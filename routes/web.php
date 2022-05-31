<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SiswaController::class, 'index'])->name('home');

Route::get('/create', [SiswaController::class, 'create'])->name('siswa.tambah-data');
Route::post('/create-data', [SiswaController::class, 'store'])->name('siswa.buat-data');

Route::get('/edit/{id}', [SiswaController::class, 'edit'])->name('siswa.edit');
Route::post('/update/{id}', [SiswaController::class, 'update'])->name('siswa.update');

Route::delete('/delete/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

Route::get('/detail/{id}', [SiswaController::class, 'show'])->name('siswa.show');