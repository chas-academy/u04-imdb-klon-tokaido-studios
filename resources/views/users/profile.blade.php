@extends('layouts.app')

@section('title', 'My Profile')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold mb-6">
            {{ auth()->user()->isAdmin ? 'Admin Profile' : 'My Profile' }}
        </h1>
        
        <div class="bg-white shadow-md rounded-lg p-6 mb-8">
            <p class="text-xl mb-2"><span class="font-semibold text-[#F57C00]">Username:</span> {{ $user->username }}</p>
            <p class="text-xl mb-2"><span class="font-semibold text-[#F57C00]">Email:</span> {{ $user->email }}</p>
            <p class="text-xl mb-2"><span class="font-semibold text-[#F57C00]">Country:</span> {{ $user->country }}</p>
        </div>

        <h2 class="text-2xl text-[#F57C00] font-semibold mb-4 mt-12">
        {{ auth()->user()->isAdmin ? 'Site Activities' : 'My Activities' }}
        </h2>
        
        <div class="flex space-x-4 mb-8">
        <x-button-styles size="small">
            <a href="{{ auth()->user()->isAdmin ? route('admin.reviews') : route('users.reviews') }}">
                {{ auth()->user()->isAdmin ? 'View all reviews' : 'View my reviews' }}
            </a>
        </x-button-styles>

        <x-button-styles size="small">
            <a href="{{ auth()->user()->isAdmin ? route('admin.lists') : route('users.lists') }}">
                {{ auth()->user()->isAdmin ? 'View all lists' : 'View my lists' }}
            </a>
        </x-button-styles>
        </div>

        <h2 class="text-2xl text-[#F57C00] font-semibold mb-4 mt-12">Account Management</h2>
        
        @auth

            @if(!Auth::user()->isAdmin)
            <form action="{{ route('users.destroy') }}" method="POST" class="mt-4">
                @csrf
                @method('DELETE')

                <input type="hidden" name="confirm" value="yes">

                <x-button-styles size="small" type="submit">
                    Delete Account
                </x-button-styles>
                
            </form>

            @endif
        @endauth
    </div>
@endsection