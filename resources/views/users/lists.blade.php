@extends('layouts.app')

@section('title', 'My Lists')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">My Lists</h1>
        
        @foreach($lists as $list)
            <div class="bg-white shadow-md rounded-lg p-6 mb-8">
                <h2 class="text-2xl font-semibold mb-2">{{ $list->name }}</h2>
                <!-- Lägg till listinnehåll här -->
                <div class="flex space-x-4 mt-4">
                    <x-button-styles size="small">
                        <a href="{{ route('lists.edit', $list->id) }}">Edit List</a>
                    </x-button-styles>
                    <form action="{{ route('lists.destroy', $list->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <x-button-styles size="small" type="submit">
                            Delete List
                        </x-button-styles>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
@endsection