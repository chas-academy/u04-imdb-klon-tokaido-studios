<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;
use App\Models\Genre;

class GameController extends Controller
{
    
    public function index()
    {
        $games = Game::all();
        return view('games.index', ['games' => $games]);
    }

    public function search(Request $request)
    {
        $title = $request->input('title');
        $games = Game::where('title', 'like', '%' . $title . '%')->get();
        return view('games.search', ['games' => $games]);
    }

    public function createGame()
    {
        $genres = Genre::all();
        return view('games.create', compact('genres'));
    }

    public function storeGame(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|url',
            'trailer' => 'nullable|url',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,genreID',
        ]);

        $game = Game::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'trailer' => $validatedData['trailer'],
        ]);

        $game->genres()->attach($validatedData['genres']);

        return redirect()->route('games.index')->with('success', 'Spelet har skapats och kopplats till valda genrer!');
    }

    public function editGame($gameID)
    {
        $game = Game::findOrFail($gameID);
        $genres = Genre::all();
        return view('games.edit', compact('game', 'genres'));
    }

    public function updateGame(Request $request, $gameID)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|url',
            'trailer' => 'nullable|url',
            'genres' => 'required|array',
            'genres.*' => 'exists:genres,genreID',
        ]);

        $game = Game::findOrFail($gameID);
        $game->update([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'image' => $validatedData['image'],
            'trailer' => $validatedData['trailer'],
        ]);

        $game->genres()->sync($validatedData['genres']);

        return redirect()->route('games.index')->with('success', 'Spelet har uppdaterats och genrer har synkroniserats!');
    }

    public function deleteGame($gameID)
    {
        $game = Game::findOrFail($gameID);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Spelet har tagits bort!');
    }
}