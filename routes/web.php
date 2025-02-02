<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\UserListController;

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

// routs till listor
Route::middleware(['auth'])->group(function () {
    // Visa alla listor för den inloggade användaren
    Route::get('/user/lists', [UserListController::class, 'index'])->name('user.lists');
    
    // Skapa en ny lista
    Route::get('/user/list/create', [UserListController::class, 'createList'])->name('user.createList');
    Route::post('/user/list', [UserListController::class, 'storeList'])->name('user.storeList');
    
    // Redigera en lista
    Route::get('/user/list/{listID}/edit', [UserListController::class, 'editList'])->name('user.editList');
    Route::put('/user/list/{listID}', [UserListController::class, 'updateList'])->name('user.updateList');
    
    // Ta bort en lista
    Route::delete('/user/list/{listID}', [UserListController::class, 'deleteList'])->name('user.deleteList');
    
    // Visa listor för en viss användare via userID
    Route::get('/user/{userID}/lists', [UserListController::class, 'showlists'])->name('user.showlists');
});