<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Cmf;
use App\Models\Department;
use App\Models\Divisi;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $user = User::get();
        $divisi = Divisi::get();
        $department = Department::get();
        $cmf = Cmf::get();
        return view('themes.back.dashboard',[
            'user' => $user->count(),
            'divisi' => $divisi->count(),
            'department' => $department->count(),
            'cmf' => $cmf->count()
        ]);
    }
}
