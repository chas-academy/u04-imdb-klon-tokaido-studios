<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;

/* LÄMNAS UT KOMMENTERAT FÖR FRAMTIDA IMPELEMENTERING */
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

// Route för att bli omdirigerad till login.blade.php
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');

// Skicka formuläret med POST metod till publik funktion login
Route::post('/login', [AuthController::class, 'login']);

// Skicka formuläret med POT metod till publik funktion logout
Route::post('/login', [AuthController::class, 'logout'])->name('logout');