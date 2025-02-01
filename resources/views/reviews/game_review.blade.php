@extends('layouts.app')

@section('title', 'Game Review')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">Reviews for {{ $game->title }}</h1>
        
        <div class="flex mb-8">
            <img src="{{ asset($game->image) }}" alt="{{ $game->title }}" class="w-64 h-64 object-cover rounded-lg mr-8">
            <div>
                <p class="text-gray-600">{{ $game->description }}</p>
            </div>
        </div>

        <h2 class="text-2xl font-semibold mb-4 mt-12">Latest Review</h2>
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            @if($review)
                <h3 class="text-xl font-semibold mb-2">{{ $review->user->username }}'s Review</h3>
                <h4 class="text-4xl font-medium mb-2">{{ $review->Title }}</h4>
                <p class="text-gray-600 text-lg mb-4">{{ $review->description }}</p>
            @else
                <p class="text-xl font-semibold mb-4">No reviews created for this game.</p>
            @endif
        </div>

        <div class="flex space-x-4 mb-8">
            <x-button-styles size="small">
                <a href="{{ route('reviews.all_reviews', $game->gameID) }}">All Reviews</a>
            </x-button-styles>
            @if(!$review)


            <!-- user och admin  -->

            <x-button-styles size="small">
                <a href="{{ route('reviews.create', $game->gameID) }}">Create Review</a>
            </x-button-styles>
            @elseif($review)
                <x-button-styles size="small">
                    <a href="{{ route('reviews.edit', $review->reviewID) }}">Edit Review</a>
                </x-button-styles>
                <form action="{{ route('reviews.destroy', $review->reviewID) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <x-button-styles size="small" type="submit">
                        Delete Review
                    </x-button-styles>
                </form>
            @endif
        </div>
        <!-- slut på user och admin -->




        <x-button-styles size="small">
            <a href="{{ route('games.index') }}">Back to Games</a>
        </x-button-styles>
    </div>
@endsection