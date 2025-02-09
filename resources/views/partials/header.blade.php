<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IGDb - Din spelguide</title>
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header>
        <div class="max-w-7xl mx-auto py-4 px-6 flex items-center justify-between flex-wrap md:flex-nowrap">
            <!-- Logo -->
            <a href="/" class="mr-4 text-2xl font-bold flex-shrink-0">
                IGDb
            </a>
            @auth
                <div>You are logged in as: {{ Auth::user()->username }}</div>
            @endauth
            
            @guest
                <div>You are not logged in</div>
            @endguest

            <!-- Sök och dropdown -->
            <div class="mr-4 flex items-center space-x-2 flex-grow sm:flex-grow-0">
                <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2">

                    <input class="w-full sm:w-48 md:w-64"
                        type="text" 
                        name="title" 
                        placeholder="Search games..." 
                        class="w-full sm:w-64 px-4 py-2 rounded-md text-sm focus:ring focus:border">

                    <x-button-styles class="w-full md:w-auto"
                        type="submit" 
                        class="px-4 py-2 rounded-md">
                        Search</x-button-styles>
                </form>
            </div>

            <!-- Hamburgermeny för små skärmar -->
            <div class="md:hidden">
                <x-button-styles id="menu-button" class="flex items-center text-sm px-2 py-1 border rounded focus:outline-none w-full md:w-auto">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </x-button-styles>
            </div>

            <!-- Auth länkar för större skärmar -->
            <div id="menu-desktop" class="hidden md:flex items-center space-x-4">
                <x-button-styles class="w-full md:w-auto">
                    <a href="{{ route('games.index') }}" class="hover:underline">Games</a>
                </x-button-styles>

                <x-button-styles class="w-full md:w-auto">
                    <a href="{{ route('genres.index') }}" class="hover:underline">Genres</a>
                </x-button-styles>

                <x-button-styles class="w-full md:w-auto">
                    <a href="{{ route('platforms.index') }}" class="hover:underline">Platforms</a>
                </x-button-styles>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <x-button-styles type="submit" class="hover:underline">Log out</x-button-styles>
                    </form>
                    <x-button-styles class="w-full md:w-auto">
                        <a href="{{ route('users.profile') }}" class="btn btn-primary">My Profile</a>
                    </x-button-styles>
                @endauth
                @guest
                    <x-button-styles>
                        <a href="{{ route('login') }}" class="hover:underline w-full md:w-auto">Log in</a>
                    </x-button-styles>
                    <x-button-styles>
                        <a href="{{ route('registerNewUser') }}" class="hover:underline w-full md:w-auto">Register</a>
                    </x-button-styles>
                @endguest
            </div>
        </div>
    </header>
</body>
</html>