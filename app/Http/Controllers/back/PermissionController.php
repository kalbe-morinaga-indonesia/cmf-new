<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionRequest;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        $permissions = Permission::get();
        return view('themes.back.role-and-permission.Permission.index', compact(
            'permissions'
        ));
    }

    public function create()
    {
        return view('themes.back.role-and-permission.Permission.create');
    }

    public function store(PermissionRequest $request)
    {
        Permission::create([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? 'web'
        ]);

        return redirect()->route('permissions.index')
            ->with('messages','Berhasil menambahkan permission');
    }

    public function edit(Permission $permission)
    {
        return view('themes.back.role-and-permission.Permission.edit', compact(
            'permission'
        ));
    }

    public function update(Permission $permission, PermissionRequest $request)
    {
        $permission->update([
            'name' => $request->name,
            'guard_name' => $request->guard_name ?? ''
        ]);
        return redirect()->route('permissions.index')
            ->with('messages','Berhasil memperbaharui permission');
    }

    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')
            ->with('messages','Berhasil menghapus permissions');
    }
}
