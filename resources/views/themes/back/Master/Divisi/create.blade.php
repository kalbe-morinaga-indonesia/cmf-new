@extends('layouts.back')
@section('title','Divisi - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Tambah Divisi</h6>
                    <p>Tambahkan divisi baru dengan mengisi form di bawah ini.</p>
                </div>
                <div class="card-body">
                    <form action="{{route('divisis.store')}}" method="post">
                        @csrf
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtIdDivisi') is-invalid @enderror" name="txtIdDivisi" id="txtIdDivisi" placeholder="Id Divisi" value="{{old('txtIdDivisi')}}">
                            <label for="floatingInput">Id Divisi</label>
                            @error('txtIdDivisi')
                                <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('txtNamaDivisi') is-invalid @enderror" name="txtNamaDivisi" id="txtNamaDivisi" placeholder="Nama Divisi" value="{{old('txtNamaDivisi')}}">
                            <label for="floatingInput">Nama Divisi</label>
                            @error('txtNamaDivisi')
                            <div class="invalid-feedback">{{$message}}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-dark">Tambah Divisi</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
