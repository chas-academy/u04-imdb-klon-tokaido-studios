
@extends('layouts.app')

@section('title', 'Genre')

@section('content')


<h2 class="text-h2">Genres</h2><br>

<ul class="list-disc pl-6 space-y-2 border-buttonStyle-border">

@foreach ($genres as $genre)

    <li class="text-gray-800 hover:text-blue-500 text-xl mb-2 font-bold">

        <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>

    </li>

@endforeach

</ul>
<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('genres.index') }}">Go Back</a>
</x-button-styles>

@endsection