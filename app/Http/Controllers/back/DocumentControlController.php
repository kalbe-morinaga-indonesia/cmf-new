<?php

namespace App\Http\Controllers\back;

use App\Http\Controllers\Controller;
use App\Models\Cmf;
use App\Models\Step;
use App\Models\Subdepartment;
use App\Models\User;
use Illuminate\Http\Request;

class DocumentControlController extends Controller
{
    public function index()
    {
        $cmfs = Cmf::get();
        return view('themes.back.dc.index',compact(
            'cmfs',
        ));
    }

    public function verifikasi($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.dc.verifikasi',compact(
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
        if($cmf->step == 1 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 2 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 3 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 4 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 5 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 6 && auth()->user()->hasRole('document control')){
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 7,
                'is_signature' => true,
                'catatan' => $request['catatan']
            ]);

            $cmf->update([
                'status_pengajuan' => 'Pengajuan Review Setelah Dilakukan Perubahan',
                'updated_by' => $user->name,
                'step' => 7
            ]);
            return back()
                ->with('message','Pengajuan Review Setelah Dilakukan Perubahan Berhasil');
        }elseif($cmf->step == 7 && auth()->user()->hasRole('document control')){
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
        }elseif($cmf->step == 8 && auth()->user()->hasRole('document control')){
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
        }else if($cmf->step == 9 && auth()->user()->hasRole('document control')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 10,
                'is_signature' => $is_signature,
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui MR' : 'Pengajuan Request Perubahan Tidak Disetujui MR',
                'updated_by' => $user->name,
                'step' => 10
            ]);
            return back()
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }
        elseif($cmf->step == 10 && auth()->user()->hasRole('document control')){
            $is_signature = $request['verifikasi'] == "setuju";
            Step::create([
                'cmf_id' => $cmf->id,
                'user_id' => auth()->user()->id,
                'step' => 11,
                'is_signature' => $is_signature,
            ]);

            $cmf->update([
                'status_pengajuan' => $is_signature ? 'Pengajuan Request Perubahan Disetujui DC' : 'Pengajuan Request Perubahan Tidak Disetujui DC',
                'updated_by' => $user->name,
                'step' => 11
            ]);
            return redirect()->route('cmf.dc.index')
                ->with('message','Request Perubahan CMF Berhasil diverifikasi');
        }
        else{
            return back()->with('message-error','Anda sudah melakukan verifikasi');
        }
    }

    public function print($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
        ])->firstOrFail();
        $subdepartments = Subdepartment::get();

        return view('themes.back.dc.print', compact(
            'cmf',
            'subdepartments'
        ));
    }
}
