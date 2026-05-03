<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\MarkController;
use App\Http\Controllers\DashboardController;


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');


Route::middleware('auth')->group(function () {
    
    // profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // student
    Route::get('/students', [StudentController::class, 'index'])->name('student.index');
    Route::get('/students/create', [StudentController::class, 'create'])->name('student.create');
    Route::post('/students', [StudentController::class, 'store'])->name('student.store');
    Route::get('/students/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/students/{id}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/students/{id}', [StudentController::class, 'destroy'])->name('student.destroy');

    // subject
    Route::get('/subjects', [SubjectController::class, 'index'])->name('subject.index');
    Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subject.create');
    Route::post('/subjects', [SubjectController::class, 'store'])->name('subject.store');
    Route::get('/subjects/{id}/edit', [SubjectController::class, 'edit'])->name('subject.edit');
    Route::put('/subjects/{id}', [SubjectController::class, 'update'])->name('subject.update');
    Route::delete('/subjects/{id}', [SubjectController::class, 'destroy'])->name('subject.destroy');

    // marks
    Route::get('/marks', [MarkController::class, 'index'])->name('marks.index');
    Route::get('/marks/create', [MarkController::class, 'create'])->name('marks.create');
    Route::post('/marks', [MarkController::class, 'store'])->name('marks.store');
    Route::get('/marks/{id}/edit', [MarkController::class, 'edit'])->name('marks.edit');
    Route::put('/marks/{id}', [MarkController::class, 'update'])->name('marks.update');
    Route::delete('/marks/{id}', [MarkController::class, 'destroy'])->name('marks.destroy');
    Route::get('/results', [MarkController::class, 'results'])->name('results');
    Route::get('/analysis/{id}', [MarkController::class, 'pythonAnalysis'])->name('analysis');
});



require __DIR__.'/auth.php';
