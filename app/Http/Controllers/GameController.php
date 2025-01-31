<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Game;

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
        return view('games.create');
    }

    public function storeGame(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|url',
            'trailer' => 'nullable|url',
        ]);

        $game = Game::create($validatedData);

        return redirect()->route('games.index')->with('success', 'Spelet har skapats!');
    }

    public function editGame($gameID)
    {
        $game = Game::findOrFail($gameID);
        return view('games.edit', ['game' => $game]);
    }

    public function updateGame(Request $request, $gameID)
    {
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|url',
            'trailer' => 'nullable|url',
        ]);

        $game = Game::findOrFail($gameID);
        $game->update($validatedData);

        return redirect()->route('games.index')->with('success', 'Spelet har uppdaterats!');
    }

    public function deleteGame($gameID)
    {
        $game = Game::findOrFail($gameID);
        $game->delete();

        return redirect()->route('games.index')->with('success', 'Spelet har tagits bort!');
    }
}