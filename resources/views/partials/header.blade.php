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
        <div class="max-w-7xl mx-auto py-4 px-6 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold flex-shrink-0">
                IGDb
            </a>

            <!-- Sök och dropdown -->
            <div class="flex items-center space-x-2 flex-grow sm:flex-grow-0">
                <div class="relative">
                    <label for="category" class="sr-only">Välj kategori</label>
                    <select 
                        id="category" 
                        class="text-sm rounded-md px-3 py-2 focus:ring focus:border w-40">
                        <option value="all">Alla kategorier</option>
                        <option value="genre">Genrer</option>
                        <option value="platform">Plattformar</option>
                    </select>
                </div>
                <div class="flex-grow sm:flex-grow-0">
                    <label for="search" class="sr-only">Sök</label>
                    <input 
                        id="search"
                        type="text" 
                        placeholder="Sök spel, plattformar..." 
                        class="w-full sm:w-64 px-4 py-2 rounded-md text-sm focus:ring focus:border"
                    />
                </div>
            </div>

            <!-- Hamburgermeny för Auth länkar -->
            <div class="sm:hidden">
                <x-button-styles id="menu-button" class="flex items-center text-sm px-2 py-1 border rounded focus:outline-none">
                    <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </x-button-styles>
            </div>

            <!-- Auth länkar -->
            <div id="menu" class="hidden sm:flex items-center space-x-4 mt-4 sm:mt-0 flex-col sm:flex-row">
                @if (Auth::check())
                    <!-- Om inloggad -->
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                    <form method="POST" action="">
                        @csrf
                        <button type="submit" class="text-sm hover:underline">Logga ut</button>
                    </form>
                @else
                    <!-- Om inte inloggad -->
                    <x-button-styles>
                        <a href="#" class="text-sm hover:underline">Logga in</a>
                    </x-button-styles>
                    <x-button-styles>
                        <a href="#" class="text-sm hover:underline">Registrera</a>
                    </x-button-styles>
                @endif
            </div>
        </div>
    </header>

    <!-- Script för hamburgermeny -->
    <script>
        const menuButton = document.getElementById('menu-button');
        const menu = document.getElementById('menu');

        menuButton.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });
    </script>
</body>
</html>
