<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use App\Models\Game;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    private $simulatedUserID = 1;

    public function index()
    {
        $user = User::find($this->simulatedUserID);
        $lists = $user->lists;
        return view("userlist.index", ["lists" => $lists]);
    }

    public function createList()
    {
        $games = Game::all(); // Hämta alla spel för att visa i formuläret
        return view("userlist.create", ["games" => $games]);
    }

    public function storeList(Request $request)
    {
        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "nullable|string",
            "games" => "array", // Validera att games är en array
        ]);

        $list = new UserList();
        $list->listname = $validatedData['listname'];
        $list->description = $validatedData['description'];
        $list->userID = $this->simulatedUserID;
        $list->save();

        // Lägg till spel i listan om några valdes
        if (isset($validatedData['games'])) {
            $list->games()->attach($validatedData['games']);
        }

        return redirect()->route('user.lists')->with('success', 'List created with games');
    }

    public function editList($listID)
    {
        $list = UserList::findOrFail($listID);
        $games = Game::all(); // Hämta alla spel för att visa i formuläret
        return view("userlist.edit", ["list" => $list, "games" => $games]);
    }

    public function updateList(Request $request, $listID)
    {
        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "nullable|string",
            "games" => "array", // Validera att games är en array
        ]);

        $list = UserList::findOrFail($listID);
        $list->update($validatedData);

        // Uppdatera spelen i listan
        if (isset($validatedData['games'])) {
            $list->games()->sync($validatedData['games']);
        } else {
            $list->games()->detach(); // Ta bort alla spel om inga valdes
        }

        return redirect()->route("user.lists")->with("success", "List has been updated with games");
    }

    public function deleteList($listID)
    {
        $list = UserList::findOrFail($listID);
        $list->games()->detach(); // Ta bort alla kopplingar till spel
        $list->delete();

        return redirect()->route("user.lists")->with("success", "List has been deleted");
    }

    public function showLists($userID)
    {
        $user = User::findOrFail($userID);
        $lists = $user->lists;
        return view("userlist.index", ["lists" => $lists]);
    }
}