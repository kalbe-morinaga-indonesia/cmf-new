@extends('layouts.back')
@section('title','Subdepartment - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Subdepartment</h6>
                    <p>Tambahkan subdepartment dengan mengisi form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('subdepartments.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtIdSubDept') is-invalid @enderror" name="txtIdSubDept" id="txtIdSubDept" placeholder="Id Subepartment" value="{{old('txtIdSubDept')}}">
                            <label for="floatingInput">Id Subdepartment</label>
                            @error('txtIdSubDept')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtNamaSubDept') is-invalid @enderror" name="txtNamaSubDept" id="txtNamaSubDept" placeholder="Nama Subdepartment" value="{{old('txtNamaSubDept')}}">
                            <label for="floatingInput">Nama Subdepartment</label>
                            @error('txtNamaSubDept')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="department_id" id="department_id" aria-label="Department">
                                @forelse ($departments as $department)
                                    <option value="{{ $department->id }}" {{ old('department_id') == $department->id ? 'selected' : '' }}>{{ $department->txtNamaDept }}</option>
                                @empty
                                    <option>Tidak ada department</option>
                                @endforelse
                            </select>
                            <label for="department_id">Department</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Tambah SubDepartment</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
