@extends('layouts.app')

@section('title', 'Register')

@section('content')

@if (Auth()->check() && Auth()->user()->isAdmin)
<p class="text-p">Create new user as admin</p>
@endif

<form action="{{ route('registerNewUser') }}" method="POST">
@CSRF

<label for="username">Username:</label>
<input type="text" name="username" class="mt-2" placeholder="Minst 5 bokstäver"  required><br>
@if ($errors->any())
    <div class="alert alert-danger text-red-600">
        <ul>
            @foreach ($errors->get('username') as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<label for="email">Email:</label>
<input type="email" name="email" for="email" class="mt-2" required><br>

<label for="password">Password:</label>
<input type="password" name="password" placeholder="Minst 8 bokstäver" class="mt-2" required><br>

<label for="password_confirmation">Confirm Password:</label>
<input type="password" name="password_confirmation" placeholder="Minst 8 bokstäver" class="mt-2" required><br>

<x-button-styles type="submit" class="mt-4">Registrera</x-button-styles>
</form>


@endsection