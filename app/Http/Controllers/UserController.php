<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of users.
     */
    public function index()
    {
        $users = User::with('roles')->paginate(10); // Fetch users with roles
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new user.
     */
    public function create()
    {
        $roles = Role::all();
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created user in the database.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']),
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles); // Assign roles
        }

        return redirect()->route('users.index')->with('success', 'User created successfully!');
    }


    /**
     * Show the form for editing a user.
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('users.edit', compact('user', 'roles'));
    }

    /**
     * Update a user's details and roles.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'roles' => 'nullable|array',
            'roles.*' => 'exists:roles,id',
        ]);

        $user = User::findOrFail($id);
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
        ]);

        if ($request->has('roles')) {
            $user->roles()->sync($request->roles); // Update roles
        }

        return redirect()->route('users.index')->with('success', 'User updated successfully!');
    }

    /**
     * Delete a user from the system.
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->roles()->detach(); // Remove associated roles before deleting
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User deleted successfully!');
    }
}
