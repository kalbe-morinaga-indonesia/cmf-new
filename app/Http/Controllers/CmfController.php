<?php

namespace App\Http\Controllers;

use App\Http\Requests\CmfRequest;
use App\Models\Cmf;
use App\Models\Department;
use App\Models\Risk;
use App\Models\Signature;
use App\Models\Step;
use App\Models\Subdepartment;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CmfController extends Controller
{
    public function index()
    {
        $cmfs = Cmf::where('user_id', auth()->user()->id)->get();
        return view('themes.back.cmf.index',compact(
            'cmfs'
        ));
    }

    public function create()
    {
        $departments = Department::get();
        $department = auth()->user()->department->txtNamaDept;
        $subdepartments = Subdepartment::get();

        // No CMF
        $today = Carbon::now();
        $jumlah = Cmf::whereYear('created_at', $today)->count('id');
        $no_cmf = sprintf("%04s", abs( $jumlah+1))."/CMF/"
            . $this->numberToRomanRepresentation($today->month) . "/" . $today->year;
        return view('themes.back.cmf.create',compact(
            'department',
            'departments',
            'subdepartments',
            'no_cmf'
        ));
    }

    public function store(CmfRequest $request)
    {
        if($request['perubahan'] == "Lainnya"){
            $perubahan = $request['perubahan_other'];
        }else{
            $perubahan = $request['perubahan'];
        }

        if($request['jenis_perubahan'] == "Lainnya"){
            $jenis_perubahan = $request['jenis_perubahan_other'];
        }else{
            $jenis_perubahan = $request['jenis_perubahan'];
        }

        $cmf = Cmf::create([
            'no_cmf' => $request['no_cmf'],
            'judul_perubahan' => $request['judul_perubahan'],
            'perubahan' => $perubahan,
            'tanggal' => $request['tanggal'],
            'jenis_perubahan' => $jenis_perubahan,
            'target_implementasi' => $request['target_implementasi'],
            'tipe_perubahan' => $request['tipe_perubahan'],
            'alasan_perubahan' => $request['alasan_perubahan'],
            'dampak_terhadap_perubahan' => $request['dampak_terhadap_perubahan'],
            'deskripsi_perubahan' => $request['deskripsi_perubahan'],
            'department_id' => auth()->user()->department_id,
            'subdepartment_id' => auth()->user()->subdepartment_id,
            'user_id' => auth()->user()->id,
            'inserted_by' => auth()->user()->name,
            'updated_by' => auth()->user()->name,
        ]);

        foreach ($request->risk as $key => $value){
            $risk = new Risk();
            $risk->qcdsme = $value['qcdsme'];
            $risk->resiko = $value['resiko'];
            $risk->rencana_mitigasi = $value['rencana_mitigasi'];
            $risk->rica = $value['rica'];
            $risk->pic = $value['pic'];
            $risk->deadline = $value['deadline'];
            $risk->level_risk = $value['level_risk'];
            $risk->status = $value['status'];

            $cmf->risks()->save($risk);
        }

        $area_terkait = Subdepartment::find($request['area_terkait']);
        $cmf->subdepartments()->attach($area_terkait);

        $department_id = [];
        foreach ($area_terkait as $item){
            $department_id [] = $item->department_id;
        }

        $konfirmasi_department_area_terkait = $department_id;
        $cmf->departments()->sync($konfirmasi_department_area_terkait);

        Step::create([
            'cmf_id' => $cmf->id,
            'user_id' => auth()->user()->id,
            'step' => 1,
        ]);

        return redirect()
            ->route('cmf.index')
            ->with('message','Request CMF Berhasil dibuat');
    }

    public function review($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
            ['step', '>=', 6]
        ])->firstOrFail();
        $steps = Step::where('cmf_id', $cmf->id)->get();
        return view('themes.back.cmf.review',compact(
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
        if($cmf->step == 6 && auth()->user()->hasRole('pic')){
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
        }
        else{
            return back()->with('message-error','Anda sudah melakukan pengajuan');
        }
    }

    public function detail($slug)
    {
        $cmf = Cmf::where([
            ['slug', $slug],
        ])->firstOrFail();
        return view('themes.back.cmf.detail',compact(
            'cmf',
        ));
    }

    public function numberToRomanRepresentation($number) {
        $map = array('M' => 1000, 'CM' => 900, 'D' => 500, 'CD' => 400, 'C' => 100, 'XC' => 90, 'L' => 50, 'XL' => 40, 'X' => 10, 'IX' => 9, 'V' => 5, 'IV' => 4, 'I' => 1);
        $returnValue = '';
        while ($number > 0) {
            foreach ($map as $roman => $int) {
                if($number >= $int) {
                    $number -= $int;
                    $returnValue .= $roman;
                    break;
                }
            }
        }
        return $returnValue;
    }
}
