@extends('layouts.back')
@section('title','Settings - CMF Online')

@section('content')
    <h4 class="fw-bold"><span class="text-muted fw-light">Setting /</span> Change Password</h4>

    @if (session()->has('message'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-success">{{ session()->get('message') }}</div>
            </div>
        </div>
    @elseif(session()->has('error'))
        <div class="card mb-4">
            <div class="card-body">
                <div class="alert alert-danger">{{ session()->get('error') }}</div>
            </div>
        </div>
    @endif


    <form method="POST" action="{{route('settings.change-password')}}" >
        @method('PUT')
        @csrf
        <div class="row">
            <div class="col-lg-8">
                <div class="card mb-4">
                    <h5 class="card-header">Profile Details</h5>
                    <hr class="my-0" />
                    <div class="card-body">
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="password_old" class="form-label">Password Lama <span class="text-danger">*</span></label>
                                <input class="form-control @error('password_old') is-invalid @enderror" name="password_old" type="password" id="password_old"/>
                                @error('password_old')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="password_new" class="form-label">Password Baru <span class="text-danger">*</span></label>
                                <input class="form-control @error('password_new') is-invalid @enderror" name="password_new" type="password" id="password_new"/>
                                @error('password_new')
                                <div class="invalid-feedback">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3 col-lg-12">
                                <label for="password_confirm" class="form-label">Konfirmasi Password <span class="text-danger">*</span></label>
                                <input class="form-control" type="password" name="password_new_confirmation" id="password_confirm" autocomplete="new-password"/>
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

