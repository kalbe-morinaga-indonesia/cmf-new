@extends('layouts.back')
@section('title','Department - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Department</h6>
                    <p>Tambahkan department dengan mengisi form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('departments.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtIdDept') is-invalid @enderror" name="txtIdDept" id="txtIdDept" placeholder="Id Department" value="{{old('txtIdDept')}}">
                            <label for="floatingInput">Id Department</label>
                            @error('txtIdDept')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtNamaDept') is-invalid @enderror" name="txtNamaDept" id="txtNamaDept" placeholder="Nama Department" value="{{old('txtNamaDept')}}">
                            <label for="floatingInput">Nama Department</label>
                            @error('txtNamaDept')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <select class="form-select" name="divisi_id" id="divisi_id" aria-label="Divisi">
                                @forelse ($divisis as $divisi)
                                    <option value="{{ $divisi->id }}" {{ old('divisi_id') == $divisi->id ? 'selected' : '' }}>{{ $divisi->txtNamaDivisi }}</option>
                                @empty
                                    <option>Tidak ada divisi</option>
                                @endforelse
                            </select>
                            <label for="divisi_id">Divisi</label>
                        </div>
                        <button type="submit" class="btn btn-dark">Tambah Department</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
