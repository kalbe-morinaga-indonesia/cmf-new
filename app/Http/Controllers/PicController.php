<?php

namespace App\Http\Controllers;

use App\Models\Cmf;
use App\Models\Step;
use App\Models\User;
use Illuminate\Http\Request;

class PicController extends Controller
{
    public function index()
    {
        $cmf_pic = Cmf::where([
            ['department_id', auth()->user()->department_id],
            ['step',1]
        ])->orWhere([
            ['department_id', auth()->user()->department_id],
            ['step',7]
        ])->get();
        return view('themes.back.pic.index',compact(
            'cmf_pic',
        ));
    }

    public function verifikasi($slug)
    {
        $cmf = Cmf::where('slug', $slug)->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.pic.verifikasi',compact(
            'cmf',
            'steps'
        ));
    }

    public function store($slug, Request $request)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['department_id', auth()->user()->department_id]
        ])->firstOrFail();
        $user = User::find(auth()->user()->id)->first();
        if($cmf->step == 1 && auth()->user()->hasRole('depthead pic')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 2,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui Depthead PIC' : 'Pengajuan Request Perubahan Tidak Disetujui Depthead PIC',
                'updated_by' => $user->name,
                'step' => 2
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil disetujui');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }

    public function evaluasi($slug)
    {
        $cmf = Cmf::where('slug', $slug)->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.pic.evaluasi',compact(
            'cmf',
            'steps'
        ));
    }

    public function update($slug, Request $request)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['department_id', auth()->user()->department_id]
        ])->firstOrFail();
        $user = User::find(auth()->user()->id)->first();
        if($cmf->step == 7 && auth()->user()->hasRole('depthead pic')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 8,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui Depthead PIC' : 'Pengajuan Request Perubahan Tidak Disetujui Depthead PIC',
                'updated_by' => $user->name,
                'step' => 8
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil disetujui');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan evaluasi & verifikasi');
        }
    }
}
