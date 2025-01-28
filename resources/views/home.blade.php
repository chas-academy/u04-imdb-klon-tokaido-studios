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

<h1 class="text-h1">Startsida</h1>

<p class="tex-p">Klicka på Genre eller Games för att hitta spel</p>
</x-content-styles>

@include('partials.footer')
    
</body>
</html>