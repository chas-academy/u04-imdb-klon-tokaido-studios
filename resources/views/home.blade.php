
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

            @php
                $genreImages = File::files(public_path('images/genres'));
            @endphp

            @foreach ($genreImages as $image)
                <img src="{{ asset('images/genres/' . $image->getFilename()) }}" 
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

    <!-- Lists Section -->
    <section class="mt-12">
        <h2 class="text-2xl font-bold mb-4">Featured Lists</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach (\App\Models\UserList::with('user', 'games')->inRandomOrder()->limit(3)->get() as $list)
                <div class="bg-white shadow-md rounded-lg p-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $list->listname }}</h3>
                    <p class="text-gray-600 mb-2">By {{ $list->user->username }}</p>
                    <p class="text-gray-600">{{ Str::limit($list->description, 100) }}</p>
                    @if($list->games->isNotEmpty())
                        <div class="mt-2">
                            <p class="font-semibold">Games:</p>
                            <div class="space-y-2">
                                @foreach($list->games->take(3) as $game)
                                    <div class="flex items-center">
                                        <img 
                                            src="{{ $game->image }}" 
                                            alt="{{ $game->title }}" 
                                            class="w-12 h-12 object-cover rounded-lg mr-2"
                                        >
                                        <span class="text-gray-600">{{ $game->title }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            <x-button-styles class="w-full md:w-auto">
                <a href="{{ route('all.lists') }}" class="hover:underline">View All Lists</a>
            </x-button-styles>
        </div>
    </section>

@endsection