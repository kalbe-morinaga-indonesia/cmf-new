<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
</head>
<body>
<div class="container my-5">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-4 shadow border-0">
                <div class="card-body">
                    <h4>Lacak Change Management Form</h4>
                    <p>Silahkan masukkan nomor cmf pada form berikut</p>
                    <form action="#" method="get">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" name="no_cmf" id="cmf" placeholder="Masukkan Nomor CMF">
                            <label for="floatingInput">Nomor CMF</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Lacak</button>
                    </form>

                    @if($cmf)
                        <ul class="nav nav-pills mt-5 mb-5" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-one" type="button" role="tab" aria-controls="pills-one" aria-selected="true">Step 1</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-two" type="button" role="tab" aria-controls="pills-two" aria-selected="false">Step 2</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-three" type="button" role="tab" aria-controls="pills-three" aria-selected="false">Step 3</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-four" type="button" role="tab" aria-controls="pills-four" aria-selected="false">Step 4</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-five" type="button" role="tab" aria-controls="pills-five" aria-selected="false">Step 5</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-six" type="button" role="tab" aria-controls="pills-six" aria-selected="false">Step 6</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-seven" type="button" role="tab" aria-controls="pills-seven" aria-selected="false">Step 7</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-eight" type="button" role="tab" aria-controls="pills-eight" aria-selected="false">Step 8</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-nine" type="button" role="tab" aria-controls="pills-nine" aria-selected="false">Step 9</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-ten" type="button" role="tab" aria-controls="pills-ten" aria-selected="false">Step 10</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-eleven" type="button" role="tab" aria-controls="pills-eleven" aria-selected="false">Step 11</button>
                            </li>
                        </ul>
                        <div class="tab-content" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="pills-one" role="tabpanel" aria-labelledby="pills-one-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 1)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui
                                                        @else
                                                            Disetujui
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-two" role="tabpanel" aria-labelledby="pills-two-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 2)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui Depthead PIC
                                                        @else
                                                            Tidak Disetujui Depthead PIC
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-three" role="tabpanel" aria-labelledby="pills-three-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 3)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui Depthead
                                                        @else
                                                            Tidak Disetujui Depthead
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-four" role="tabpanel" aria-labelledby="pills-four-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 4)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui SVP
                                                        @else
                                                            Tidak Disetujui SVP
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-five" role="tabpanel" aria-labelledby="pills-five-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 5)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui MNF
                                                        @else
                                                            Tidak Disetujui MNF
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-six" role="tabpanel" aria-labelledby="pills-six-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 6)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui MR
                                                        @else
                                                            Tidak Disetujui MR
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-seven" role="tabpanel" aria-labelledby="pills-seven-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 7)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui
                                                        @else
                                                            Disetujui
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-eight" role="tabpanel" aria-labelledby="pills-eight-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 8)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui Depthead PIC
                                                        @else
                                                            Tidak Disetujui Depthead PIC
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-nine" role="tabpanel" aria-labelledby="pills-nine-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 9)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui Depthead
                                                        @else
                                                            Tidak Disetujui Depthead
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-ten" role="tabpanel" aria-labelledby="pills-ten-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 10)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui MR
                                                        @else
                                                            Tidak Disetujui MR
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="pills-eleven" role="tabpanel" aria-labelledby="pills-eleven-tab" tabindex="0">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>No CMF</th>
                                            <th>Pemilik Proses</th>
                                            <th>Department</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Status</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($cmf->steps as $step)
                                            @if($step->step == 11)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>{{$cmf->no_cmf}}</td>
                                                    <td>{{$cmf->user->name}}</td>
                                                    <td>{{$cmf->user->department->txtNamaDept}}</td>
                                                    <td>{{$cmf->created_at->format('d M Y, H:i:s')}}</td>
                                                    <td>
                                                        @if($step->is_signature == 1)
                                                            Disetujui Document Control
                                                        @else
                                                            Tidak Disetujui Document Control
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
</body>
</html>
