<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;


// Förstasidan där sökfältet och länkar till 3 första routes nedan kan finnas
Route::get('/', function () {
    return view('home');
});

// visar en sida där spelen som matchar sökresultatet kan visas upp
Route::get('/search', [GameController::class, 'search'])->name('search');

// visar en sida där alla spel kan visas upp
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Visar en sida där alla genres kan visas upp
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

// Visar en sida där alla spel i en genre kan visas
Route::get('/genres/{id}/games', [GenreController::class, 'showGames'])->name('genres.games');

/*

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php'; 

*/
