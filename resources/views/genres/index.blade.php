<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
    @vite('resources/css/app.css')
</head>
<body>
    @include('partials.header')

    <h1 class="text-h1">Genres</h1>

    <ul>
        <!-- Här simulerar vi genrer DUMMY DATA-->
        <li><a href="/genres/1/games">Action</a></li>

        <li><a href="/genres/2/games">Adventure</a></li>

        <li><a href="/genres/3/games">RPG</a></li>

        <li><a href="/genres/4/games">Shooter</a></li>

        <li><a href="/genres/5/games">Strategy</a></li>
        
    </ul>
    <!-- DYNAMISK LOGIK -->
    
    <!-- <ul>
        @foreach($variabel as $variabel)

            <li>

                <a href="{{ url('/genres/' . $varibal->id) }}">
                    {{ $variabel->name }}
                </a>
                
            </li>
    </ul> -->

    @include('partials.footer')
</body>
</html>