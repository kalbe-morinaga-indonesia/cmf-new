@extends('layouts.back')
@section('title','User - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit User</h6>
                    <p>Edit user dengan memperbaharui form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('users.update',['user' => $user->id])}}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nik') is-invalid @enderror" name="nik" id="nik" placeholder="NIK (Nomor Induk Karyawan)" value="{{old('nik') ?? $user->nik}}">
                            <label for="floatingInput">NIK (Nomor Induk Karyawan)</label>
                            @error('nik')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Nama" value="{{old('name') ?? $user->name}}">
                            <label for="floatingInput">Nama</label>
                            @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email" value="{{old('email') ?? $user->email}}">
                            <label for="floatingInput">Email</label>
                            @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Password">
                            <label for="floatingInput">Password</label>
                            @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password">
                            <label for="password_confirmation">Konfirmasi Password</label>
                            @error('password_confirmation')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="department" id="department" aria-label="Department">
                                @foreach($departments as $department)
                                    <option value="{{$department->id}}" {{$user->department_id ==  $department->id ? 'selected' : ''}}>{{$department->txtNamaDept}}</option>
                                @endforeach
                                @error('department')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </select>
                            <label for="department_id">Department</label>
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="subdepartment" id="subdepartment" aria-label="subdepartment">
                                @foreach($subdepartments as $subdepartment)
                                    <option value="{{$subdepartment->id}}" {{$user->subdepartment_id == $subdepartment->id ? 'selected' : ''}}>{{$subdepartment->txtNamaSubDept}}</option>
                                @endforeach
                                @error('subdepartment')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </select>
                            <label for="subdepartment">Sub-Department</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="dropify" name="signature" id="signature" placeholder="Tanda Tangan" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size-preview="3M" data-default-file="{{asset('storage/uploads/signature/'.$user->signature)}}">
                            <label for="signature">Tanda Tangan</label>
                            @error('signature')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="file" class="dropify" name="avatar" id="avatar" placeholder="Photo Profile" data-allowed-file-extensions="jpg jpeg png webp" data-max-file-size-preview="3M" data-default-file="{{asset('storage/uploads/users/'.$user->avatar)}}">
                            <label for="avatar">Photo Profile</label>
                            @error('avatar')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Edit User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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
