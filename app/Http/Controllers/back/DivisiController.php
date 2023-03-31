<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Http\Requests\DivisiRequest;
use App\Models\Divisi;

class DivisiController extends Controller
{
    public function index()
    {
        $divisis = Divisi::with('departments')->get();
        return view('themes.back.Master.Divisi.index',compact(
            'divisis'
        ));
    }

    public function create()
    {
        return view('themes.back.Master.Divisi.create');
    }

    public function store(DivisiRequest $request)
    {
        Divisi::create([
            'txtIdDivisi' => $request['txtIdDivisi'],
            'txtNamaDivisi' => $request['txtNamaDivisi']
        ]);
        return redirect()->route('divisis.index')
            ->with('messages','Divisi baru berhasil ditambahkan');
    }

    public function edit(Divisi $divisi)
    {
        return view('themes.back.Master.Divisi.edit',compact(
            'divisi'
        ));
    }

    public function update(Divisi $divisi, DivisiRequest $request)
    {
        $divisi->update([
            'txtIdDivisi' => $request['txtIdDivisi'],
            'txtNamaDivisi' => $request['txtNamaDivisi']
        ]);
        return redirect()->route('divisis.index')
            ->with('messages','Divisi berhasil diperbaharui');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();
        return redirect()->route('divisis.index')
            ->with('messages','Divisi berhasil dihapus');
    }
}
