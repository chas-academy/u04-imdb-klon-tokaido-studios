@extends('layouts.app')

@section('title', 'Platforms')

@section('content')

<h1 class="text-h1"><strong>Platforms</strong></h1><br>


    <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

        @foreach ($platforms as $platform)

        <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center space-y-4 border-2 border-orange-500">

            <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
                <a href="{{ route('platforms.games', ['id' => $platform->platformID]) }}">{{ $platform->name }}</a>

            </h2>
            @php
                $platformImages = [
                    "PC" => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Desktop_personal_computer.jpg/200px-Desktop_personal_computer.jpg",
                    "PlayStation 4" => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/PS4-Console-wDS4.jpg/220px-PS4-Console-wDS4.jpg",
                    "PlayStation 5"
                    => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Black_and_white_Playstation_5_base_edition_with_controller.png/220px-Black_and_white_Playstation_5_base_edition_with_controller.png",
                    
                    "Xbox Series X/S"
                    => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Xbox_Series_S_with_controller.jpg/130px-Xbox_Series_S_with_controller.jpg",

                    "Xbox One"
                    => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Xbox_One_consoles_montage.png/453px-Xbox_One_consoles_montage.png",
                    
                    "Nintendo Switch"
                    => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Nintendo-Switch-wJoyCons-BlRd-Standing-FL.jpg/300px-Nintendo-Switch-wJoyCons-BlRd-Standing-FL.jpg",
                    "Steam Deck"
                    => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Steam_Deck_%28front%29.png/220px-Steam_Deck_%28front%29.png"
                    ];
                $imageName = $platformImages[$platform->name] ?? asset('images/games/skyrim.jpg');
             @endphp
            <img src="{{ $imageName }}" 
            alt="platform image" 
            class="w-64 h-64 object-cover rounded-lg">

        </li>
        @endforeach
    </ul>

<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

@endsection