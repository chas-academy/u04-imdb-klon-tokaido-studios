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
  <ul class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
    @foreach ($games as $game)
      <li class="bg-white shadow-md rounded-lg p-4 flex items-center space-x-4 border-2 border-orange-500">
        <img src="https://via.placeholder.com/150"
        alt="Placeholder image"
        class="w-16 h-16 object-cover rounded-lg">
        <div>
          <p class="text-gray-800 hover:text-blue-500 text-xl mb-2 font-bold">
            {{ $game->title }}
          </p>
          <p class="text-gray-600">
            {{ $game->description }}
          </p>
        </div>
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
