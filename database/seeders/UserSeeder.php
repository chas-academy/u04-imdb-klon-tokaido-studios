<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

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
                "isAdmin" => false
            ],
            [
                "userID" => 2,
                "username" => "XP_Explorer",
                "email" => "xp_explorer@example.com",
                "password" => "xp",
                "country" => "Sweden",
                "isAdmin" => false
            ],
            [
                "userID" => 3,
                "username" => "VortexPlayer",
                "email" => "vortexplayer@example.com",
                "password" => "vortex",
                "country" => "USA",
                "isAdmin" => false
            ],
            [
                "userID" => 4,
                "username" => "QuestMasterX",
                "email" => "questmasterx@example.com",
                "password" => "quest",
                "country" => "Australia",
                "isAdmin" => false
            ],
            [
                "userID" => 5,
                "username" => "ManaMancer",
                "email" => "manamancer@example.com",
                "password" => "mana",
                "country" => "USA",
                "isAdmin" => true
            ],
            [
                "userID" => 6,
                "username" => "AdamWarlock", 
                "email" => "adamwarlock@example.com",
                "password" => "adam", 
                "country" => "UK", 
                "isAdmin" => true
            ]
            ];
            foreach ($users as $user) {
                // Använd e-post som unik identifierare
                User::updateOrCreate(
                    ['email' => $user['email']], // Kontrollera på e-post
                    [
                        'userID' => $user['userID'],
                        'username' => $user['username'],
                        'password' => Hash::make($user['password']),
                        'country' => $user['country'],
                        'isAdmin' => $user['isAdmin']
                    ]
                );
            }

    }
}
