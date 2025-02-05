@extends('layouts.app')

@section('title', 'Games')

@section('content')

  <h1 class="text-4xl"><strong>Games</strong></h1><br>
    
  
  
    <!-- admin -->
    @if (auth()->check() && auth()->user()->isAdmin)
    <x-button-styles size="small" class="max-w-xs mb-6">
        <a href="{{ route('games.create') }}">Create New Game</a>
    </x-button-styles>
    @endif  
    <!-- slut på admin -->



    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
        @foreach ($games as $game)
        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-between border-2 border-orange-500">
          <h2 class="text-lg text-gray-800 hover:text-blue-500 font-bold text-center">
            {{ $game->title }}
          </h2>
          <img src="{{ asset($game->image) }}" 
          alt="Placeholder image"
          class="w-64 h-64 object-cover rounded-lg">
          <p class="text-sm text-gray-600">
            {{ $game->description }}
          </p>
          <p class="mt-3">
            @php
                $videoId = str_replace('https://youtu.be/', '', $game->trailer);
            @endphp
            <h2 class="text-lg text-gray-800 hover:text-blue-500 font-bold text-center">
                Watch Trailer
            </h2>
            <iframe  
                src="https://www.youtube.com/embed/{{ $videoId }}" 
                frameborder="0" 
                allow="autoplay; encrypted-media" 
                allowfullscreen
                class="w-32 h-32 object-cover rounded-lg">
            </iframe>
          </p>
          <div class="mt-4 flex space-x-2">
            
          
            @if(auth()->check() && auth()->user()->isAdmin)
          
            <x-button-styles size="small">
                <a href="{{ route('games.edit', $game->gameID) }}">Edit</a>
            </x-button-styles>

            <form action="{{ route('games.destroy', $game->gameID) }}" method="POST">
                
            @csrf
                @method('DELETE')
                <x-button-styles size="small" type="submit" onclick="return confirm('Are you sure you want to delete this game?')">
                    Delete
                </x-button-styles>

            </form>

            @endif
            <!-- slut på admin -->
            
            <x-button-styles size="small">
            <a href="{{ route('reviews.game_review', $game->gameID) }}">Review</a>
            </x-button-styles>
          </div>
        </li>
        
        @endforeach
        
    </ul>
    
  <x-button-styles size="small" class="max-w-xs mt-6">
    <a href="{{ route('home') }}">Back To Homepage</a>
  </x-button-styles>

@endsection