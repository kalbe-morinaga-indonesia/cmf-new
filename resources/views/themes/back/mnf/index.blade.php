@extends('layouts.back')
@role('pic')
@section('title','Pengajuan CMF - CMF Online')
@endrole

@role('depthead pic')
@section('title','Request Perubahan CMF - CMF Online')
@endrole

@section('content')
    @role('pic')
    <h4 class="fw-bold"><span class="text-muted fw-light">CMF /</span> Pengajuan</h4>
    @endrole

    @role('depthead pic')
    <h4 class="fw-bold"><span class="text-muted fw-light">CMF /</span> Request Perubahan CMF</h4>
    @endrole

    @if (session()->has('message'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
    @endif

    <div class="card mb-4">
        @role('pic')
        <h5 class="card-header">Pengajuan CMF</h5>
        @endrole
        @role('depthead pic')
        <h5 class="card-header">Request Perubahan CMF</h5>
        @endrole

        <div class="card-body mb-4">
            <div class="alert alert-primary">
                <i class="bx bx-info me-2">Informasi</i>
                <div class="d-flex justify-content-between mt-2">
                    <p><span class="badge bg-white shadow">-</span> Pengajuan CMF Dalam Proses</p>
                    <p><span class="badge bg-success shadow text-success">-</span> Pengajuan CMF Disetujui</p>
                    <p><span class="badge bg-danger shadow text-danger">-</span> Pengajuan CMF Tidak Disetujui</p>
                </div>
            </div>
            @role('mnf')
            <div class="table-responsive my-2">
                <table class="table" id="data-table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>No CMF</th>
                        <th>Tanggal</th>
                        <th>Department</th>
                        <th>Judul Perubahan</th>
                        <th>Target Implementasi</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                    @role('mnf')
                    @foreach($cmfs as $cmf)
                        <tr class="
                            @if($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui Depthead PIC")
                            table-danger
                            @elseif($cmf->status_pengajuan == "Verifikasi Disetujui Document Control")
                            table-success
                            @endif
                            ">
                            <td>{{$loop->iteration}}</td>
                            <td><a href="{{route('cmf.detail',['slug' => $cmf->slug])}}">{{$cmf->no_cmf}}</a></td>
                            <td>{{date('d M Y', strtotime($cmf->tanggal))}}</td>
                            <td>{{$cmf->department->txtNamaDept}}</td>
                            <td>{{$cmf->judul_perubahan}}</td>
                            <td>{{date('d M Y', strtotime($cmf->target_implementasi))}}</td>
                            <td>
                                @if($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui Depthead PIC")
                                    Tidak Disetujui
                                @elseif($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui Depthead")
                                    Pengajuan Request Perubahan Tidak Disetujui Depthead
                                @elseif($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui SVP")
                                    Pengajuan Request Perubahan Tidak Disetujui SVP
                                @elseif($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui MNF")
                                    Pengajuan Request Perubahan Tidak Disetujui MNF
                                @elseif($cmf->status_pengajuan == "Pengajuan Request Perubahan Tidak Disetujui MR")
                                    Pengajuan Request Perubahan Tidak Disetujui MR
                                @else
                                    <a href="{{route('cmf.mnf.verifikasi',['slug' => $cmf->slug])}}" class="btn btn-dark mb-2">Review</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                    @endrole
                    </tbody>
                </table>
            </div>
            @endrole
        </div>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function () {
            $('#data-table').DataTable();
        });
    </script>
@endpush
