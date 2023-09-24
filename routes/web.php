<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\ReportListController;
use App\Http\Controllers\Admin\ReportSiswaController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\InboxController;

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

        Route::get('my-report/cancel', [ReportSiswaController::class, 'cancel'])->name('my-report.cancel');
        Route::get('my-report/pending', [ReportSiswaController::class, 'pending'])->name('my-report.pending');
        Route::get('my-report/solve', [ReportSiswaController::class, 'solve'])->name('my-report.solve');

        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    });

    Route::middleware('role:super admin|admin')->group(function () {
        Route::middleware('role:super admin')->group(function () {
            route::prefix('account')->as('account.')->group(function () {
                Route::resource('admin', AdminController::class)->parameters([
                    'admin' => 'user'
                ])->except('show');
                Route::resource('student', StudentController::class)->except('show');
            });
        });

        Route::middleware('role:admin')->group(function () {
            Route::get('inbox', InboxController::class)->name('inbox.index');
            Route::post('report/{report}/restore', [ReportListController::class, 'restore'])->name('report.restore')->withTrashed();
        });

        Route::get('report/cancel', [ReportListController::class, 'cancel'])->name('report.cancel');
        Route::get('report/pending', [ReportListController::class, 'pending'])->name('report.pending');
        Route::get('report/solve', [ReportListController::class, 'solve'])->name('report.solve');

        Route::resource('report', ReportListController::class)->except('show');
    });

    Route::get('report/{report}', [ReportListController::class, 'show'])->name('report.show')->withTrashed();

    Route::post('/report/{report}/comments', [CommentController::class, 'store'])->name('comment.store');
    Route::post('/report/{report}/{comment}/reply', [CommentController::class, 'reply'])->name('comment.reply');
    Route::delete('/report/{report}/{comment}/delete', [CommentController::class, 'destroy'])->name('comment.destroy');
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});

require __DIR__ . '/auth.php';
