@extends('layouts.back')
@section('title','My Profile - CMF Online')

@section('content')
    <h4 class="fw-bold"><span class="text-muted fw-light">My Profile /</span> Profile</h4>

    @if (session()->has('message'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
    @endif

    <div class="row-mb-4">
        <div class="col-lg-12">
            <div class="alert alert-warning">
                <strong><i class="bx bxs-info-circle me-1"></i>Informasi</strong>
                <br>
                <ol>
                    <li><strong>Email</strong> tidak dapat diganti, silahkan untuk menghubungi admin</li>
                    <li><strong>Nik</strong> tidak dapat diganti, silahkan untuk menghubungi admin</li>
                </ol>
            </div>
        </div>
    </div>

    <form method="POST" action="{{route('profiles.update')}}" enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" value="{{auth()->user()->email}}" disabled/>
                                @error('email')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nik" class="form-label">NIK (Nomor Induk Kepegawaian) <span class="text-danger">*</span></label>
                                <input class="form-control @error('nik') is-invalid @enderror" type="text" id="nik" value="{{auth()->user()->nik}}" disabled/>
                                @error('nik')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="name" class="form-label">Nama <span class="text-danger">*</span></label>
                                <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" id="name" value="{{auth()->user()->name}}" />
                                @error('name')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="department" class="form-label">Department<span class="text-danger">*</span></label>
                                <select name="department" id="department" class="form-select @error('department') is-invalid @enderror">
                                    @foreach($departments as $department)
                                        <option value="{{$department->id}}" {{auth()->user()->department_id ==  $department->id ? 'selected' : ''}}>{{$department->txtNamaDept}}</option>
                                    @endforeach
                                    @error('department')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </select>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="subdepartment" class="form-label">Sub-Department</label>
                                <select name="subdepartment" id="subdepartment" class="form-select @error('subdepartment') is-invalid @enderror">
                                    @foreach($subdepartments as $subdepartment)
                                        <option value="{{$subdepartment->id}}" {{auth()->user()->subdepartment_id == $subdepartment->id ? 'selected' : ''}}>{{$subdepartment->txtNamaSubDept}}</option>
                                    @endforeach
                                    @error('subdepartment')
                                    <div class="invalid-feedback">{{$message}}</div>
                                    @enderror
                                </select>
                            </div>

                        </div>
                        <div class="row mb-4">
                            <div class="col-lg-6">
                                <label for="signature" class="form-label">Tanda Tangan<span class="text-danger">*</span></label>
                                <input type="file" name="signature" id="signature" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size-preview="3M" data-default-file="{{asset('storage/uploads/signature/'.auth()->user()->signature)}}">
                            </div>
                            <div class="col-lg-6">
                                <label for="avatar" class="form-label">Photo Profile<span class="text-danger">*</span></label>
                                <input type="file" name="avatar" id="avatar" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size-preview="3M" data-default-file="{{asset('storage/uploads/users/'.auth()->user()->avatar)}}">
                            </div>
                        </div>
                    </div>
                    <!-- /Account -->
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Save Changes</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection

@push('style')
    <link rel="stylesheet" href="{{asset('themes/dropify/dropify.css')}}">
@endpush

@push('script')
    <script src="{{asset('themes/dropify/dropify.js')}}"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endpush
