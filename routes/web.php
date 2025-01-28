<?php

//use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;
use App\Http\Controllers\GenreController;


// Förstasidan där sökfältet och länkar till 3 första routes nedan kan finnas
Route::get('/', function () {
    return view('home');
});

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


Route::get('/genres', function () {
    return view('genres.index');
});

Route::get('/genres/{id}/games', function ($id) {
    return view('genres.show');
});

Route::get('/search', [SearchController::class, 'index'])->name('search');