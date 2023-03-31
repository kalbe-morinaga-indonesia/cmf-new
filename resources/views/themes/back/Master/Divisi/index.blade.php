@extends('layouts.back')
@section('title','Divisi - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            @if (session()->has('messages'))
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="alert alert-success">{{ session()->get('messages') }}</div>
                    </div>
                </div>
            @endif
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Divisi</h5>
                        <a href="{{route('divisis.create')}}" class="btn btn-dark">Tambah Divisi</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel divisi</p>
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Id Divisi</th>
                                <th>Nama Divisi</th>
                                <th>Daftar Department</th>
                                <th>Aksi</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($divisis as $divisi)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $divisi->txtIdDivisi }}</td>
                                    <td>{{ $divisi->txtNamaDivisi }}</td>
                                    <td>
                                        <ol>
                                            @forelse ($divisi->departments as $department)
                                                <li>{{ $department->txtNamaDept }}</li>
                                            @empty
                                                <div class="alert alert-danger">Tidak ada department yang terdaftar</div>
                                            @endforelse
                                        </ol>
                                    </td>
                                    <td>
                                        <a href="{{ route('divisis.edit',['divisi' => $divisi->id]) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('divisis.destroy',['divisi' => $divisi->id]) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger my-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
