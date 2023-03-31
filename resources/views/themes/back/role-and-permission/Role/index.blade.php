@extends('layouts.back')
@section('title','Roles - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Role</h5>
                        <a href="{{route('roles.create')}}" class="btn btn-dark">Tambah Role</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel role</p>
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
                                    <td>Name</td>
                                    <td>Guard Name</td>
                                    <td>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>{{ $role->guard_name }}</td>
                                        <td>
                                            <a href="{{ route('roles.edit',['role' => $role->id]) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('roles.destroy',['role' => $role->id]) }}" method="post">
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
