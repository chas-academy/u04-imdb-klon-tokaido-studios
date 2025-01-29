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

    public function show($id)
    {
        $game = Game::with(['reviews.user', 'lists'])->findOrFail($id);
        return view('games.show', ['game' => $game]);
    }

    public function addToList(Request $request, $id)
    {
        $listId = $request->input('listID');
        
        $game = Game::findOrFail($id);
        $game->lists()->attach($listId);

        return redirect()->route('games.show', $id)->with('success', 'Spelet har lagts till i listan!');
    }
}