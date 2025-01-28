<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => $this->faker->unique()->word, // Unikt genrenamn
            'description' => $this->faker->optional()->sentence, // Valfri beskrivning
            // 'created_at' och 'updated_at' hanteras automatiskt av Laravel
        ];
    }
}