<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Testning för Tailwind</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gradient-diagonal min-h-screen flex flex-col items-center justify-center p-4 sm:p-8">
    
    <header class="flex flex-row">
        <x-button-style class="ml-2 mr-1">

            <p class="text-p font-body">Admin</p>

        </x-button-style>

        <x-button-style class="ml-1 mr-1">

            <p class="text-p font-body">Logga in</p>

        </x-button-style>

        <x-button-style class="ml-1 mr-2">

            <p class="text-p font-body">Top 250</p>

        </x-button-style>
    </header>

    <x-box-content>

    <h1 class="text-h1 font-heading">Detta är H1</h1><br>

    <h2 class="text-h2 font-heading">Detta är H2</h2><br>

    <p class="text-p font-body">Detta är P</p>

    </x-box-content>

    <x-box-content class="mt-4">

    <p class="text-p font-body">Detta är P för att visa hur det ser ut med lite mer text, här kommer ju också bilder, forumlär och liknande kunna ligga. Detta är gjort för visuell representering. Jag ber om ursäkt att jag inte hann så långt.</p>

    </x-box-content>

</body>
</html>