@extends('layouts.app')

@section('title', 'All User Lists')

@section('content')


    <div class="container mx-auto px-4 py-8">
        <x-button-styles size="small" class="mb-6">
            <a href="{{ route('userlist.create') }}">Create New List</a>
        </x-button-styles>
        <h1 class="text-4xl font-bold mb-6">All User Lists</h1>

        @if($lists->count() > 0)
            @foreach($lists as $list)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $list->title }}</h3>
                    <p class="text-sm text-gray-500">
                        <strong>Created by:</strong> {{ $list->user->username }} |
                        <strong>Games in list:</strong> {{ $list->games()->count() }}
                    </p>


                    <!-- ADMIN KONTROLLER -->


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
        @else
            <p class="text-xl font-semibold mb-4">No lists have been created yet.</p>
        @endif
    </div>
@endsection