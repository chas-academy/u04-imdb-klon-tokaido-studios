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
            "name" => "PC",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Desktop_personal_computer.jpg/200px-Desktop_personal_computer.jpg"
        ],
        [
            "platformID" => 2,
            "name" => "PlayStation 4",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/7e/PS4-Console-wDS4.jpg/220px-PS4-Console-wDS4.jpg"
        ],
        [
            "platformID" => 3,
            "name" => "PlayStation 5",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/7/77/Black_and_white_Playstation_5_base_edition_with_controller.png/220px-Black_and_white_Playstation_5_base_edition_with_controller.png"
        ],
        [
            "platformID" => 4,
            "name" => "Xbox Series X/S",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/54/Xbox_Series_S_with_controller.jpg/130px-Xbox_Series_S_with_controller.jpg"
        ],
        [
            "platformID" => 5,
            "name" => "Xbox One",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/c/c7/Xbox_One_consoles_montage.png/453px-Xbox_One_consoles_montage.png"
        ],
        [
            "platformID" => 6,
            "name" => "Nintendo Switch",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/8/88/Nintendo-Switch-wJoyCons-BlRd-Standing-FL.jpg/300px-Nintendo-Switch-wJoyCons-BlRd-Standing-FL.jpg"
        ],
        [
            "platformID" => 7,
            "name" => "Steam Deck",
            'image' => "https://upload.wikimedia.org/wikipedia/commons/thumb/5/5d/Steam_Deck_%28front%29.png/220px-Steam_Deck_%28front%29.png"
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
