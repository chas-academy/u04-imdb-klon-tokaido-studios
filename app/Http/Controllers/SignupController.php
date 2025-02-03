<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function registerUser(Request $request)
    {

        $request->validate 
        ([
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'username' => 'required|min:5|max:15',
        ]);

        $user = User::create
        ([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'username' => $request->username,
            'isAdmin' => false,
            'country' => 'Sweden',
        ]);


        return redirect()->route('login')->with('success', 'Kontot har skapats!');
        
    }
}
