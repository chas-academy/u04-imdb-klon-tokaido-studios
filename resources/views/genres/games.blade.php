<h1>Game in genre: {{ $genre->name }}</h1>

@if($games->count() > 0)
    <ul>
    @foreach($games as $game)
        <li>{{ $game->title }}</li>
    @endforeach
    </ul>
@else
    <p>No games found in this genre.</p>
@endif

<a href="{{ route('genres.index') }}">Back to genres</a>