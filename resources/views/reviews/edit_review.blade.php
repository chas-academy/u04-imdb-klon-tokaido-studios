@extends('layouts.app')

@section('title', 'Edit Review')

@section('content')
    


     <!-- user och admin på hela sidan -->

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Edit Review for {{ $game->title }}</h1>
        
        <form action="{{ route('reviews.update', $review->reviewID) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-4">
                <label for="Title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="Title" id="Title" class="w-full px-3 py-2 border rounded-lg" value="{{ $review->Title }}" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Review</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded-lg" required>{{ $review->description }}</textarea>
            </div>
            <x-button-styles size="small" type="submit">
                Update Review
            </x-button-styles>
        </form>
        
        <x-button-styles size="small" class="mt-4">
            <a href="{{ route('reviews.game_review', $game->gameID) }}">Back to Game Review</a>
        </x-button-styles>
    </div>
@endsection