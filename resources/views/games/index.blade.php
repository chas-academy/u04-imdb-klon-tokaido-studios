<ul>
@foreach ($games as $game)
    <li>Gametitle: {{ $game->title }} | Game description: {{ $game->description }}</li>
@endforeach
</ul>