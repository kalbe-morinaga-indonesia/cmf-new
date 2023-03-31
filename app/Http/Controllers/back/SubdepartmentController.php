<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubdepartmentRequest;
use App\Models\Department;
use App\Models\Subdepartment;

class SubdepartmentController extends Controller
{
    public function index()
    {
        $subdepartments = Subdepartment::with('department')->get();
        return view('themes.back.Master.SubDepartment.index', compact(
            'subdepartments'
        ));
    }

    public function create()
    {
        $departments = Department::get();
        return view('themes.back.Master.SubDepartment.create', compact(
            'departments'
        ));
    }

    public function store(SubdepartmentRequest $request)
    {
        Subdepartment::create([
            'txtIdSubDept' => $request['txtIdSubDept'],
            'txtNamaSubDept' => $request['txtNamaSubDept'],
            'department_id' => $request['department_id']
        ]);
        return redirect()->route('subdepartments.index')
            ->with('messages','Berhasil menambahkan subdepartment');
    }

    public function edit(Subdepartment $subdepartment)
    {
        $departments = Department::get();
        return view('themes.back.Master.SubDepartment.edit',compact(
            'subdepartment',
            'departments'
        ));
    }

    public function update(Subdepartment $subdepartment, SubdepartmentRequest $request)
    {
        $subdepartment->update([
            'txtIdSubDept' => $request['txtIdSubDept'],
            'txtNamaSubDept' => $request['txtNamaSubDept'],
            'department_id' => $request['department_id']
        ]);
        return redirect()->route('subdepartments.index')
            ->with('messages','Berhasil memperbaharui subdepartment');
    }

    public function destroy(Subdepartment $subdepartment)
    {
        $subdepartment->delete();
        return redirect()->route('subdepartments.index')
            ->with('messages','Berhasil menghapus subdepartment');
    }
}
