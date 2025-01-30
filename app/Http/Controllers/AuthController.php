<?php

namespace App\Http\Controllers;
use App\Http\Requests\Auth\LoginRequest; //Standardiserad validering för formulär 
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('login.login');
    }

    public function login (LoginRequest $request)
    {
        $credentials = $request->validated();
        
        if (Auth::attempt($credentials))
        {
            $user = Auth::user();

            if($user->isAdmin)
            {
                session(['user_role' => 'admin']);
                session()->flash('success', 'inloggningen lyckades som admin!');
                return redirect()->route('admin.dashboard');
            } else 
            {
                session(['user_role' => 'user']);
                session()->flash('success', 'inloggningen lyckades som användare!');
                return redirect()->route('user.dashboard');
            }
        }

        return back()->withErrors(['email' => 'Ange en giltig epost', 
                                    'password' => 'Felaktigt lösenord']);
    }

    public function logout()
    {

        if (session('user_role') == 'admin' || session('user_role') == 'user')
        {
            session()->flash('success', 'Du är utloggad');
            session()->forget('user_role');
            Auth::logout();
            return redirect('/');
        }  
    }

}