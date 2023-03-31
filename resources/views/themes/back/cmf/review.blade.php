@extends('layouts.back')
@section('title','Review Perubahan CMF - CMF Online')

@section('content')
    <h4 class="fw-bold"><span class="text-muted fw-light">CMF / </span> Review Perubahan</h4>
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
            <div class="row mb-4">
                @foreach($steps as $step)
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-header">
                                <h6 class="card-title">
                                    @switch($step->step)
                                        @case(1)
                                            PIC
                                            @break
                                        @case(2)
                                            Depthead PIC
                                            @break
                                        @case(3)
                                            Depthead {{$step->user->department->txtNamaDept}}
                                            @break
                                        @case(4)
                                            SVP System
                                            @break
                                        @case(5)
                                            MNF
                                            @break
                                        @case(6)
                                            MR & Food Safety Team
                                            @break
                                        @case(7)
                                            PIC
                                            @break
                                    @endswitch
                                </h6>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto">
                                    <img src="{{asset('storage/uploads/signature/'.$step->user->signature)}}" alt="" width="100px" height="100px">
                                </div>
                                <p>
                                    @switch($step->step)
                                        @case(1)
                                            <span class="fw-bold">Catatan:</span> -
                                            @break
                                        @case(2)
                                            <span class="fw-bold">Review:</span> {{$step->catatan}}
                                            @break
                                        @case(3)
                                            <span class="fw-bold">Review:</span> {{$step->catatan}}
                                            @break
                                        @case(7)
                                            <span class="fw-bold">Review:</span> {{$step->catatan}}
                                            @break
                                    @endswitch
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="card mb-4">
                <div class="card-header bg-dark text-white">
                    Detail CMF
                </div>
            </div>
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
                                            <input type="date" id="target_implementasi" class="form-control" value="{{$cmf->target_implementasi}}">
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
        <div class="col-lg-4 sticky-top">
            @if($cmf->step == 6)
                <div class="card mb-4">
                    <div class="card-header bg-dark text-white">
                        Review
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-header">
                        <form action="{{route('cmf.update',['slug' => $cmf->slug])}}" method="post">
                            @csrf
                            <div class="form-floating mb-4">
                                <textarea class="form-control" name="catatan" placeholder="Leave a note here" id="catatan"></textarea>
                                <label for="catatan">Review</label>
                            </div>
                            <button type="submit" class="btn btn-primary">Review</button>
                        </form>
                    </div>
                </div>
            @else
                <div class="card mb-4">
                    <div class="card-body">
                        <p>Anda sudah melakukan review perubahan</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
@push('style')
    <style>
        .col-lg-4.sticky-top {
            align-self: flex-start;
        }
    </style>
@endpush
