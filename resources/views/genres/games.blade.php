<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    @vite('resources/css/app.css')
    
</head>
<body>

@include('partials.header')

<x-content-styles class="flex flex-col max-w-lg">

<h1 class="text-h1"><strong>Genre:</strong> {{ $genre->name }}</h1><br>

@if($games->count() > 0)

<ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach ($games as $game)
    <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-between border-2 border-orange-500 h-[350px]">
        <img src="https://via.placeholder.com/200" 
        alt="Placeholder image"
        class="w-64 h-64 object-cover rounded-lg">
        <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
            <a href="">{{ $game->title }}</a>
        </h2>
    </li>
    @endforeach
</ul>

@else
    <p>No games found in this genre.</p>
@endif

<x-button-styles size="small" class="max-w-xs mt-6">
    <a href="{{ route('genres.index') }}">Go Back</a>
</x-button-styles>

</x-content-styles>


@endsection
