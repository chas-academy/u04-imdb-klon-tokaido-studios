<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testning för Tailwind</title>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="page-container">

    @include('partials.header')

    <x-form-styles>
        {{-- Lägg till fält och innehåll här --}}
    </x-form-styles>

    @include('partials.footer')

</div>

</body>
</html>