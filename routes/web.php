<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\PlatformController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;

use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\UserListController;




// STARTSIDA
Route::get('/', function () {
    return view('home');
})->name('home');



// AUTH PATH
Route::prefix('auth')->group(function()
{
    // TILL FORMULÄRETS SIDA
    Route::get('/registerNewUser', function () {
        return view('auth.register'); 
    })->name('registerNewUser');

    // REGISTRERA NY ANVÄNDARE
    Route::post('/registerNewUser', [RegisterController::class, 'registerUser'])
    ->name('registerUser');
    // REGISTRERA NY ANVÄNDARE
    Route::post('/registerNewUser', [RegisterController::class, 'registerUser'])
    ->name('registerUser');

    // LOGIN /*
    /*
    Route::view('/login', 'auth.login')->name('login');
    */
    Route::get('/login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('/login', [AuthenticatedSessionController::class, 'store']);
    // Logout route
    Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

});



// DELAR AV SIDAN: SPEL : KAN VISAS AV GÄST
Route::prefix('games')->group(function()
{
    // Route till games sidan
    Route::get('/index', [GameController::class, 'index'])
    ->name('games.index');

    // Route för search
    Route::get('/search', [GameController::class, 'search'])
    ->name('search');

});



// DELAR AV SIDAN: GENRE : KAN VISAS AV GÄST
Route::prefix('genres')->group(function()
    {
        // Route till genres sidan
        Route::get('/', [GenreController::class, 'index'])
        ->name('genres.index');

        // Route till gamessidan baserat på vilken genre användaren har valt
        Route::get('/{id}/games', [GenreController::class, 'showGames'])
        ->name('genres.games');

});

// DELAR AV SIDAN: PLATFORM : KAN VISAS AV GÄST
Route::prefix('platforms')->group(function()
    {
        // Route till platforms sidan
        Route::get('/', [PlatformController::class, 'index'])
        ->name('platforms.index');

        // Route till gamessidan baserat på vilken platform användaren har valt
        Route::get('/{id}/games', [PlatformController::class, 'showGames'])
        ->name('platforms.games');

});

// FÖR ATT VISA RECENSION
Route::get('/games/{game}/review', [ReviewController::class, 'showReview'])
->name('reviews.game_review');



// INLOGGAD ANVÄNDARE BEHÖRIGHETER
Route::middleware(UserMiddleware::class)->group(function ()
{
    Route::resource('reviews', ReviewController::class)->except(['index', 'show']);

    Route::get('/games/{game}/review/create', [ReviewController::class, 'create'])
    ->name('reviews.create');

    Route::prefix('profile')->group(function()
    {
        Route::get('/', [UserController::class, 'showProfile'])
        ->name('users.profile');
    
        Route::get('/reviews', [UserController::class, 'showReviews'])
        ->name('users.reviews');
    
        // Visa alla listor för den inloggade användaren
        Route::get('/lists', [UserListController::class, 'index'])
        ->name('users.lists');
    
        Route::delete('/', [UserController::class, 'destroy'])
        ->name('users.destroy');
    });
        
    Route::prefix('list')->group(function()
    {
        // Skapa en ny lista
        Route::get('/create', [UserListController::class, 'createList'])->name('userlist.create');
        Route::post('/', [UserListController::class, 'storeList'])->name('user.lists.store');
        
        // Redigera en lista
        Route::get('/{listID}/edit', [UserListController::class, 'editList'])->name('userlist.edit');
        Route::put('/{listID}', [UserListController::class, 'updateList'])->name('userlist.update');
        
        // Ta bort en lista
        Route::delete('/{listID}', [UserListController::class, 'deleteList'])->name('userlist.delete');

    });

    // ADMIN BEHÖRIGHETER
Route::middleware(['auth', AdminMiddleware::class])->group(function()
{
    Route::prefix('games')->group(function()
    {
        Route::get('/create', [GameController::class, 'createGame'])
        ->name('games.create');
        Route::post('/', [GameController::class, 'storeGame'])
        ->name('games.store');
        Route::get('/{gameID}/edit', [GameController::class, 'editGame'])
        ->name('games.edit');
        Route::put('/{gameID}', [GameController::class, 'updateGame'])
        ->name('games.update');
        Route::delete('/{gameID}', [GameController::class, 'deleteGame'])
        ->name('games.destroy');
        Route::get('/admin/profile', [AdminController::class, 'showProfile'])
        ->name('admin.profile');
        Route::get('/admin/reviews', [AdminController::class, 'showAllReviews'])
        ->name('admin.reviews');
        Route::get('/admin/lists', [AdminController::class, 'showAllLists'])
        ->name('admin.lists');
    });
});

    

});

// Visa alla listor för alla användare
Route::get('/lists', [UserListController::class, 'showAllLists'])->name('userlist.all');

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