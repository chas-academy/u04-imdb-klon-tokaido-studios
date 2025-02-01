<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile($id)
    {
        $user = User::findOrFail($id);
        return view('users.profile', compact('user'));
    }

    public function showReviews($id)
    {
        $user = User::findOrFail($id);
        $reviews = $user->reviews;
        return view('users.reviews', compact('user', 'reviews'));
    }

    public function showLists($id)
    {
        $user = User::findOrFail($id);
        $lists = $user->lists;
        return view('users.lists', compact('user', 'lists'));
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');
    }
}