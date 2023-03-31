<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Divisi;

class DepartmentController extends Controller
{
    public function index()
    {
        $departments = Department::get();
        return view('themes.back.Master.Department.index',compact(
            'departments'
        ));
    }

    public function create()
    {
        $divisis = Divisi::get();
        return view('themes.back.Master.Department.create', compact(
            'divisis'
        ));
    }

    public function store(DepartmentRequest $request)
    {
        Department::create([
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaDept' => $request['txtNamaDept'],
            'divisi_id' => $request['divisi_id']
        ]);
        return redirect()->route('departments.index')
            ->with('messages','Berhasil menambahkan department');
    }

    public function edit(Department $department)
    {
        $divisis = Divisi::get();
        return view('themes.back.Master.Department.edit',compact(
            'department',
            'divisis'
        ));
    }

    public function update(DepartmentRequest $request, Department $department)
    {
        $department->update([
            'txtIdDept' => $request['txtIdDept'],
            'txtNamaDept' => $request['txtNamaDept'],
            'divisi_id' => $request['divisi_id']
        ]);
        return redirect()->route('departments.index')
            ->with('messages','Berhasil memperbaharui department');
    }

    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')
            ->with('messages','Berhasil menghapus department');
    }
}
