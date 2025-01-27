<header class="bg-indigo-600 text-white shadow">
    <div class="max-w-7xl mx-auto py-4 px-6 flex items-center justify-between">
        <!-- Logo -->
        <a href="" class="text-2xl font-bold">
            IGDb <!-- Ersätts med en logga när vi har en -->
        </a>

        <!-- Sökbar med Dropdown -->
        <div class="flex items-center space-x-2">
            <!-- Själva dropdownen -->
            <div class="relative">
                <select class="bg-white text-gray-700 text-sm rounded-md px-3 py-2 focus:ring-indigo-500 focus:border-indigo-500">
                    <option value="all">Alla kategorier</option>
                    <option value="genre">Genrer</option>
                    <option value="platform">Plattformar</option>
                </select>
            </div>
            <!-- Sök-input -->
            <input 
                type="text" 
                placeholder="Search..." 
                class="w-64 px-4 py-2 rounded-md bg-white text-gray-700 text-sm focus:ring-indigo-500 focus:border-indigo-500"
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
                <a href="" class="text-sm hover:underline">Logga in</a>
                <a href="" class="text-sm hover:underline">Registera</a>
            @endif
        </div>
    </div>
</header>
