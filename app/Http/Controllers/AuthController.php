<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest; //Standardiserad validering för formulär 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login (LoginRequest $request)
    {
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials))
        {
            $user = Auth::user();

            if($user->role === 'admin')
            {
                return redirect()->route('admin.dashboard');
            } else 
            {
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Ange en giltig epost', 
                                    'password' => 'Felaktigt lösenord']);
    }

}