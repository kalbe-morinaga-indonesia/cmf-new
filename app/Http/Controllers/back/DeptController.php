<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Cmf;
use App\Models\Step;
use App\Models\User;
use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function index()
    {
        $cmfs = Cmf::with([
            'departments' => function($query){
                $query->where('department_id', auth()->user()->department_id)->get();
            }
        ])->where('step','>=',2)->orWhere('step','>=',8)->get();
        return view('themes.back.depthead.index',compact(
            'cmfs',
        ));
    }

    public function verifikasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step', '>=', 2]
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.depthead.verifikasi',compact(
            'cmf',
            'steps'
        ));
    }

    public function store($slug, Request $request)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
        ])->firstOrFail();
        $user = User::find(auth()->user()->id)->first();
        if($cmf->step >= 2 && auth()->user()->hasRole('depthead')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::updateOrCreate([
                'user_id' => auth()->user()->id,
                'step' => 3
            ],[
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 3,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui Depthead' : 'Pengajuan Request Perubahan Tidak Disetujui Depthead',
                'updated_by' => $user->name,
                'step' => 3
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil di verifikasi');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }

    public function evaluasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step', '>=', 2]
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.depthead.evaluasi',compact(
            'cmf',
            'steps'
        ));
    }

    public function update($slug, Request $request)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
        ])->firstOrFail();
        $user = User::find(auth()->user()->id)->first();
        if($cmf->step >= 8 && auth()->user()->hasRole('depthead')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::updateOrCreate([
                'user_id' => auth()->user()->id,
                'step' => 9
            ],[
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 9,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui Depthead' : 'Pengajuan Request Perubahan Tidak Disetujui Depthead',
                'updated_by' => $user->name,
                'step' => 9
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil di verifikasi');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }
}
