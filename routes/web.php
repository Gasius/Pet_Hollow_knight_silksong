<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuestController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return redirect()->route('quests.index');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/games/create', [QuestController::class, 'create'])->name('games.create');
    Route::post('/games', [QuestController::class, 'store'])->name('games.store');

    Route::get('/games/{game}/edit', [QuestController::class, 'edit'])->name('games.edit');
    Route::patch('/games/{game}', [QuestController::class, 'update'])->name('games.update');
    Route::delete('/games/{game}', [QuestController::class, 'destroy'])->name('games.destroy');
});

Route::get('/quests', [QuestController::class, 'index'])->name('quests.index');
Route::get('/quests/{quest}', [QuestController::class, 'show'])->name('quests.show');

require __DIR__.'/auth.php';
