<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('admin.')->prefix('admin')->group(function () {

            Route::name('course.')->prefix('course')->group(function () {
                Route::post('store', [CourseController::class, 'store'])->name('store');
            });
        });

        
        Route::name('user.')->prefix('user')->group(function () {});
    });
});

require __DIR__.'/auth.php';
