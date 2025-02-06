<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Platform;

class PlatformController extends Controller
{
    public function index()
    {
        $platforms = Platform::all();
        return view("platforms.index", ["platforms" => $platforms]);
    }

    public function showPlatforms($id)
    {
        $platform = Platform::findOrFail($id);
        $games = $platform->games;
        return view("platforms.games",["platform" => $platform, "games" => $games]);
    }
}
