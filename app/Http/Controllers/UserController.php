<?php

namespace App\Http\Controllers;

use App\Models\UserMaster;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = UserMaster::orderBy('created_at', 'desc')->paginate(20)
        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users_master,email',
            'department' => 'nullable|string|max:255',
            'role'       => 'required|in:admin,user',
        ]);

        $validated['is_active'] = $request->boolean('is_active', true);

        UserMaster::create($validated);

        return redirect()->route('users.index')->with('success', 'ユーザーを作成しました');
    }

    public function edit($id)
    {
        $user = UserMaster::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = UserMaster::findOrFail($id);

        $validated = $request->validate([
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|unique:users_master,email,' . $id,
            'department' => 'nullable|string|max:255',
            'role'       => 'required|in:admin,user',
        ]);

        $validated['is_active'] = $request->boolean('is_active', false);

        $user->update($validated);

        return redirect()->route('users.index')->with('success', 'ユーザーを更新しました');
    }

    public function destroy($id)
    {
        $user = UserMaster::findOrFail($id);
        $user->delete();

        return redirect()->route('users.index')->with('success', 'ユーザーを削除しました');
    }
}
