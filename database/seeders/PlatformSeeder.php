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
            "name" => "PC"
        ],
        [
            "platformID" => 2,
            "name" => "PlayStation 4"
        ],
        [
            "platformID" => 3,
            "name" => "PlayStation 5"
        ],
        [
            "platformID" => 4,
            "name" => "Xbox Series X/S"
        ],
        [
            "platformID" => 5,
            "name" => "Xbox One"
        ],
        [
            "platformID" => 6,
            "name" => "Nintendo Switch"
        ],
        [
            "platformID" => 7,
            "name" => "Steam Deck"
        ]
    ];

    foreach ($platforms as $platform) {
        Platform::updateOrCreate(
            ['platformID' => $platform['platformID']], //kolla om idet finns
            ['name' => $platform['name']], // 'description' => "Games for {$platform['name']}"]
        );
    
    
    }
}
}
