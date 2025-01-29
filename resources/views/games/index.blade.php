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

<x-content-styles class="flex flex-col max-w-7xl">
<h1 class="text-h1"><strong>Games</strong></h1><br>
  <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
      @foreach ($games as $game)
      <li class="bg-white shadow-md rounded-lg p-4 flex flex-col items-center justify-between border-2 border-orange-500 h-[350px]">
        <h2 class="text-gray-800 hover:text-blue-500 text-xl font-bold text-center">
          {{ $game->title }}
        </h2>
        <img src="https://via.placeholder.com/200" 
        alt="Placeholder image"
        class="w-64 h-64 object-cover rounded-lg">
        <p class="text-gray-600">
          {{ $game->description }}
        </p>
      </li>
      @endforeach
  </ul>

  <x-button-styles size="small" class="max-w-xs mt-6">
    <a href="{{ route('home') }}">Back To Homepage</a>
  </x-button-styles>

</x-content-styles>


  @include('partials.footer')  

</body>
</html>
