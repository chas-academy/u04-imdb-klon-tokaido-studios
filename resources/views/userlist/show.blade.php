@extends('layouts.app')

@section('content')
    <h1>{{ $list->listname }}</h1>
    <p>{{ $list->description }}</p>
    
    <h2>Spel i listan</h2>
    <!-- Här kan du lägga till kod för att visa spelen i listan -->

    <a href="{{ route('user.lists.edit', $list->id) }}" class="btn btn-secondary">Redigera lista</a>
    <form action="{{ route('user.lists.delete', $list->id) }}" method="POST" style="display: inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger" onclick="return confirm('Är du säker?')">Radera lista</button>
    </form>
@endsection