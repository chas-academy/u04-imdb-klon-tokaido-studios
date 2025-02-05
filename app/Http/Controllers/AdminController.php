<?php

namespace App\Http\Controllers;

use AppModels\Review;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Game;
use App\Models\UserList;
use App\Models\Review as ReviewModel;


class AdminController extends Controller
{

    public function dashboard()
    {
        return view('users.profile');
    }
    public function index()
    {
        $data = SomeModel::all();
        return view('admin.index', compact('data'));
    }

    public function create()
    {
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // Ytterligare valideringsregler
        ]);

        SomeModel::create($validated);
        return redirect()->route('admin.dashboard')->with('success', 'Post skapades!');
    }

    public function showProfile()
    {
        $user = auth()->user();
        $reviews = Review::with(['user', 'game'])->get(); // Admin ser alla recensioner

        return view('users.profile', compact('user', 'reviews'));
    }

    public function showAllReviews()
    {
        $reviews = ReviewModel::with(['user', 'game'])->get(); // Hämta alla recensioner
        return view('admin.reviews', compact('reviews'));
    }

    public function showAllLists()
    {
        $lists = UserList::with('user')->get(); // Hämta alla listor
        return view('admin.lists', compact('lists'));
    }

}
