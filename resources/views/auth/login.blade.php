@extends('layouts.app')

@section('title', 'Login')

@section('content')

<h1 class="text-h1 mb-4">Log In</h1>

<form action="{{ route('login') }}" method="POST">
    @csrf <!-- Skydd mot CSRF-attacker -->

    <!-- Email -->
    <label for="email">E-post:</label>
    <input type="email" id="email" name="email" required><br>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <!-- Password -->
    <label for="password" class="mt-2">Lösenord:</label>
    <input type="password" id="password" name="password" required class="mt-2"><br>
    @error('password')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <!-- Meddelande om lyckad registrering -->
    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    <!-- Glömt lösenord-länk -->
    <div class="mt-4">
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                {{ __('Glömt ditt lösenord?') }}
            </a>
        @endif
    </div>

    <!-- Login-knapp -->
    <x-button-styles type="submit" class="mt-4">Logga in</x-button-styles>
</form>

@endsection