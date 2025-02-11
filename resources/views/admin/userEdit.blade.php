
@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
    

    @if(session('success'))
        <div class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('users.update', $user->userID) }}" method="POST" class="max-w-md mx-auto">

    @csrf
    @method('PUT')

    <div class="mb-4">
        <label for="username" class="block text-gray-700 text-sm font-bold mb-2">Title:</label>
        <input type="text" id="username" name="username" value="{{ $user->username }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
    
        <x-button-styles size="small" class="max-w-sm" type="submit">
            Update user
        </x-button-styles>

    </form>
        <x-button-styles size="small" class="mt-4 max-w-sm">
            <a href="{{ route('admin.profile') }}">Back to my Profile</a>
        </x-button-styles>
    </div>
 
@endsection