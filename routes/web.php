<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

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

// Training System Routes
Route::get('/', [TrainingController::class, 'index'])->name('home');
Route::get('/jadwal', [TrainingController::class, 'schedule'])->name('schedule');
Route::get('/materi', [TrainingController::class, 'materials'])->name('materials');
Route::get('/tentang-kami', [TrainingController::class, 'about'])->name('about');
Route::get('/links', [TrainingController::class, 'links'])->name('links');
Route::get('/materi/pendahuluan', [TrainingController::class, 'pendahuluan'])->name('pendahuluan');
Route::get('/materi/organisasi-pengolahan', [TrainingController::class, 'organisasiPengolahan'])->name('organisasi-pengolahan');
Route::get('/materi/mekanisme-pengolahan', [TrainingController::class, 'mekanismePengolahan'])->name('materi-mekanisme-pen');
Route::get('/materi/sipw-se2026', [TrainingController::class, 'sipwSe2026'])->name('sipw-se2026');
Route::get('/materi/pengolahan-peta', [TrainingController::class, 'pengolahanPeta'])->name('pengolahan-peta');
Route::get('/materi/pengolahan-peta/penyiapan-detail', [TrainingController::class, 'penyiapanPengolahanDetail'])->name('penyiapan-pengolahan-detail');
Route::get('/materi/pengolahan-peta/penyiapan-bahan-detail', [TrainingController::class, 'penyiapanBahanDetail'])->name('penyiapan-bahan-detail');
Route::get('/materi/pengolahan-peta/georeferensi-peta-detail', [TrainingController::class, 'georeferensiPetaDetail'])->name('georeferensi-peta-detail');
Route::get('/materi/pengolahan-peta/editing-peta-digital-detail', [TrainingController::class, 'editingPetaDigitalDetail'])->name('editing-peta-digital-detail');
Route::get('/materi/pengolahan-peta/cleaning-validasi-detail', [TrainingController::class, 'cleaningValidasiDetail'])->name('cleaning-validasi-detail');
Route::get('/materi/pengolahan-peta/dissolving-peta-detail', [TrainingController::class, 'dissolvingPetaDetail'])->name('dissolving-peta-detail');
