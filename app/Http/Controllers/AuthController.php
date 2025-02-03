<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest; //Standardiserad validering för formulär 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function login (LoginRequest $request)
    {
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials))
        {
            $user = Auth::user();

            if($user->isAdmin)
            {
                session(['user_role' => 'admin']);
                session()->put('success', 'inloggad som admin!');
                return redirect()->route('users.profile');
            } else 
            {
                session(['user_role' => 'user']);
                session()->put('success', 'inloggad som användare!');
                return redirect()->route('users.profile');
            }
        }

        return back()->withErrors(['login' => 'Felaktiga inloggningsuppgifter.']);
    }

    public function logout()
    {

        if (session('user_role') === 'admin' || session('user_role') === 'user')
        {
            session()->put('success', 'Du är utloggad');
            session()->forget('user_role');
            Auth::logout();
            return redirect('/');
        }  
    }

}