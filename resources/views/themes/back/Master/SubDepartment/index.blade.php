@extends('layouts.back')
@section('title','Subdepartment - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Subdepartment</h5>
                        <a href="{{route('subdepartments.create')}}" class="btn btn-dark">Tambah Subdepartment</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel subdepartment</p>
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
                                    <td>Id Subdepartment</td>
                                    <td>Nama Subdepartment</td>
                                    <td>Department</td>
                                    <td>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($subdepartments as $subdepartment)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $subdepartment->txtIdSubDept }}</td>
                                        <td>{{ $subdepartment->txtNamaSubDept }}</td>
                                        <td>{{ $subdepartment->department->txtNamaDept }}</td>
                                        <td>
                                            <a href="{{ route('subdepartments.edit',['subdepartment' => $subdepartment->id]) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('subdepartments.destroy',['subdepartment' => $subdepartment->id]) }}" method="post">
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
