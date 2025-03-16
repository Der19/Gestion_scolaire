<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EleveController;
use App\Http\Controllers\EnseignantController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

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
});

// Routes spécifiques pour chaque type d'utilisateur après connexion
Route::middleware(['auth'])->group(function () {
    Route::get('/eleve/dashboard', [EleveController::class, 'index'])->name('eleve.dashboard');
    Route::get('/enseignant/dashboard', [EnseignantController::class, 'index'])->name('enseignant.dashboard');
    Route::get('/parent/dashboard', [ParentController::class, 'index'])->name('parent.dashboard');
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
});

require __DIR__.'/auth.php';
