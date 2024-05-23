<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TimeEntryController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', [HomeController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Project routes
    Route::resource('projects', ProjectController::class);

    // Task routes
    Route::resource('projects.tasks', TaskController::class);

    // TimeEntry routes (general and task-specific)
    Route::resource('time_entries', TimeEntryController::class)->except(['create', 'store']);
    Route::get('time_entries/create', [TimeEntryController::class, 'create'])->name('time_entries.create');
    Route::post('time_entries', [TimeEntryController::class, 'store'])->name('time_entries.store');

    // Admin dashboard
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [HomeController::class, 'index'])->name('admin.dashboard');
    });
});

require __DIR__ . '/auth.php';
