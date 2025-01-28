<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $genre->name }} - Games</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include ('partials.header')
    <h1>Spel i {{ $genre->name }}</h1>

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

<!-- Dynamisk logik, DUMMY DATA -->
{{--
   <!-- <ul>
        @foreach ($variabel as $variabels)
        <li>
            <p class="text-p">
                {{ $game->title }}
            </p>
            <p class="text-p">
                {{ $game->description }}
            </p>
        </li>
        @endforeach
    </ul> -->
--}}
    <a href="{{ url(/'genres') }}">Tillbaka</a>
    
    @include ('partials.footer')
</body>
</html>