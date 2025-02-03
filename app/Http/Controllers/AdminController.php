<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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

}
