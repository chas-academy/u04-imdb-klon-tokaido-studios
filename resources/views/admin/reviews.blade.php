@extends('layouts.app')

@section('title', 'All Reviews')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">All Reviews</h1>

        @if($reviews->count() > 0)
            @foreach($reviews as $review)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $review->Title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $review->description }}</p>
                    <p class="text-sm text-gray-500">
                        <strong>User:</strong> {{ $review->user->username }} |
                        <strong>Game:</strong> {{ $review->game->title }}
                    </p>

                    <!-- ADMIN KONTROLLER -->
                    <div class="flex space-x-4 mt-2">
                        <x-button-styles size="small">
                            <a href="{{ route('reviews.edit', $review->reviewID) }}">Edit</a>
                        </x-button-styles>

                        <form action="{{ route('reviews.destroy', $review->reviewID) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <x-button-styles size="small" type="submit" onclick="return confirm('Are you sure you want to delete this review?')">
                                Delete
                            </x-button-styles>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-xl font-semibold mb-4">No reviews have been posted yet.</p>
        @endif
    </div>
@endsection