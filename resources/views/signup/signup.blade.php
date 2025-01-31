@extends('layouts.app')

@section('title', 'Signup')

@section('content')

<form action="{{ route('signup') }}" method="POST">
@CSRF
<label for="email">Email:</label>
<input type="email" name="email" for="email"><br>

<label for="password">Password:</label>
<input type="password" name="password"><br>

<label for="username">Username:</label>
<input type="text" name="username"><br>

<x-button-styles type="submit">Registrera</x-button-styles>
</form>


@endsection