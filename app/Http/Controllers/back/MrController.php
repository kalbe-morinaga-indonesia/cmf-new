<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Cmf;
use App\Models\Step;
use App\Models\User;
use Illuminate\Http\Request;

class MrController extends Controller
{
    public function index()
    {
        $cmfs = Cmf::where([
            ['step','>=', 1],
            ['step', '<=',5],
        ])->orWhere('step',9)->get();
        return view('themes.back.mr.index',compact(
            'cmfs',
        ));
    }

    public function verifikasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step','>=', 1],
            ['step', '<=',5],
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.mr.verifikasi',compact(
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
        if($cmf->step == 1 && auth()->user()->hasRole('mr & food safety team')){
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
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }elseif($cmf->step == 2 && auth()->user()->hasRole('mr & food safety team')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
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
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }elseif($cmf->step == 3 && auth()->user()->hasRole('mr & food safety team')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 4,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui SVP' : 'Pengajuan Request Perubahan Tidak Disetujui SVP',
                'updated_by' => $user->name,
                'step' => 4
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }elseif($cmf->step == 4 && auth()->user()->hasRole('mr & food safety team')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 5,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui MNF' : 'Pengajuan Request Perubahan Tidak Disetujui MNF',
                'updated_by' => $user->name,
                'step' => 5
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }elseif($cmf->step == 5 && auth()->user()->hasRole('mr & food safety team')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 6,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui MR' : 'Pengajuan Request Perubahan Tidak Disetujui MR',
                'updated_by' => $user->name,
                'step' => 6
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }

    public function evaluasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step', '>=', 9]
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.mr.evaluasi',compact(
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
        if($cmf->step == 9 && auth()->user()->hasRole('mr & food safety team')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 10,
                'is_signature' => $is_signature,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui MR' : 'Pengajuan Request Perubahan Tidak Disetujui MR',
                'updated_by' => $user->name,
                'step' => 10
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }
}
