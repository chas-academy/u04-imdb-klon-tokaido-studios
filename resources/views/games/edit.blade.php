@extends('layouts.app')

@section('title', 'Edit Game')

@section('content')
    <h1 class="text-4xl"><strong>Edit Game</strong></h1><br>
    <form action="{{ route('games.update', $game->gameID) }}" method="POST" class="max-w-md mx-auto">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
            <input type="text" id="title" name="title" value="{{ $game->title }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description:</label>
            <textarea id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $game->description }}</textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Image URL:</label>
            <input type="url" id="image" name="image" value="{{ $game->image }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="trailer" class="block text-gray-700 text-sm font-bold mb-2">Trailer URL:</label>
            <input type="url" id="trailer" name="trailer" value="{{ $game->trailer }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
        </div>
        <div class="mb-4">
            <label for="genres" class="block text-gray-700 text-sm font-bold mb-2">Genres:</label>
            <select name="genres[]" id="genres" multiple class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                @foreach($genres as $genre)
                    <option value="{{ $genre->genreID }}" {{ $game->genres->contains('genreID', $genre->genreID) ? 'selected' : '' }}>
                        {{ $genre->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <x-button-styles size="small" type="submit">
            Update Game
        </x-button-styles>
    </form>
    <x-button-styles size="small" class="mt-4">
        <a href="{{ route('games.index') }}">Back to Games</a>
    </x-button-styles>
@endsection