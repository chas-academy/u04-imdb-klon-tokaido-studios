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
use App\Http\Controllers\Auth\PasswordResetController;



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


Route::middleware(['auth', AdminMiddleware::class])->group(function()
{

    Route::prefix('admin')->group (function ()
    {

        Route::get('/profile', [AdminController::class, 'showProfile'])
        ->name('admin.profile');
    
        Route::get('/reviews', [AdminController::class, 'showAllReviews'])
        ->name('admin.reviews');
    
        Route::get('/lists', [AdminController::class, 'showAllLists'])
        ->name('admin.lists');
    
        Route::get('/user', [AdminController::class, 'showAllUsers'])
        ->name('admin.user');
    
        Route::get('/createUsers', [AdminController::class, 'createUsers'])
        ->name('users.create');
    
        Route::put('/editUsers/{id}', [AdminController::class, 'updateUser'])
        ->name('users.update');

        Route::get('/editUsers/{id}', [AdminController::class, 'editUser'])
        ->name('users.edit');
    
        Route::delete('/users/{id}', [AdminController::class, 'destroy'])
        ->name('users.destroy');
        
    });

});

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



// TILL FORMULÄRETS SIDA
Route::get('/registerNewUser', function () {
    return view('auth.register'); 
})->name('auth.register');





// TILL FORMULÄRETS SIDA
Route::get('/registerNewUser', function () {
    return view('auth.register'); 
})->name('auth.register');



});

// Visa alla listor för alla användare
Route::get('/lists', [UserListController::class, 'showAllLists'])->name('userlist.all');

// Route för att visa formuläret
Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

// Route för att hantera återställningen
Route::post('/reset-password', [PasswordResetController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');
require __DIR__.'/auth.php';