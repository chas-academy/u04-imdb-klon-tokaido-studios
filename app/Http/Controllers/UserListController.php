<?php

namespace App\Http\Controllers;

use App\Models\UserList;
use Illuminate\Http\Request;

class UserListController extends Controller
{
    public function index()
    {
        $lists = auth()->user()->lists;
        return view('lists.index', compact('lists'));
    }

    public function create()
    {
        return view('lists.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'listname' => 'required|unique:user_lists|max:255',
            'description' => 'nullable',
        ]);

        $list = auth()->user()->lists()->create($validated);

        return redirect()->route('lists.show', $list);
    }

    public function show(UserList $list)
    {
        return view('lists.show', compact('list'));
    }

    public function edit(UserList $list)
    {
        return view('lists.edit', compact('list'));
    }

    public function update(Request $request, UserList $list)
    {
        $validated = $request->validate([
            'listname' => 'required|unique:user_lists,listname,' . $list->listID . ',listID|max:255',
            'description' => 'nullable',
        ]);

        $list->update($validated);

        return redirect()->route('lists.show', $list);
    }

    public function destroy(UserList $list)
    {
        $list->delete();
        return redirect()->route('lists.index');
    }
}
