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

<x-content-styles>

<h1 class="text-h1">Game in genre: {{ $genre->name }}</h1>
    
@if($games->count() > 0)
        <ul>
        @foreach($games as $game)
            <li>{{ $game->title }}</li>
        @endforeach
        </ul>
@else
    <p>No games found in this genre.</p>
@endif

<a href="{{ route('genres.index') }}">Back to genres</a>

</x-content-styles>

@include('partials.footer')

</body>
</html>
