@extends('layouts.app')

@section('title', 'Games')

@section('content')

<h1 class="text-h1"><strong>Platforms</strong></h1><br>


    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($platforms as $platform)

        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center space-y-4 border-2 border-orange-500">

            <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
                <a href="{{ route('platforms.games', ['id' => $platform->platformID]) }}">{{ $platform->name }}</a>
            </h2>
            @php
                $genreImages = [
                    'Action' => 'action.jpg',
                    'Adventure' => 'adventure.jpg',
                    'RPG' => 'rpg.jpg',
                    'Strategy' => 'strategy.jpg',
                    'Puzzle' => 'puzzle.jpg',
                ];
                $imageName = $genreImages[$genre->name] ?? 'skyrim.jpg';
            @endphp
            <img src="{{ asset('images/genres/' . $imageName) }}" 
            alt="platform image" 
            class="w-64 h-64 object-cover rounded-lg">

        </li>
        @endforeach
    </ul>

<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

@endsection