@extends('layouts.app')

@section('title', 'Login Form')

@section('content')

<form action="{{ route('login') }}" method="POST">
    @csrf <!-- Skydd mot CSRF-attacker -->
    <label for="email">E-post:</label>
    <input type="email" id="email" name="email" required>
    @error('email')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <label for="password">Lösenord:</label>
    <input type="password" id="password" name="password" required>
    @error('password')
        <div style="color: red;">{{ $message }}</div>
    @enderror

    <button type="submit">Logga in</button>
</form>
@endsection