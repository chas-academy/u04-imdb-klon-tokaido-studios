
@extends('layouts.app')

@section('title', 'Games')

@section('content')

<h1 class="text-h1"><strong>Genres</strong></h1><br>


    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($genres as $genre)

        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center space-y-4 border-2 border-orange-500">
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
            alt="Genre image" 
            class="w-64 h-64 object-cover rounded-lg mb-4">
            <h2 class="text-xl font-bold text-center">
                <x-button-styles size="small" class="max-w-xs mb-6">
                    <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>
                </x-button-styles>
            </h2>

        </li>
        @endforeach
    </ul>


    <!--
    
    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

    @php
    $genreImagesPath = public_path('images/genres');
    $genreImages = File::files($genreImagesPath);
@endphp

@foreach ($genreImages as $image)
    @php
        $imageName = $image->getFilename();
        $genreName = pathinfo($imageName, PATHINFO_FILENAME);
    @endphp
    <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center space-y-4 border-2 border-orange-500">
    <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
        <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ ucfirst($genreName) }}</a>
    </h2>
    <div class="mb-4">
        <img src="{{ asset('images/genres/' . $imageName) }}" 
             alt="{{ $genreName }} genre image" 
             class="w-64 h-64 object-cover rounded-lg">
    </div>
            </li>
@endforeach
    </ul>

            -->

        


<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

@endsection