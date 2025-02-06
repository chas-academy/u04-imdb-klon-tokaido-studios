<?php

namespace Database\Seeders;
use App\Models\Platform;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
    $platforms = [
        [
            "platformID" => 1,
            "namn" => "PC"
        ],
        [
            "platformID" => 2,
            "namn" => "PlayStation 4"
        ],
        [
            "platformID" => 3,
            "namn" => "PlayStation 5"
        ],
        [
            "platformID" => 4,
            "namn" => "Xbox Series X/S"
        ],
        [
            "platformID" => 5,
            "namn" => "Xbox One"
        ],
        [
            "platformID" => 6,
            "namn" => "Nintendo Switch"
        ],
        [
            "platformID" => 7,
            "namn" => "Steam Deck"
        ]
    ];

        foreach ($platforms as $platform) {
            Platform::updateOrCreate(
                ['PlatformID' => $platform['PlatformID']], // Kontrollera om PlatformID redan finns
                [
                    'name' => $platform['name'],
                    'description' => "Games in the {$platform['name']} Platform"
                ]
    
            );
    }}
}
