<<<<<<<<< Temporary merge branch 1
<ul>
@foreach ($genres as $genre)
    <li>
        <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>
    </li>
@endforeach
</ul>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Genres</title>
</head>
<body>
    @include('partials.header')

    <x-content-styles class="flex flex-col">
    <h1 class="text-h1">Genres</h1><br>
    <p class="text-p">Klicka på en genre för att visa spel i denna kategorin</p>

    <ul>
        <!-- Här simulerar vi genrer DUMMY DATA-->

        <h2 class="text-h2">Dessa kommer vara href</h2>

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
>>>>>>>>> Temporary merge branch 2
