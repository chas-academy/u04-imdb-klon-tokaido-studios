@extends('layouts.app')

@section('title', 'Alla Listor')

@section('content')
<div class="container mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold mb-6">All user lists</h1>

    @if($lists->isEmpty())
        <p class="text-gray-600 text-lg">There are no lists available.</p>
    @else
        @foreach ($lists as $list)
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <h2 class="flex items-center text-2xl font-semibold mb-6">
                    <span>{{ $list->listname }}</span>
                </h2>
                <p class="text-gray-600 text-lg mb-2">Created by: {{ $list->user->username }}</p>
                <p class="text-gray-600 text-lg mb-4">{{ $list->description }}</p>
                
                @if($list->games->isNotEmpty())
                    <h3 class="text-xl font-semibold mb-2">Games in list:</h3>
                    <div class="space-y-2 mb-4">
                        @foreach($list->games as $game)
                            <div class="flex items-center">
                                @if(!empty($game->image))
                                    <img 
                                        src="{{ $game->image }}" 
                                        alt="{{ $game->title }}" 
                                        class="w-12 h-12 object-cover rounded-lg mr-4"
                                    >
                                @else
                                    <div class="w-12 h-12 bg-gray-200 rounded-lg mr-4 flex items-center justify-center">
                                        <span class="text-gray-500 text-xs">No image</span>
                                    </div>
                                @endif
                                <span class="text-gray-600">{{ $game->title }}</span>
                            </div>
                        @endforeach
                    </div>
                @else
                    <p class="text-gray-600 mb-4">No games added to this list.</p>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection