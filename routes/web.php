<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Middleware\UserMiddleware;
use App\Http\Middleware\AdminMiddleware;



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

    // LOGIN
    Route::view('/login', 'auth.login')->name('login');
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


// INLOGGAD ANVÄNDARE BEHÖRIGHETER
Route::middleware(UserMiddleware::class)->group(function ()
{
    Route::resource('reviews', ReviewController::class)->except(['index', 'show']);

    Route::get('/games/{game}/review', [ReviewController::class, 'showReview'])
    ->name('reviews.game_review');

    Route::get('/games/{game}/review/create', [ReviewController::class, 'create'])
    ->name('reviews.create');

    Route::prefix('profile')->group(function()
    {
        Route::get('/', [UserController::class, 'showProfile'])
        ->name('users.profile');
    
        Route::get('/reviews', [UserController::class, 'showReviews'])
        ->name('users.reviews');
    
        Route::get('/lists', [UserController::class, 'showLists'])
        ->name('users.lists');
    
        Route::delete('/', [UserController::class, 'destroy'])
        ->name('users.destroy');
    });
});

// ADMIN BEHÖRIGHETER
Route::middleware(['auth', AdminMiddleware::class])->group(function()
{
    Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])
    ->name('admin.dashboard');

    Route::prefix('games')->group(function()
    {
        Route::get('/', [GameController::class, 'createGame'])
        ->name('games.create');

        Route::post('/', [GameController::class, 'storeGame'])
        ->name('games.store');

        Route::get('/{gameID}/edit', [GameController::class, 'editGame'])
        ->name('games.edit');

        Route::put('/{gameID}', [GameController::class, 'updateGame'])
        ->name('games.update');

        Route::delete('/{gameID}', [GameController::class, 'deleteGame'])
        ->name('games.destroy');
    });
});

/*
// routs till listor
Route::middleware(['auth'])->group(function () {
    // Visa alla listor för den inloggade användaren
    Route::get('/user/lists', [UserListController::class, 'index'])
    ->name('user.lists');
    
    // Skapa en ny lista
    Route::get('/user/list/create', [UserListController::class, 'createList'])
    ->name('user.createList');

    Route::post('/user/list', [UserListController::class, 'storeList'])
    ->name('user.storeList');
    
    // Redigera en lista
    Route::get('/user/list/{listID}/edit', [UserListController::class, 'editList'])
    ->name('user.editList');

    Route::put('/user/list/{listID}', [UserListController::class, 'updateList'])
    ->name('user.updateList');
    
    // Ta bort en lista
    Route::delete('/user/list/{listID}', [UserListController::class, 'deleteList'])
    ->name('user.deleteList');
    
    // Visa listor för en viss användare via userID
    Route::get('/user/{userID}/lists', [UserListController::class, 'showlists'])
    ->name('user.showlists');
});*/

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


/*
// routs till listor
Route::middleware(['auth'])->group(function () {
    // Visa alla listor för den inloggade användaren
    Route::get('/user/lists', [UserListController::class, 'index'])
    ->name('user.lists');
    
    // Skapa en ny lista
    Route::get('/user/list/create', [UserListController::class, 'createList'])
    ->name('user.createList');

    Route::post('/user/list', [UserListController::class, 'storeList'])
    ->name('user.storeList');
    
    // Redigera en lista
    Route::get('/user/list/{listID}/edit', [UserListController::class, 'editList'])
    ->name('user.editList');

    Route::put('/user/list/{listID}', [UserListController::class, 'updateList'])
    ->name('user.updateList');
    
    // Ta bort en lista
    Route::delete('/user/list/{listID}', [UserListController::class, 'deleteList'])
    ->name('user.deleteList');
    
    // Visa listor för en viss användare via userID
    Route::get('/user/{userID}/lists', [UserListController::class, 'showlists'])
    ->name('user.showlists');
});*/

// Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    /* BORTTAGNA */
    // Route::get('/login', [LoginController::class, 'login'])->name('login');
   // Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

   
// Skicka formuläret med POST metod till funktion logout
// Route::post('/logout', [AuthController::class, 'logout'])->name('logout');



require __DIR__.'/auth.php';