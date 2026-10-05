<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CaseController;
use Illuminate\Support\Facades\Route;

// Public routes of the application
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
Route::get('/cases/{case}', [CaseController::class, 'show'])->name('cases.show');

// Management routes (logged-in users)
// CRUD for cases
Route::get('admin/cases', [App\Http\Controllers\Admin\CaseController::class, 'index'])->name('admin.cases.index');

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
