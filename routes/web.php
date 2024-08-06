<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = auth()->user();
    return view('dashboard', compact('user'));

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::name('dashboard.')->prefix('dashboard')->group(function () {
        Route::name('admin.')->prefix('admin')->group(function () {

            Route::name('course.')->prefix('course')->group(function () {
                Route::get('', [CourseController::class, 'index'])->name('index');
                Route::get('create', [CourseController::class, 'create'])->name('create');
                Route::post('store', [CourseController::class, 'store'])->name('store');
                Route::get('edit/{id}', [CourseController::class, 'edit'])->name('edit');
                Route::post('edit/{id}', [CourseController::class, 'update'])->name('update');
                Route::get('details/{id}', [CourseController::class, 'show'])->name('show');
                Route::get('{id}', [CourseController::class, 'destroy'])->name('destroy');
            });

        });

        
        Route::name('user.')->prefix('user')->group(function () {});
    });
});

require __DIR__.'/auth.php';
