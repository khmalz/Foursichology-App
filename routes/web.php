<?php

use App\Http\Controllers\Admin\ReportListController;
use App\Http\Controllers\Admin\ReportSiswaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
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

Route::get('/', fn () => view('home'))->name('home');

Route::middleware('auth')->group(function () {
    Route::middleware('role:siswa')->group(function () {
        Route::get('/pengaduan', [ReportController::class, 'index'])->name('pengaduan.index');
        Route::post('/pengaduan', [ReportController::class, 'store'])->name('pengaduan.store');

        Route::get('my-report/pending', [ReportSiswaController::class, 'pending'])->name('my-report.pending');
        Route::get('my-report/solve', [ReportSiswaController::class, 'solve'])->name('my-report.solve');
    });

    Route::middleware('role:super admin|admin')->group(function () {
        Route::get('report/pending', [ReportListController::class, 'pending'])->name('report.pending');
        Route::get('report/solve', [ReportListController::class, 'solve'])->name('report.solve');
    });

    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('report', ReportListController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
