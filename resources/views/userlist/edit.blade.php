@extends('layouts.app')

@section('content')
    <h1>Edit list</h1>
    <form action="{{ route('userlist.update', ['listID' => $list->listID]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="listname">Listname</label>
            <input type="text" class="form-control" id="listname" name="listname" value="{{ $list->listname }}" required>
        </div>
        @if ($errors->any())
            <div class="alert alert-danger text-red-600">
                <ul>
                    @foreach ($errors->get('listname') as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="form-group">
            <label for="description">description</label>
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
        <button type="submit" class="btn btn-primary">Update List</button>
    </form>
@endsection