<?php

namespace App\Http\Controllers\back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AssignPermissionController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('themes.back.role-and-permission.Assign-Permission.index', compact(
            'roles',
            'permissions'
        ));
    }

    public function create()
    {
        $roles = Role::get();
        $permissions = Permission::get();
        return view('themes.back.role-and-permission.Assign-Permission.create',compact(
            'roles',
            'permissions'
        ));
    }

    public function store(Request $request)
    {
        $role = Role::find($request->role);
        $role->givePermissionTo($request->permission);
        return redirect()->route('assign-permissions.index')
            ->with('messages',"Permission berhasil diberikan kepada role $role->name");
    }

    public function edit($assign_permission)
    {
        $role = Role::findOrFail($assign_permission);
        $roles = Role::get();
        $permissions = Permission::get();
        return view('themes.back.role-and-permission.Assign-Permission.edit',compact(
            'roles',
            'permissions',
            'role'
        ));
    }

    public function update($assign_permission, Request $request)
    {
        $role = Role::findOrFail($assign_permission);
        $role->syncPermissions($request->permission);
        return redirect()
            ->route('assign-permissions.index')
            ->with('messages',"Permission berhasil di synchronize");
    }
}
