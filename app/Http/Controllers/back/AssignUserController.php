<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class AssignUserController extends Controller
{
    public function index()
    {
        $users = User::with('roles')->get();
        $roles = Role::get();
        return view('themes.back.role-and-permission.Assign-User.index', compact(
            'users',
            'roles'
        ));
    }

    public function create()
    {
        $users = User::with('roles')->get();
        $roles = Role::get();
        return view('themes.back.role-and-permission.Assign-User.create', compact(
            'users',
            'roles'
        ));
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $user->assignRole($request->roles);

        return redirect()->route('assign-users.index')
            ->with('messages',"Role berhasil diberikan kepada user $user->email");
    }

    public function edit($assign_user)
    {
        $user = User::findOrFail($assign_user);
        $roles = Role::get();
        $users = User::get();
        return view('themes.back.role-and-permission.Assign-User.edit',compact(
            'user',
            'roles',
            'users'
        ));
    }

    public function update($assign_user, Request $request)
    {
        $user = User::findOrFail($assign_user);
        $user->syncRoles($request->roles);
        return redirect()
            ->route('assign-users.index')
            ->with('messages',"Role berhasil di synchronize");
    }
}
