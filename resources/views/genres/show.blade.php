<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genre - Games</title>
    @vite('resources/css/app.css')
</head>
<body>
    
<div class="page-container">

@include('partials.header')


<x-content-styles class="flex flex-col">
    <h1>Spel i Genre</h1><br>

    <ul>
        <!-- Här simulerar vi spel -->
        <li>
            <strong>Game Title 1</strong>
            <p>This is a description of Game Title 1.</p>
        </li>
        <li>
            <strong>Game Title 2</strong>
            <p>This is a description of Game Title 2.</p>
        </li>
        <li>
            <strong>Game Title 3</strong>
            <p>This is a description of Game Title 3.</p>
        </li>
    </ul>
</x-content-styles>

@include('partials.footer')

</div>
</body>
</html>