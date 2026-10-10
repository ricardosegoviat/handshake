<?php

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CaseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConsultantController;
use App\Http\Controllers\TopicController;

// Public routes of the application
Route::get('/', [WelcomeController::class, 'index']);
Route::get('/cases', [CaseController::class, 'index'])->name('cases.index');
Route::get('/cases/{case}', [CaseController::class, 'show'])->name('cases.show');
Route::get('/consultants', [ConsultantController::class, 'index'])->name('consultants.index');
Route::get('/consultants/{user}', [ConsultantController::class, 'show'])->name('consultants.show');
Route::get('/topics', [TopicController::class, 'index'])->name('topics.index');
Route::get('/topics/{topic}', [TopicController::class, 'show'])->name('topics.show');

// Management routes (logged-in users)
// CRUD for cases
Route::middleware(['auth'])->group(function () {
    Route::get('admin/cases', [App\Http\Controllers\Admin\CaseController::class, 'index'])->name('admin.cases.index');
    Route::get('admin/cases/create', [App\Http\Controllers\Admin\CaseController::class, 'create'])->name('admin.cases.create');
    Route::post('admin/cases', [App\Http\Controllers\Admin\CaseController::class, 'store'])->name('admin.cases.store');
    Route::get('admin/cases/{case}/edit', [App\Http\Controllers\Admin\CaseController::class, 'edit'])->name('admin.cases.edit');
    Route::put('admin/cases/{case}', [App\Http\Controllers\Admin\CaseController::class, 'update'])->name('admin.cases.update');
    Route::delete('admin/cases/{case}', [App\Http\Controllers\Admin\CaseController::class, 'destroy'])->name('admin.cases.destroy');

    // CRUD for topics
    Route::get('admin/topics', [App\Http\Controllers\Admin\TopicController::class, 'index'])->name('admin.topics.index');
    Route::get('admin/topics/create', [App\Http\Controllers\Admin\TopicController::class, 'create'])->name('admin.topics.create');
    Route::post('admin/topics', [App\Http\Controllers\Admin\TopicController::class, 'store'])->name('admin.topics.store');
    Route::get('admin/topics/{topic}/edit', [App\Http\Controllers\Admin\TopicController::class, 'edit'])->name('admin.topics.edit');
    Route::put('admin/topics/{topic}', [App\Http\Controllers\Admin\TopicController::class, 'update'])->name('admin.topics.update');
    Route::delete('admin/topics/{topic}', [App\Http\Controllers\Admin\TopicController::class, 'destroy'])->name('admin.topics.destroy');
});

Route::get('/dashboard', function () {
    return view('userzone.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [App\Http\Controllers\Userzone\ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
