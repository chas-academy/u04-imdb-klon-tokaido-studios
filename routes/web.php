<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;


// Hem- och söksida
Route::get('/', [GameController::class, 'home'])->name('home');
Route::get('/search', [GameController::class, 'search'])->name('search');

// Spel-relaterade routes
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Genre-relaterade routes
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');
Route::get('/genres/{id}/games', [GenreController::class, 'showGames'])->name('genres.games');

/*
Route::get('/', function () {
    return view('home');
});

// Lista alla spel och sök efter spel baserat på titel
Route::get('/games', [GameController::class, 'index']);

// Lista alla genrer
Route::get('/genres', [GenreController::class, 'index']);

Route::get('/search', [GameController::class, 'search']);

// Lista spel som tillhör en viss genre
Route::get('/genres/{id}/games', [GenreController::class, 'games']);


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; */
