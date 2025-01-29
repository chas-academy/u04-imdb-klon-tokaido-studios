
@extends('layouts.app')

@section('title', 'Games')

@section('content')

<ul class="list-disc pl-6 space-y-2 border-buttonStyle-border">

    @if ($games->isEmpty())
        <li class="text-red-600 italic text-xl">Inga spel hittades.</li>
    @else

        @foreach ($games as $game)
            <li class="text-gray-800 hover:text-blue-500 text-xl mb-2 font-bold">{{ $game->title }}</li>
        @endforeach
    @endif

</ul>

<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

@endsection

