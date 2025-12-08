<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        if (!auth()->user()->isAdminLevel()) {
            abort(403, 'Unauthorized - Admin access required');
        }

        $users = User::latest()->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized - Full admin access required');
        }

        return view('admin.user.create');
    }

    public function store(Request $request)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized - Full admin access required');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,sub_admin',
        ]);

        $validated['password'] = bcrypt($validated['password']);

        User::create($validated);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil ditambahkan!');
    }

    public function edit(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized - Full admin access required');
        }

        return view('admin.user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized - Full admin access required');
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,sub_admin',
        ]);

        $user->update($validated);

        return redirect()->route('admin.user.index')->with('success', 'User berhasil diperbarui!');
    }

    public function destroy(User $user)
    {
        if (!auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized - Full admin access required');
        }

        // Prevent deleting self
        if ($user->id === auth()->id()) {
            return redirect()->route('admin.user.index')->with('error', 'Tidak dapat menghapus akun sendiri!');
        }

        $user->delete();
        return redirect()->route('admin.user.index')->with('success', 'User berhasil dihapus!');
    }
}