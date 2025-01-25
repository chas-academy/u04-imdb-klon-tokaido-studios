<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testning för Tailwind</title>
    @vite('resources/css/app.css')
</head>
<body>

    <x-button-styles size="large">

        <p class="text-p font-body">Large</p>

    </x-button-styles>

    <x-button-styles>

        <p class="text-p font-body">Default</p>

    </x-button-styles>
        

    <x-button-styles size="small">

        <p class="text-p font-body">Small</p>

    </x-button-styles>

    <x-form-styles>
    {{-- Lägg till fält och innehåll här --}}
    </x-form-styles>

    <x-content-styles>

        <h1 class="text-h1">Hallå Eller</h1>

    </x-content-styles>


</body>
</html>