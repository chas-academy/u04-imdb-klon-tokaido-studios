@extends('layouts.app')

@section('content')
    <h1>Skapa ny lista</h1>
    <form action="{{ route('user.lists.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="listname">Listnamn</label>
            <input type="text" class="form-control" id="listname" name="listname" required>
        </div>
        <div class="form-group">
            <label for="description">Beskrivning</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>
        <div class="form-group">
            <label for="games">Välj spel</label>
            <select multiple class="form-control" id="games" name="games[]">
                @foreach($games as $game)
                    <option value="{{ $game->gameID }}">{{ $game->title }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Skapa lista</button>
    </form>
@endsection