<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::get();
        return view('themes.back.role-and-permission.Role.index', compact(
            'roles'
        ));
    }

    public function create()
    {
        return view('themes.back.role-and-permission.Role.create');
    }

    public function store(RoleRequest $request)
    {
        Role::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        return redirect()->route('roles.index')
            ->with('messages','Berhasil menambahkan role');
    }

    public function edit(Role $role)
    {
        return view('themes.back.role-and-permission.Role.edit', compact(
            'role'
        ));
    }

    public function update(Role $role, RoleRequest $request)
    {
        $role->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? ''
        ]);
        return redirect()->route('roles.index')
            ->with('messages','Berhasil memperbaharui role');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')
            ->with('messages','Berhasil menghapus role');
    }

}
