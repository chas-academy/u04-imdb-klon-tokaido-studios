@extends('layouts.app')

@section('title', 'Create Review')

@section('content')
    


    <!-- user och admin på hela sidan -->

    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Create Review for {{ $game->title }}</h1>
        
        <form action="{{ route('reviews.store') }}" method="POST">
            @csrf
            <input type="hidden" name="gameID" value="{{ $game->gameID }}">
            <div class="mb-4">
                <label for="Title" class="block text-gray-700 font-bold mb-2">Title</label>
                <input type="text" name="Title" id="Title" class="w-full px-3 py-2 border rounded-lg" required>
            </div>
            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-bold mb-2">Review</label>
                <textarea name="description" id="description" rows="4" class="w-full px-3 py-2 border rounded-lg" required></textarea>
            </div>
            <x-button-styles size="small" type="submit">
                Submit Review
            </x-button-styles>
        </form>
        
        <x-button-styles size="small" class="mt-4">
            <a href="{{ route('reviews.game_review', $game->gameID) }}">Back to Game Review</a>
        </x-button-styles>
    </div>
@endsection