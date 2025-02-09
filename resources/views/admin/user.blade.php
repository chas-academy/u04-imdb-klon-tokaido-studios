@extends('layouts.app')

@section('title', 'All Users')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">All Users</h1>

        @if(session('success'))
            <div class="bg-green-500 text-white p-3 rounded-md mb-4">
                {{ session('success') }}
            </div>
        @endif

        @if($users->count() > 0)
            @foreach($users as $user)
                <div class="bg-white shadow-md rounded-lg p-6 mb-4">
                    <h3 class="text-xl font-semibold mb-2">{{ $user->Title }}</h3>
                    <p class="text-gray-600 mb-2">{{ $user->description }}</p>
                    <p class="text-sm text-gray-500">
                        <strong>User:</strong> {{ $user->username }}
                        <strong>ID:</strong> {{ $user->userID }}
                        <strong>Email:</strong> {{ $user->email }} |
                    </p>

                    <!-- ADMIN KONTROLLER -->
                    <div class="flex space-x-4 mt-2">
                        <x-button-styles size="small">
                            <a href="{{ route('users.edit', $user->userID) }}">Edit</a>
                        </x-button-styles>

                        <form action="{{ route('users.toggleActive', $user->userID) }}" method="POST">
                            @csrf
                            @method('PATCH')

                            <x-button-styles size="small" type="submit">
                                {{ $user->isActive ? 'Set To Inactive' : 'Set To Active' }}
                            </x-button-styles>
                        </form>

                        <form action="{{ route('users.destroy', ['id' => $user->userID]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="confirm" value="yes">

                            <x-button-styles size="small" type="submit" onclick="return confirm('Are you sure you want to delete this user?')">
                                Delete
                            </x-button-styles>
                        </form>
                    </div>
                </div>
            @endforeach
        @else
            <p class="text-xl font-semibold mb-4">No reviews have been posted yet.</p>
        @endif

        @if(Auth::user()->isAdmin)
            <x-button-styles size="small">
                <a href="{{ route('auth.register') }}">Add</a>
            </x-button-styles>
        @endif
    </div>
@endsection