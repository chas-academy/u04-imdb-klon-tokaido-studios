<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

@include('partials.header')

<x-content-styles>

    <form action="{{ route('search') }}" method="GET">
        <input type="text" name="title" placeholder="Search games..." required>
        <button type="submit">Search</button>
    </form>
    <a href="/games" >View all games</a><br>
    <a href="/genres">View all genres</a><br>
</x-content-styles>

@include('partials.footer')
    
</body>
</html>