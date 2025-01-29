
@extends('layouts.app')

@section('title', 'Games')

@section('content')

<h2 class="text-h2">Game in genre: {{ $genre->name }}</h2><br>
    
@if($games->count() > 0)

    <ul class="list-disc pl-6 space-y-2">

    @foreach($games as $game)
        <li class="text-gray-800 hover:text-blue-500 text-xl mb-2 font-bold">{{ $game->title }}</li>
    @endforeach

    </ul>

    @else
        <p>No games found in this genre.</p>
@endif

<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('genres.index') }}">Go Back</a>
</x-button-styles>

@endsection
