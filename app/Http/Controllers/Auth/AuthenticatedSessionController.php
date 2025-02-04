<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    
    public function create(): View
    {
        return view('auth.login');
    }

    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = Auth::user();

        if($user->isAdmin)
        {
            session()->put('user_role', 'admin');

            session()->put('success', 'Inloggad som Admin');

            return redirect()->route('users.profile');
        }

        session()->put('user_role', 'user');

        session()->put('success', 'Inloggad som användare!');
        
        return redirect()->route('users.profile');
    
    }

   // LOGGA UT ANVÄNDARE
    public function destroy(Request $request): RedirectResponse
    {
        session()->put('success', 'Du är utloggad');

        session()->forget('user_role');

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    // RADERA ANVÄNDARE
    public function destroyAccount(Request $request): RedirectResponse
    {
        $user = Auth::user();

        if($user->isAdmin)
        {
            return back()->withErrors(['error' => 'Admin konto kan inte raderas']);
        }

        $user->delete();

        Auth::logut();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
