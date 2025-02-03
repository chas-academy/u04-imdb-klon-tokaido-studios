<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SignupController;

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
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;

// Förstasidan där sökfältet och länkar till 3 första routes nedan kan finnas
Route::get('/', function () {
    return view('home');
})->name('home');


// SIGNUP
Route::get('/signup', function () {
    return view('signup.signup'); // Motsvarar resources/views/signup/signup.blade.php
})->name('signup');
Route::post('/signup', [SignupController::class, 'registerUser'])->name('registerUser');


// Nya routes för GameController
Route::get('/games/create', [GameController::class, 'createGame'])->name('games.create');
Route::post('/games', [GameController::class, 'storeGame'])->name('games.store');
Route::get('/games/{gameID}/edit', [GameController::class, 'editGame'])->name('games.edit');
Route::put('/games/{gameID}', [GameController::class, 'updateGame'])->name('games.update');
Route::delete('/games/{gameID}', [GameController::class, 'deleteGame'])->name('games.destroy');



// Route till games sidan
Route::get('/games', [GameController::class, 'index'])->name('games.index');

// Route till genres sidan
Route::get('/genres', [GenreController::class, 'index'])->name('genres.index');

// Route till gamessidan baserat på vilken genre användaren har valt
Route::get('/genres/{id}/games', [GenreController::class, 'showGames'])->name('genres.games');

// Route för search
Route::get('/search', [GameController::class, 'search'])->name('search');





// Route för att bli omdirigerad till login.blade.php
Route::view('/login', 'login.login')->name('login');

// Skicka formuläret med POST metod till funktion logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

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

// Skicka formuläret med POST metod till funktion login
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Skickar Admin användaren till admin.dashboard
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard')->middleware('auth', 'admin');

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