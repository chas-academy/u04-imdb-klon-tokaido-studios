<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Games - Index</title>

    @vite('resources/css/app.css')

</head>
<body>

<div class="page-container">

@include('partials.header')

<x-content-styles class="flex flex-col max-w-lg">

  <ul class="list-disc pl-6 space-y-2">

  @foreach ($games as $game)
      <li class="text-gray-800 hover:text-blue-500 text-xl mb-2 font-bold">
        Gametitle: {{ $game->title }} | Game description: {{ $game->description }}</li>
  @endforeach

  </ul>
<x-button-styles size="small" class="max-w-xs mt-6">
<a href="{{ route('home') }}">Back To Homepage</a>
</x-button-styles>

</x-content-styles>

  @include('partials.footer')  

</div>

</body>
</html>
