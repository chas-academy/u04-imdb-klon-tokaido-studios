<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        return Genre::all();
    }

    public function games($id)
    {
        $genre = Genre::findOrFail($id);
        return $genre->games;
    }
}