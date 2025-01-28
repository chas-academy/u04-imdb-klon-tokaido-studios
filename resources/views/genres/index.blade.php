<ul>
@foreach ($genres as $genre)
    <li>
        <a href="{{ route('genres.games', ['id' => $genre->genreID]) }}">{{ $genre->name }}</a>
    </li>
@endforeach