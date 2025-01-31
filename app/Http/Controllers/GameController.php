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
    
}