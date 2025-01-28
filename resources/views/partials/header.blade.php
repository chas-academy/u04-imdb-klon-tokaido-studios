
    <header>
        <div class="py-4 px-6 flex items-center justify-between">
            <!-- Logo -->
            <a href="/" class="text-2xl font-bold">
                IGDb <!-- Ersätts med en logga när vi har en -->
            </a>

            <!-- Sökbar med Dropdown -->
            <div class="flex items-center space-x-2">
                <!-- Dropdown -->
                <div class="relative">
                    <label for="category" class="sr-only">Välj kategori</label>
                    <select id="category" class="bg-white text-gray-700 text-sm rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500 hover:bg-gray-100">
                        <option value="all">Alla kategorier</option>
                        <option value="genre">Genrer</option>
                        <option value="platform">Plattformar</option>
                    </select>
                </div>
                <!-- Sök-input -->
                <label for="search" class="sr-only">Sök</label>
                <input 
                    id="search"
                    type="text" 
                    placeholder="Search..." 
                    class="w-full sm:w-64 px-4 py-2 rounded-md bg-white text-gray-700 text-sm focus:ring-indigo-500 focus:border-indigo-500"
                />
            </div>

            <!-- Auth länkar -->
            <div class="flex items-center space-x-4">
                @if (Auth::check())
                    <!-- Om inloggad -->
                    <span class="text-sm">{{ Auth::user()->name }}</span>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="text-sm hover:underline">Log Out</button>
                    </form>
                @else
                    <!-- Om inte inloggad -->
                    <x-button-styles size="large" class="ml-4">
                        <a href="#" class="text-sm hover:underline">Logga in</a>
                    </x-button-styles>
                    <x-button-styles size="large">
                        <a href="#" class="text-sm hover:underline">Knapp 2</a>
                    </x-button-styles>
                    <x-button-styles size="large">
                        <a href="#" class="text-sm hover:underline">Knapp 3</a>
                    </x-button-styles>
                    <x-button-styles size="large">
                        <a href="#" class="text-sm hover:underline">Knapp 4</a>
                    </x-button-styles>
                    <x-button-styles size="large">
                        <a href="#" class="text-sm hover:underline">Knapp 5</a>
                    </x-button-styles>
                @endif
            </div>
        </div>
    </header>