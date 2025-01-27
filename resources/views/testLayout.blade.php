<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testning för Tailwind</title>
    @vite('resources/css/app.css')
</head>
<body>

    @include('partials.header')



    
    <x-form-styles>
        {{-- Lägg till fält och innehåll här --}}
    </x-form-styles>

    <x-content-styles class="justify-center">

        <h1 class="text-h1">Hallå Eller</h1>

    </x-content-styles>

    @include('partials.footer')

</body>
</html>