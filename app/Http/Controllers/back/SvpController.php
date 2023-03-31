<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Cmf;
use App\Models\Step;
use App\Models\User;
use Illuminate\Http\Request;

class SvpController extends Controller
{
    public function index()
    {
        $cmfs = Cmf::where('step', 3)->get();
        return view('themes.back.svp.index',compact(
            'cmfs',
        ));
    }

    public function verifikasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step', '>=', 3]
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.svp.verifikasi',compact(
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
        if($cmf->step == 3 && auth()->user()->hasRole('svp system')){
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
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }
}
