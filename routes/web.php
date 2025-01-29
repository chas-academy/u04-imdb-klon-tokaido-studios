<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;

// Förstasidan där sökfältet och länkar till 3 första routes nedan kan finnas
Route::get('/', function () {
    return view('home');
})->name('home');

// Route till games sidan
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Route till genres sidan
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

// Route till gamessidan baserat på vilken genre användaren har valt
Route::get('/genres/{id}/games', [GenreController::class, 'showGames'])->name('genres.games');

// Route för search
Route::get('/search', [GameController::class, 'search'])->name('search');