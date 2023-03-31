@extends('layouts.back')
@section('title','Assign Users - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Assign Users</h6>
                    <p>Assign users dengan mengisi form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('assign-users.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" name="email" id="email" aria-label="email">
                                @foreach($users as $user)
                                    <option value="{{$user->email}}" {{old('email') == $user->email ? 'selected' : ''}}>{{$user->email}}</option>
                                @endforeach
                            </select>
                            <label for="email">Email</label>
                            @error('email')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="roles" class="form-label">Roles</label>
                            <div class="form-group">
                                @foreach($roles as $role)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="roles[]" id="role" value="{{$role->id}}">
                                        <label class="form-check-label" for="role">{{$role->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('roles')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Assign User</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
