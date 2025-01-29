
@extends('layouts.app')

@section('title', 'Games')

@section('content')

<h1 class="text-h1"><strong>Genres</strong></h1><br>

    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($genres as $genre)

        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center space-y-4 border-2 border-orange-500">

            <img src="https://via.placeholder.com/200" 
            alt="Placeholder image" 
            class="w-64 h-64 object-cover rounded-lg">

            <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
                <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>
            </h2>
        </li>
        @endforeach
    </ul>


<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

@endsection