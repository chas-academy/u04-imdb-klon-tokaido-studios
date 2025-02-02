<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login()
    {
        // Simulera inloggning genom att sätta en session
        session(['logged_in' => true]);
        return redirect()->route('users.profile');
    }

    public function logout()
    {
        // Simulera utloggning genom att ta bort sessionen
        session()->forget('logged_in');
        return redirect('/');
    }
}