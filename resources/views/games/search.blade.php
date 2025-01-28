<ul>
@foreach ($games as $game)
    <li>{{ $game->title }}</li>
@endforeach
</ul>