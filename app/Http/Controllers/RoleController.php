<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::orderBy('name')->paginate(10);
        return view('roles.list', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $permissions = Permission::orderBy('created_at',)->get();
        return view('roles.create', [
            'permissions' => $permissions,
        ]);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3',
        ]);

        if ($validator->passes()) {
            $role = Role::create(['name' => $request->name]);
            if (!empty($request->permissions)) {
                foreach ($request->permissions as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()->route('roles.index')->with('success', 'Role added successfully');
        } else {
            return redirect()->route('roles.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $role = Role::findorFail($id);
        $hasPermissions = $role->permissions->pluck('name');
        $permissions = Permission::orderBy('name')->get();

        return view('roles.edit', [
            'role' => $role,
            'hasPermissions'  => $hasPermissions,
            'permissions' => $permissions,
        ]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,' . $id,
            'permissions' => 'nullable|array',
            'permissions.*' => 'exists:permissions,name',
        ]);

        $role = Role::findOrFail($id);
        $role->update([
            'name' => $request->name,
        ]);

        // Sync permissions
        $role->permissions()->sync(Permission::whereIn('name', $request->permissions ?? [])->pluck('id'));

        return redirect()->route('roles.index')->with('success', 'Role updated successfully!');
    }


    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // Detach all permissions before deleting the role
        $role->permissions()->detach();

        // Now delete the role
        $role->delete();

        return redirect()->route('roles.index')->with('success', 'Role deleted successfully!');
    }
}
