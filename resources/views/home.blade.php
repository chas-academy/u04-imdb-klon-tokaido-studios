
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if(session('success'))
    <div class="bg-green-500 text-white p-3 rounded-md mb-4">
        {{ session('success') }}
    </div>
    @endif

    <h1 class="text-h1">Homepage</h1>

@endsection