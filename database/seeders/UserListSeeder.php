<?php

namespace Database\Seeders;
use App\Models\UserList;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // lista med olika listor
       $lists = [
        [
            "listID" => 1,
            "listname" => "Top 5 Games",
            "description" => "A list of the best games we recommend right now",
            "userID" => 1,
            "games" => [2, 4, 6, 10, 12]
        ],
        [
            "listID" => 2,
            "listname" => "My favourites",
            "description" => "My favourites games list",
            "userID" => 4,
            "games" => [1, 3, 5, 8]
        ],
        [
            "listID" => 3,
            "listname" => "Games to buy", 
            "description" => "A list of games I want to buy",
            "userID" => 2, 
            "games" => [7, 9, 11] 
        ],
    ];
        // Skapa eller uppdatera listor i databasen
        foreach ($lists as $list) {
            $userList = UserList::updateOrCreate(
                ['listID' => $list['listID']],
                [
                    'listname' => $list['listname'],
                    'description' => $list['description'],
                    'userID' => $list['userID'],
                ]
            );

            // Lägg till spel i listan, om inte redan kopplade
            $userList->games()->syncWithoutDetaching($list['games']); // Lägg till spel men behåll befintliga relationer
        }
    }
}
