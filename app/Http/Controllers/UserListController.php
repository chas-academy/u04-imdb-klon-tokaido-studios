<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserList;
use Illuminate\Http\Request;

class UserListController extends Controller
{ // inloggad user se sina listor
    public function index()
    {
        $user = auth()->user(); 
        $lists = $user->lists;
        return view("Userlist.index", ["lists" => $lists]);
    }

    public function createList()
    {
        return view("Userlist.create");
    }

    public function storeList(Request $request)
    {
        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "required",
        ]);

            // Skapa en ny lista och koppla den till den inloggade användaren
        $list = new UserList();
        $list->listname = $validatedData['listname'];
        $list->description = $validatedData['description'];
        $list->userID = auth()->user()->userID; 
        $list->save(); 

        return redirect()->route('user.lists')->with('success', 'list created');
    }
    // edit lista
    public function editList($listID)
    {
        $list = Userlist::findOrFail($listID);
        return view("Userlist.edit", ["list" => $list]);
    }

    public function updateList(Request $request, $listID)
    {
        $validatedData = $request->validate([
            "listname" => "required|max:255",
            "description" => "required",
        ]);

        $list =USerlist::findOrFail($listID);
        $list->update($validatedData);

        return redirect()->route("user.list")->with("succes", "list has been updated");
    }

    //delete list
    public function deleteList($listID)
    {
        $list = Userlist::findOrFail($listID);
        $list->delete();

        return redirect()->route("user.list")->with("succes", "list has been deleted");
    }
    // behövs den tabort?
    // visa lista för en viss user via userID 
    public function showlists($userID)
    {
        $user = User::findOrFail($userID); 
        $lists = $user->lists; 
        return view("Userlist.index", ["lists" => $lists]);
    }
}
