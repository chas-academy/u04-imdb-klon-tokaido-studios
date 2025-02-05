<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showProfile()
{
    $user = auth()->user();

    $reviews = $user->reviews;

    return view('users.profile', compact('user', 'reviews'));
}

public function showReviews()
{
    $user = auth()->user();
    $reviews = $user->reviews;
    return view('users.reviews', compact('user', 'reviews'));
}

public function showLists()
{
    $user = auth()->user();
    $lists = $user->lists;
    return view('users.lists', compact('user', 'lists'));
}

    public function destroy(Request $request)
    {
        $user = auth()->user();

        if($user->isAdmin)
        {
            return back()->withErrors(['error' => 'Admin Konto kan ej raderas.']);
        }

        if (!$request->has('confirm') || $request->input('confirm') !== 'yes') {
            return back()->withErrors(['error' => 'Bekräftelse krävs för att radera ditt konto.']);
        }


        $user->delete();
        return redirect('/')->with('success', 'User deleted successfully');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

}