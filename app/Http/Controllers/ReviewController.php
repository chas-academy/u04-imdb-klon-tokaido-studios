<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Models\Game;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Visar formulär för att skapa en recension
    public function create($gameID)
    {
        $game = Game::findOrFail($gameID);
        return view('reviews.create_review', compact('game'));
    }

    // Skapar en recension
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Title' => 'required|max:255',
            'description' => 'required',
            'gameID' => 'required|exists:games,gameID',
        ]);

        $review = Review::create([
            'Title' => $validatedData['Title'],
            'description' => $validatedData['description'],
            'gameID' => $validatedData['gameID'],
            'userID' => 1,
        ]);

        return redirect()->route('reviews.game_review', $review->gameID)->with('success', 'Recension skapad');
    }

    // Visar formulär för att redigera en recension
    public function edit(Review $review)
    {
        $game = $review->game;
        return view('reviews.edit_review', compact('review', 'game'));
    }

    public function update(Request $request, Review $review)
    {
        $validatedData = $request->validate([
            'Title' => 'required|max:255',
            'description' => 'required',
        ]);

        $review->update($validatedData);

        return redirect()->route('reviews.game_review', $review->gameID)->with('success', 'Review updated successfully');
    }


    public function destroy(Review $review)
    {
        $gameID = $review->gameID;
        $review->delete();

        return redirect()->route('reviews.game_review', $gameID)->with('success', 'Review deleted successfully');
    }

    // Visar alla recensioner för ett spel
    public function showForGame($gameID)
    {
        $game = Game::findOrFail($gameID);
        $reviews = Review::where('gameID', $gameID)->with('user')->get();
        
        return view('reviews.all_reviews', compact('game', 'reviews'));
    }

    public function showReview($gameID)
    {
        $game = Game::findOrFail($gameID);
        $review = Review::where('gameID', $gameID)
                        ->where('userID', 1)
                        ->first();
        
        return view('reviews.game_review', compact('game', 'review'));
    }
}
