<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

// Download pdf
Route::get('/download/ktp/{filename}', [PDFController::class, 'downloadKTP'])->name('download.ktp');
Route::get('/download/ktm/{filename}', [PDFController::class, 'downloadKTM'])->name('download.ktm');
Route::get('/download/proposal/{filename}', [PDFController::class, 'downloadProposal'])->name('download.proposal');
Route::get('/download/permohonan/{filename}', [PDFController::class, 'downloadPermohonan'])->name('download.permohonan');

Route::get('/', function () {
    return redirect('/login');
});

Route::get('/lamaran', [ApplicationController::class, 'create'])->middleware(['auth', 'verified'])->name('lamaran');
Route::post('/lamaran', [ApplicationController::class, 'store'])->middleware(['auth', 'verified']);
Route::get('/lamaran/{lamaran}', [ApplicationController::class, 'show'])->middleware(['auth', 'verified', 'can:view,lamaran']);

Route::get('/lamaran/{lamaran}/edit', [ApplicationController::class, 'edit'])->middleware(['auth', 'verified', 'can:hanyaAdmin']);
Route::put('/lamaran/{lamaran}', [ApplicationController::class, 'update'])->middleware(['auth', 'verified', 'can:update,lamaran']);

Route::get('/riwayat', [ApplicationController::class, 'index'])->middleware(['auth', 'verified'])->name('riwayat');
Route::get('/data', [ApplicationController::class, 'index'])->middleware(['auth', 'verified', 'can:hanyaAdmin'])->name('data');
Route::post('/data', [ApplicationController::class, 'index'])->middleware(['auth', 'verified', 'can:hanyaAdmin'])->name('prosesData');

Route::delete('/data/{lamaran}', [ApplicationController::class, 'destroy'])->middleware(['auth', 'verified', 'can:delete,lamaran']);

Route::get('/data/{lamaran}/edit', [ApplicationController::class, 'editAll'])->middleware(['auth', 'verified', 'can:hanyaAdmin']);
Route::put('/data/{lamaran}', [ApplicationController::class, 'updateAll'])->middleware(['auth', 'verified', 'can:update,lamaran']);

Route::post('/filter', [ApplicationController::class, 'filter']);
Route::get('/filter', [ApplicationController::class, 'filterIndex'])->middleware(['auth', 'verified', 'can:hanyaAdmin']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
