<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request, Game $game)
    {
        $validated = $request->validate([
            'Title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $review = $game->reviews()->create([
            'Title' => $validated['Title'],
            'description' => $validated['description'],
            'userID' => auth()->id(),
        ]);

        return redirect()->route('games.show', $game);
    }

    public function update(Request $request, Review $review)
    {
        $validated = $request->validate([
            'Title' => 'required|max:255',
            'description' => 'nullable',
        ]);

        $review->update($validated);

        return redirect()->route('games.show', $review->game);
    }

    public function destroy(Review $review)
    {
        $game = $review->game;
        $review->delete();
        return redirect()->route('games.show', $game);
    }
}
