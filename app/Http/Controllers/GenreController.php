<?php

namespace App\Http\Controllers;

use App\Models\Genre;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('genres.index', ['genres' => $genres]);
    }

    public function showGames($id)
    {
        $genre = Genre::findOrFail($id);
        $games = $genre->games;
        return view('genres.games', ['genre' => $genre, 'games' => $games]);
    }
}