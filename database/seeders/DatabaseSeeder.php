<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Genre;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call(GenreSeeder::class);

        $genres = Genre::all();

        Game::factory(20)->create()->each(function ($game) use ($genres) {
            $game->genres()->attach(
                $genres->random(rand(1, 2))->pluck('genreID')->toArray()
            );
        });
    }
}