<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;


class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
{

    if (!Auth::check()) {

        return redirect('/auth/login')->withErrors(['error' => 'You must be logged in to access this page.']);

    }

    if (!Auth::user()->isAdmin) {

        return redirect('/auth/login')->withErrors(['error' => 'You Do Not Have Access To This Page']);

    }

    return $next ($request);
}
}