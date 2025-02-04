@extends('layouts.app')

@section('content')
    <h1>Mina Listor</h1>
    <a href="{{ route('user.lists.create') }}" class="btn btn-primary">Skapa ny lista</a>

    @if($lists->isEmpty())
        <p class="mt-3">Du har inga listor än. Skapa din första lista nu!</p>
    @else
        @foreach ($lists as $list)
            <div class="card mt-3">
                <div class="card-body">
                    <h5 class="card-title">{{ $list->listname }}</h5>
                    <p class="card-text">{{ $list->description }}</p>
                    
                    @if($list->games->isNotEmpty())
                        <h6>Spel i listan:</h6>
                        <ul>
                            @foreach($list->games as $game)
                                <li>{{ $game->title }}</li>
                            @endforeach
                        </ul>
                    @else
                        <p>Inga spel tillagda i denna lista.</p>
                    @endif

                    <a href="{{ route('user.lists.edit', ['listID' => $list->listID]) }}" class="btn btn-secondary">Redigera</a>
                    <form action="{{ route('user.lists.delete', ['listID' => $list->listID]) }}" method="POST" style="display: inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Är du säker?')">Radera</button>
                    </form>
                </div>
            </div>
        @endforeach
    @endif
@endsection