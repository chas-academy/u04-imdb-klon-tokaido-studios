@extends('layouts.app')

@section('title', 'My Reviews')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">My Reviews</h1>
        
        @foreach($reviews as $review)
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <h1 class="flex items-center text-2xl font-semibold mb-6">
                    <img src="{{ asset($review->game->image) }}" alt="{{ $review->game->title }}" class="w-16 h-16 object-cover rounded-lg mr-4">
                    <span>{{ $review->game->title }}</span>
                </h1>
                <h2 class="text-2xl font-semibold mb-2">{{ $review->Title }}</h2>
                <p class="text-gray-600 text-lg mb-4">{{ $review->description }}</p>
                <div class="flex space-x-4">
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
                </div>
            </div>
        @endforeach
    </div>
@endsection