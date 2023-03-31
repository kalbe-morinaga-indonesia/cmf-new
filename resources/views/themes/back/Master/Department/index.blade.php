@extends('layouts.back')
@section('title','Department - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Department</h5>
                        <a href="{{route('departments.create')}}" class="btn btn-dark">Tambah Department</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel department</p>
                </div>
                <div class="card-body">
                    @if (session()->has('messages'))
                        <div class="alert alert-success mb-4">{{ session()->get('messages') }}</div>
                    @endif
                    <div class="table-responsive">
                        <table class="table table-striped" id="data-table">
                            <thead>
                            <tr>
                                <td>#</td>
                                <td>Id Department</td>
                                <td>Nama Department</td>
                                <td>Divisi</td>
                                <td>Aksi</td>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($departments as $department)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $department->txtIdDept }}</td>
                                    <td>{{ $department->txtNamaDept }}</td>
                                    <td>{{ $department->divisi->txtNamaDivisi }}</td>
                                    <td>
                                        <a href="{{ route('departments.edit',['department' => $department->id]) }}" class="btn btn-warning">Edit</a>
                                        <form action="{{ route('departments.destroy',['department' => $department->id]) }}" method="post">
                                            @method('delete')
                                            @csrf
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
