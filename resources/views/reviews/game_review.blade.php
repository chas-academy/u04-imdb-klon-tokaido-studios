@extends('layouts.app')

@section('title', 'Game Review')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">All Reviews for {{ $game->title }}</h1>
        
        <div class="flex mb-8">
            <img src="{{ asset($game->image) }}" alt="{{ $game->title }}" class="w-64 h-64 object-cover rounded-lg mr-8">
            <div>
                <p class="text-gray-600">{{ $game->description }}</p>
            </div>
        </div>

            @if(!$userReview)
                <p class="text-xl font-semibold mb-4">You haven't reviewed this game yet.</p>
                <x-button-styles size="small">
                    <a href="{{ route('reviews.create', $game->gameID) }}">Create Review</a>
                </x-button-styles>
            @endif

        <h2 class="text-2xl font-semibold mb-4 mt-12">All Reviews</h2>
        @if($allReviews->count() > 0)
            @foreach($allReviews as $review)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $review->Title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $review->description }}</p>
                    <p class="text-sm text-gray-500">By: {{ $review->user->username }}</p>
                </div>
            @endforeach
        @else
            <p class="text-xl font-semibold mb-4">No reviews yet for this game.</p>
        @endif

        <x-button-styles size="small" class="mt-4">
            <a href="{{ route('games.index') }}">Back to Games</a>
        </x-button-styles>
    </div>
@endsection