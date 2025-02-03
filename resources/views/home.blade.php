
@extends('layouts.app')

@section('title', 'Home')

@section('content')

    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded-md mb-4">
            {{ session('success') }}
        </div>
    @endif

    <h1 class="text-h1">Startsida</h1>
    
    <p class="text-p mt-4">Klicka på Genre eller Games för att hitta spel</p>

@endsection