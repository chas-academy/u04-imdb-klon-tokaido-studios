<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    
    public function run(): void
    {
        $users = [
            [
                "userID" => 1,
                "username" => "PixelWarrior",
                "email" => "pixelwarrior@example.com",
                "password" => "pixel",
                "country" => "USA",
                "is_admin" => false
            ],
            [
                "userID" => 2,
                "username" => "XP_Explorer",
                "email" => "xp_explorer@example.com",
                "password" => "xp",
                "country" => "Sweden",
                "is_admin" => false
            ],
            [
                "userID" => 3,
                "username" => "VortexPlayer",
                "email" => "vortexplayer@example.com",
                "password" => "vortex",
                "country" => "USA",
                "is_admin" => false
            ],
            [
                "userID" => 4,
                "username" => "QuestMasterX",
                "email" => "questmasterx@example.com",
                "password" => "quest",
                "country" => "Australia",
                "is_admin" => false
            ],
            [
                "userID" => 5,
                "username" => "ManaMancer",
                "email" => "manamancer@example.com",
                "password" => "mana",
                "country" => "USA",
                "is_admin" => true
            ],
            [
                "userID" => 6,
                "username" => "AdamWarlock", 
                "email" => "adamwarlock@example.com",
                "password" => "adam", 
                "country" => "UK", 
                "is_admin" => true
            ]
            ];
            foreach ($users as $user) {
                // Använd e-post som unik identifierare
                User::updateOrCreate(
                    ['email' => $user['email']], // Kontrollera på e-post
                    [
                        'userID' => $user['userID'],
                        'username' => $user['username'],
                        'password' => $user['password'],
                        'country' => $user['country'],
                        'is_admin' => $user['is_admin']
                    ]
                );
            }

    }
}
