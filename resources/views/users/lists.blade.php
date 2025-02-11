@extends('layouts.app')

@section('title', 'Mina Listor')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">My Lists</h1>
        
        <x-button-styles size="small" class="mb-6">
            <a href="{{ route('userlist.create') }}">Create New List</a>
        </x-button-styles>

        @if($lists->isEmpty())
            <p class="text-gray-600 text-lg">You have no lists yet. Create your first list now!</p>
        @else
            @foreach ($lists as $list)
                <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                    <h2 class="flex items-center text-2xl font-semibold mb-6">
                        <span>{{ $list->listname }}</span>
                    </h2>
                    <p class="text-gray-600 text-lg mb-4">{{ $list->description }}</p>
                    
                    @if($list->games->isNotEmpty())
                        <h3 class="text-xl font-semibold mb-2">Game List:</h3>
                        <div class="space-y-2">
                            @foreach($list->games as $game)
                                <div class="flex items-center">
                                    <img 
                                     src="{{ asset('images/games/' . basename($game->image)) }}" 
                                        alt="{{ $game->title }}" 
                                        class="w-12 h-12 object-cover rounded-lg mr-4"
                                    >
                                    <span class="text-gray-600">{{ $game->title }}</span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <p class="text-gray-600 mb-4">No games in this list.</p>
                    @endif

                    <div class="flex space-x-4 mt-4">
                        <x-button-styles size="small">
                            <a href="{{ route('userlist.edit', ['listID' => $list->listID]) }}">Edit List</a>
                        </x-button-styles>
                        <form action="{{ route('userlist.delete', ['listID' => $list->listID]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button-styles size="small" type="submit" onclick="return confirm('Är du säker?')">
                                Delete List
                            </x-button-styles>
                        </form>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
@endsection
