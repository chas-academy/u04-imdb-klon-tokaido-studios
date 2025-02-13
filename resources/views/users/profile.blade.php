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
     

        @if (auth()->check() && auth()->user()->isAdmin)
        <x-button-styles>
            <a href="{{ route('admin.user') }}">
                View all Users
            </a>
            </x-button-styles><br>
        @endif


    </div>
@endsection
