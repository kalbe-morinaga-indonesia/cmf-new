@extends('layouts.back')
@section('title','Assign Permission - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Sync Permission</h6>
                    <p>Sync permission dengan memperbaharui form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('assign-permissions.update',['assign_permission' => $role->id])}}" method="post">
                        @method('PUT')
                        @csrf
                        <div class="form-floating mb-3">
                            <select class="form-select" name="role" id="role" aria-label="Role">
                                @foreach($roles as $item)
                                    <option value="{{$item->id}}" {{$item->id == $role->id ? 'selected' : ''}}>{{$item->name}}</option>
                                @endforeach
                            </select>
                            <label for="role">Role</label>
                        </div>
                        <div class="mb-3">
                            <label for="permission" class="form-label">Permission</label>
                            <div class="form-group">
                                @foreach($permissions as $permission)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" name="permission[]" id="{{$permission->id}}" value="{{$permission->id}}" {{$role->permissions()->find($permission->id) ? 'checked' : ''}}>
                                        <label class="form-check-label" for="{{$permission->id}}">{{$permission->name}}</label>
                                    </div>
                                @endforeach
                            </div>
                            @error('permission')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Sync Permission</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
