
@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1 class="text-h1">Homepage</h1>

    <!-- Genre Section -->
    <section class="mt-8">
        <h2 class="text-2xl font-bold mb-4">Genres</h2>
        <div class="flex flex-wrap">
            @php
                $genreImages = [
                    'Action' => 'skyrim.jpg',
                    'Adventure' => 'breath_of_the_wild.jpg',
                    'RPG' => 'final_fantasy_vii.jpg',
                    'Strategy' => 'civilization_6.jpg',
                    'Puzzle' => 'factorio.jpg',
                ];
            @endphp

            @foreach ($genreImages as $imageName)
                <img src="{{ asset('images/games/' . $imageName) }}" 
                     alt="Genre image" 
                     class="w-1/4 h-40 object-cover">
            @endforeach
        </div>
        <div class="mt-4">
            <x-button-styles class="w-full md:w-auto">
                <a href="/genres" class="hover:underline">View All Genres</a>
            </x-button-styles>
        </div>
    </section>

    <!-- Games Section -->
    <section class="mt-12">
        <h2 class="text-2xl font-bold mb-4">Games</h2>
        <div class="flex flex-wrap">
            @php
                $gameImages = File::files(public_path('images/games'));
            @endphp

            @foreach ($gameImages as $image)
                <img src="{{ asset('images/games/' . $image->getFilename()) }}" 
                     alt="Game image" 
                     class="w-1/4 h-40 object-cover">
            @endforeach
        </div>
        <div class="mt-4">
            <x-button-styles class="w-full md:w-auto">
                <a href="/games" class="hover:underline">View All Games</a>
            </x-button-styles>
        </div>
    </section>

@endsection