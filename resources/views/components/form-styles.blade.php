
<x-content-styles class="justify-center mx-w-md">
    <form>
        {{-- Titel för formuläret --}}
        <h2 class="text-xl font-semibold text-gray-800 mb-2">Lägg till Titel</h2>

        {{-- Inputfält --}}
        <div class="flex flex-col">
            <label for="name" class="text-xs font-medium text-gray-600">Name</label>
            <input 
                type="text" 
                id="name" 
                name="name" 
                placeholder="Ange ditt namn . . ." 
                class="px-1 py-1 border border-contentBox-border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        <div class="flex flex-col">
            <label for="email" class="text-xs font-medium text-gray-600">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                placeholder="Ange din e-post . . ." 
                class="p-1 border border-contentBox-border rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
            >
        </div>

        {{-- Skicka-knapp --}}
        <x-button-styles size="small" class="" type="submit">
            Skicka
        </x-button-styles>
    </form>
</x-content-styles>