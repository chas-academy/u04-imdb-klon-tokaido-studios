<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/header', function () {
    return view('layouts/header');
});

Route::get('/footer', function () {
    return view('layouts/footer');
});

Route::get('/', function () {
    return view('welcome');
});

Route::get('/testLayout', function () {
    return view('testLayout');
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

Route::get('/genres', function() 
{
    return view('genres.index');

});

Route::get('/genres/{id}/games', function ($id)
{
    return view('genres.show');
});

