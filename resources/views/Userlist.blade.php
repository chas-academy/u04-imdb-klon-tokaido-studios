<div>
<h1>Listor för användaren</h1>

@if($lists->isEmpty())
    <p>Inga listor hittades.</p>
@else
    <ul>
        @foreach($lists as $list)
            <li>
                <h2>{{ $list->listname }}</h2>
                <p>{{ $list->description }}</p>
                
                <ul>
                    @foreach($list->games as $game)
                        <li>{{ $game->name }}</li> 
                    @endforeach
                </ul>
            </li>
        @endforeach
    </ul>
@endif

<h1>Skapa en ny lista</h1>

<!-- Formulär för att skapa lista -->
<form action="{{ route('user.storeList') }}" method="POST">
    @csrf
    <div>
        <label for="listname">Listnamn:</label>
        <input type="text" id="listname" name="listname" required>
    </div>

    <div>
        <label for="description">Beskrivning:</label>
        <textarea id="description" name="description" required></textarea>
    </div>

    <button type="submit">Skapa lista</button>
</form>

<h1>Redigera Lista</h1>

    <form action="{{ route('user.updateList', $list->listID) }}" method="POST">
        @csrf
        @method('PUT') <!-- För att indikera att detta är en PUT-begäran -->

        <div>
            <label for="listname">Listnamn:</label>
            <input type="text" id="listname" name="listname" value="{{ old('listname', $list->listname) }}" required>
        </div>

        <div>
            <label for="description">Beskrivning:</label>
            <textarea id="description" name="description" required>{{ old('description', $list->description) }}</textarea>
        </div>

        <button type="submit">Uppdatera Lista</button>
    </form>

    <form action="{{ route('user.deleteList', $list->listID) }}" method="POST">
        @csrf
        @method('DELETE') <!-- För att indikera att detta är en DELETE-begäran -->
        <button type="submit">Ta bort Lista</button>
    </form>
</div>
