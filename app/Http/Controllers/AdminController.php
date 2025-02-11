<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\Game;
use App\Models\User;
use App\Models\Review;
use App\Models\UserList as UserListModel;



class AdminController extends Controller
{

    private function findUser($id)
    {
        return User::where('userID', $id)->firstOrFail();
    }

    public function dashboard()
    {
        return view('users.profile');
    }
    public function index()
    {
        $data = SomeModel::all();
        return view('admin.index', compact('data'));
    }


    public function createUsers(Loginrequest $request)
    {
        $request->validated();
    
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully');
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

     // Admin ser alla recensioner
    public function showProfile()
    {
        $user = auth()->user();

        $reviews = Review::with(['user', 'game'])->get();

        return view('users.profile', compact('user', 'reviews'));
    }

    // Hämta alla recensioner baserat på användare
    public function showAllReviews()
    {
        $reviews = Review::with(['user', 'game'])->get();

        return view('admin.reviews', compact('reviews'));
    }

     // Hämta alla listor
    public function showAllLists()
    {
        $lists = UserListModel::with('user')->get();

        return view('admin.lists', compact('lists'));
    }

    public function showAllUsers()
    {
        // Hämta alla användare som inte är admin
        $users = User::where('isAdmin', false)->get();
        
        return view('admin.user', compact('users'));
    }

    public function destroy(Request $request, $id)
    {

        $user = $this->findUser($id);

        if($user->isAdmin)
        {
           
            return back()->withErrors(['error' => 'Admin Konto kan ej raderas.']);
        }

        if (!$request->has('confirm') || $request->input('confirm') !== 'yes') {
            
            return back()->withErrors(['error' => 'Bekräftelse krävs för att radera ditt konto.']);
        }

        $user->delete();

        return redirect()->route('admin.user')->with('success', 'User deleted successfully');
    }


    public function toggleActive($id)
    {
        $user = $this->findUser($id);

        $user->isActive = !$user->isActive;

        $user->save();

        $status = $user ->isActive ? 'Active' : 'Not Active';

        return back()->with('success', "{$user->username} is set to {$status}.");
    }


    public function editUser($id)
    {
        $user = $this->findUser($id);

        return view('admin.userEdit', compact('user'));
    }


    public function updateUser(Request $request, $id)
    {

        $request->validate (['username' => 'required|max:50|string',]);

        $user = $this->findUser($id);

        $user->username = $request->input('username');

        $user->save();

        return redirect()->route('users.edit', $id)->with('success', 'Username has been updated');

    }
}