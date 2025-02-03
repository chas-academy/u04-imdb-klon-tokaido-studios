<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

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

// Nya routes för GameController
Route::get('/games/create', [GameController::class, 'createGame'])->name('games.create');
Route::post('/games', [GameController::class, 'storeGame'])->name('games.store');
Route::get('/games/{gameID}/edit', [GameController::class, 'editGame'])->name('games.edit');
Route::put('/games/{gameID}', [GameController::class, 'updateGame'])->name('games.update');
Route::delete('/games/{gameID}', [GameController::class, 'deleteGame'])->name('games.destroy');

Route::resource('reviews', ReviewController::class)->except(['index', 'show']);
Route::get('/games/{game}/review', [ReviewController::class, 'showReview'])->name('reviews.game_review');
Route::get('/games/{game}/review/create', [ReviewController::class, 'create'])->name('reviews.create');

// testa för inkompletta UserController
Route::middleware(['simulate.auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'showProfile'])->name('users.profile');
    Route::get('/profile/reviews', [UserController::class, 'showReviews'])->name('users.reviews');
    Route::get('/profile/lists', [UserController::class, 'showLists'])->name('users.lists');
    Route::delete('/profile', [UserController::class, 'destroy'])->name('users.destroy');
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

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