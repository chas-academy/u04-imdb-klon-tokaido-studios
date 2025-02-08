<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserListController extends Controller
{

    public function index()
    {
        $lists = Auth::user()->lists;
        return view("users.lists", ["lists" => $lists]);
    }

    public function createList()
    {
        $games = Game::all();
        return view("userlist.create", ["games" => $games]);
    }

    public function storeList(Request $request)
    {
        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "nullable|string",
            "games" => "array",
        ]);

        $list = new UserList();
        $list->listname = $validatedData['listname'];
        $list->description = $validatedData['description'];
        $list->userID = Auth::id();
        $list->save();

        if (isset($validatedData['games'])) {
            $list->games()->attach($validatedData['games']);
        }

        return redirect()->route('users.lists')->with('success', 'List created with games');
    }

    public function editList($listID)
    {
        $list = UserList::findOrFail($listID);
        $games = Game::all();
        return view("userlist.edit", ["list" => $list, "games" => $games]);
    }

    public function updateList(Request $request, $listID)
    {
        $list = UserList::findOrFail($listID);

        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "nullable|string",
            "games" => "array",
        ]);

        $list->update($validatedData);

        if (isset($validatedData['games'])) {
            $list->games()->sync($validatedData['games']);
        } else {
            $list->games()->detach();
        }

        return redirect()->route("users.lists")->with("success", "List has been updated with games");
    }

    public function deleteList($listID)
    {
        $list = UserList::findOrFail($listID);

        $list->games()->detach();
        $list->delete();

        return redirect()->route("users.lists")->with("success", "List has been deleted");
    }

    public function showLists($userID)
    {
        $user = User::findOrFail($userID);
        $lists = $user->lists;
        return view("users.lists", ["lists" => $lists]);
    }

    public function showAllLists()
    {
        $allLists = UserList::with('user', 'games')->get();
        return view("userlist.all", ["lists" => $allLists]);
    }
}