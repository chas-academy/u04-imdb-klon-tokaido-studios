@extends('layouts.app')

@section('title', 'Register')

@section('content')

<form action="{{ route('registerNewUser') }}" method="POST">
@CSRF
<label for="email">Email:</label>
<input type="email" name="email" for="email" class="mt-2"><br>

<label for="password">Password:</label>
<input type="password" name="password" class="mt-2"><br>

<label for="username">Username:</label>
<input type="text" name="username" class="mt-2"><br>

<x-button-styles type="submit" class="mt-4">Registrera</x-button-styles>
</form>


@endsection