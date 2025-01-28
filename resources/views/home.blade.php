@include ('partials.header')

<div>
    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="title" placeholder="Search games..." required>
        <button type="submit">Search</button>
    </form>
    <a href="/games">View all games</a><br>
    <a href="/genres">View all genres</a><br>
</div>