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
    <header class="bg-gray-100shadow-md w-full">
        <div class="max-w-screen-xl mx-auto py-4 px-4 md:px-4 lg:px-6 flex items-center justify-between flex-wrap md:flex-nowrap">
            <!-- Logo -->
            <a href="/" class="text-xl md:text-xl lg:text-2xl font-bold flex-shrink-0">
                IGDb
            </a>

            <!-- Sökfält -->
            <div class="flex items-center space-x-2 flex-grow sm:flex-grow-0">
                <form action="{{ route('search') }}" method="GET" class="flex items-center space-x-2">
                    <input type="text" 
                        name="title" 
                        placeholder="Search games..." 
                        class="w-full max-[390px]:w-32 md:w-48 lg:w-64 px-4 py-2 rounded-md text-xs md:text-sm border focus:ring focus:border-gray-400">
                    
                    <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm rounded-md">
                        Search
                    </x-button-styles>
                </form>
            </div>

            <!-- Navigationsmeny -->
            <div class="flex items-center space-x-2 md:space-x-1 lg:space-x-4">
                <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                    <a href="{{ route('games.index') }}" class="hover:underline">Games</a>
                </x-button-styles>

                <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                    <a href="{{ route('genres.index') }}" class="hover:underline">Genres</a>
                </x-button-styles>

                <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                    <a href="{{ route('platforms.index') }}" class="hover:underline">Platforms</a>
                </x-button-styles>

                @auth
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <x-button-styles type="submit" class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm hover:underline">
                            Log out
                        </x-button-styles>
                    </form>
                    <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                        <a href="{{ route('users.profile') }}" class="hover:underline">My Profile</a>
                    </x-button-styles>
                @endauth

                @guest
                    <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                        <a href="{{ route('login') }}" class="hover:underline">Log in</a>
                    </x-button-styles>
                    <x-button-styles class="px-2 py-1 md:px-3 md:py-1 lg:px-4 lg:py-2 text-xs md:text-xs lg:text-sm">
                        <a href="{{ route('registerNewUser') }}" class="hover:underline">Register</a>
                    </x-button-styles>
                @endguest
            </div>
        </div>
    </header>
</body>
</html>