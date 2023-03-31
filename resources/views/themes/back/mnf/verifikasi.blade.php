@extends('layouts.back')
@section('title','Review CMF - CMF Online')

@section('content')
    <h4 class="fw-bold"><span class="text-muted fw-light">CMF / </span> Review</h4>
    @if (session()->has('message'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
    @elseif(session()->has('message-error'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-danger">{{ session()->get('message-error') }}</div>
            </div>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-8">
            <form class="needs-validation">
                @csrf
                <div class="row mb-4">
                    <div class="col-lg-12">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row mb-4">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="department" class="form-label">Department</label>
                                            <input type="text" id="department" class="form-control" value="{{$cmf->department->txtNamaDept}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="tanggal" class="form-label">Tanggal</label>
                                            <input type="date" id="tanggal" class="form-control" value="{{$cmf->tanggal}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label for="no_cmf" class="form-label">No CMF</label>
                                            <input type="text" id="no_cmf" class="form-control" value="{{$cmf->no_cmf}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="judul_perubahan" class="form-label">Judul Perubahan</label>
                                            <input type="text" id="judul_perubahan" class="form-control" value="{{$cmf->judul_perubahan}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="perubahan" class="form-label">Perubahan</label>
                                            <input type="text" id="perubahan" class="form-control" value="{{$cmf->perubahan}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="jenis_perubahan" class="form-label">Jenis Perubahan</label>
                                            <input type="text" id="jenis_perubahan" class="form-control" value="{{$cmf->jenis_perubahan}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="targer_implementasi" class="form-label">Target Implementasi</label>
                                            <input type="date" id="target_implementasi" class="form-control" value="{{$cmf->target_implementasi}}" disabled>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="tipe_perubahan" class="form-label">Tipe Perubahan</label>
                                            <input type="text" id="tipe_perubahan" class="form-control" value="{{$cmf->tipe_perubahan}}" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <label for="alasan_perubahan" class="form-label">Alasan Perubahan</label>
                                        <textarea id="alasan_perubahan" cols="30" rows="10" class="form-control" readonly>{{$cmf->alasan_perubahan}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <label for="dampak_terhadap_perubahan" class="form-label">Dampak Terhadap Perubahan</label>
                                        <textarea id="dampak_terhadap_perubahan" cols="30" rows="10" class="form-control" readonly>{{$cmf->dampak_terhadap_perubahan}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <label for="deskripsi_perubahan" class="form-label">Deskripsi Perubahan</label>
                                        <textarea id="deskripsi_perubahan" cols="30" rows="10" class="form-control" readonly>{{$cmf->deskripsi_perubahan}}</textarea>
                                    </div>
                                </div>
                                <div class="row mb-4">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label for="area_terkait" class="form-label">Area Terkait</label>
                                            @foreach($cmf->subdepartments as $subdepartment)
                                                <input type="text" id="area_terkait" class="form-control my-2" value="{{$subdepartment->txtNamaSubDept}}" readonly>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-12">
                        <div class="card mb-5 card-parent" >
                            @foreach($cmf->risks as $risk)
                                <h5 class="card-header">Risk Assessment : {{$loop->iteration}}</h5>
                                <hr class="my-0" />
                                <div class="card-body">
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="qcdsme" class="form-label">QCDSME</label>
                                                <input type="text" id="qcdsme" class="form-control" value="{{$risk->qcdsme}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="resiko" class="form-label">Resiko</label>
                                                <input type="text" id="resiko" class="form-control" value="{{$risk->resiko}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <label for="rencana_mitigasi" class="form-label">Rencana Mitigasi</label>
                                            <textarea id="rencana_mitigasi" cols="30" rows="10" class="form-control" readonly>{{$risk->rencana_mitigasi}}</textarea>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="rica" class="form-label">Rica</label>
                                                <input type="text" id="rica" class="form-control" value="{{$risk->rica}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="pic" class="form-label">PIC</label>
                                                <input type="text" id="pic" class="form-control" value="{{$risk->pic}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label for="deadline" class="form-label">Deadline</label>
                                                <input type="text" id="deadline" class="form-control" value="{{$risk->deadline}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-4">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="level_risk" class="form-label">Level Risk</label>
                                                <input type="text" id="level_risk" class="form-control" value="{{$risk->level_risk}}" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="status" class="form-label">Status</label>
                                                <input type="text" id="status" class="form-control" value="{{$risk->status}}" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-lg-4">
            @if($cmf->step == 4)
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        Review
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <h6 class="card-title">MNF</h6>
                        <form action="{{route('cmf.mnf.store',['slug' => $cmf->slug])}}" method="post">
                            @csrf
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="verifikasi" id="setuju" value="setuju">
                                <label class="form-check-label" for="setuju">
                                    Setuju
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="verifikasi" id="tidak_setuju" value="tidak setuju">
                                <label class="form-check-label" for="tidak setuju">
                                    Tidak Setuju
                                </label>
                            </div>
                            <button type="submit" class="btn btn-primary my-4">Review</button>
                        </form>
                    </div>
                </div>
            @endif
            @foreach($steps as $step)
                @if($step->step == 5)
                    <div class="card mb-4">
                        <div class="card-header">
                            <h6 class="card-title">MNF</h6>
                            <form action="#">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="verifikasi" id="setuju" value="setuju" {{$step->step == 5 && $step->is_signature == 1 ? 'checked' : ''}} @if($step->step == 5) disabled @endif>
                                    <label class="form-check-label" for="setuju">
                                        Setuju
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="verifikasi" id="tidak_setuju" value="tidak setuju" {{$step->step == 5 && $step->is_signature == 0 ? 'checked' : ''}} @if($step->step == 5) disabled @endif>
                                    <label class="form-check-label" for="tidak setuju">
                                        Tidak Setuju
                                    </label>
                                </div>
                                <button type="submit" class="btn btn-primary my-4" @if($step->step == 5) disabled @endif>
                                    {{$step->step == 4 ? 'Sudah Diverifikasi' : 'Review'}}</button>
                            </form>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>
    </div>
@endsection
