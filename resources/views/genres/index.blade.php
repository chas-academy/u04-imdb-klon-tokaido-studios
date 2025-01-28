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

<h1>Genres</h1>

<ul>
@foreach ($genres as $genre)
    <li>
        <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>
    </li>
@endforeach
</ul>

<a href="{{ route('genres.index') }}">Back to genres</a>

</x-content-styles>

@include('partials.footer')

</body>
</html>