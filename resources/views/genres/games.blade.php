
@extends('layouts.app')

@section('title', 'Games')

@section('content')

<h1 class="text-h1"><strong>Genre:</strong> {{ $genre->name }}</h1><br>

@if($games->count() > 0)

    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($games as $game)
        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-between border-2 border-orange-500">
            <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
                <a href="">{{ $game->title }}</a>
            </h2>
            <img src="https://via.placeholder.com/200" 
            alt="Placeholder image"
            class="w-64 h-64 object-cover rounded-lg">
        </li>
        @endforeach
    </ul>

    @else
        <p>No games found in this genre.</p>
    @endif

<x-button-styles size="small" class="max-w-xs mt-6">
    <a href="{{ route('genres.index') }}">Go Back</a>
</x-button-styles>

@endsection