
@foreach ($games as $game)
    <div style="display: flex; gap: 10px; align-items: center; margin-bottom: 5px; font-size: 24px; color: #B8860B;">
        <img src="{{ asset($game->image) }}" alt="{{ $game->title }}" width="50" height="50"> 
        {{ $game->title }} | Game description: {{ $game->description }}
    </div>
    <div style="margin-bottom: 20px;">
        @php
            $videoId = str_replace('https://youtu.be/', '', $game->trailer);
        @endphp
        <iframe 
            width="280" 
            height="158" 
            src="https://www.youtube.com/embed/{{ $videoId }}" 
            frameborder="0" 
            allow="autoplay; encrypted-media" 
            allowfullscreen>
        </iframe>
</div>
@endforeach
