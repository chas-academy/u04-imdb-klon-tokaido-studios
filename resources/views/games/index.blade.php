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
<ul>
@foreach ($games as $game)
    <li>Gametitle: {{ $game->title }} | Game description: {{ $game->description }}</li>
@endforeach
</ul>

</x-content-styles>

  @include('partials.footer')  

</body>
</html>
