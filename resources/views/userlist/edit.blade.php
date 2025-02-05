@extends('layouts.app')

@section('content')
    <h1>Redigera lista</h1>
    <form action="{{ route('user.lists.update', ['listID' => $list->listID]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="listname">Listnamn</label>
            <input type="text" class="form-control" id="listname" name="listname" value="{{ $list->listname }}" required>
        </div>
        <div class="form-group">
            <label for="description">Beskrivning</label>
            <textarea class="form-control" id="description" name="description">{{ $list->description }}</textarea>
        </div>
        <div class="form-group">
            <label for="games">Välj spel</label>
            <select multiple class="form-control" id="games" name="games[]">
                @foreach($games as $game)
                    <option value="{{ $game->gameID }}" {{ $list->games->contains('gameID', $game->gameID) ? 'selected' : '' }}>
                        {{ $game->title }}
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Uppdatera lista</button>
    </form>
@endsection