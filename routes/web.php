<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', [UserController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {

    // ==================== USER ====================
    Route::prefix('level')->group(function () {
        Route::get('/{level}', [UserController::class, 'index'])->name('user.index');
        Route::get('/{level}/create', [UserController::class, 'updateOrCreateView'])->name('user.create');
        Route::get('/{level}/{id}/edit', [UserController::class, 'updateOrCreateView'])->name('user.edit');
        Route::post('/{level}/create', [UserController::class, 'updateOrCreate'])->name('user.store');
        Route::put('/{level}/{id}', [UserController::class, 'updateOrCreate'])->name('user.update');
        Route::delete('/{level}/{id}', [UserController::class, 'destroy'])->name('user.destroy');
    });


    // ==================== REPORT ====================
    Route::get('/reports', [ReportController::class, 'index'])->name('report.index');
    Route::get('/report/{id}', [ReportController::class, 'show'])->name('report.detail');
    Route::get('/report/edit/{id}', [ReportController::class, 'updateOrCreateView'])->name('report.edit');
    Route::get('/report', [ReportController::class, 'updateOrCreateView'])->name('report.create');
    Route::post('/report', [ReportController::class, 'updateOrCreate'])->name('report.store');
    Route::put('/report/{id}', [ReportController::class, 'updateOrCreate'])->name('report.update');
    Route::delete('/report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');


    // ==================== COMPLAINT ====================
    Route::get('/complaints', [ReportController::class, 'getComplaint'])->name('complaint.index');
    Route::get('/complaint/{id}', [ReportController::class, 'getComplaintById'])->name('complaint.show');
    Route::put('/complaint/{id}', [ReportController::class, 'update'])->name('complaint.update');
});

require __DIR__ . '/auth.php';
