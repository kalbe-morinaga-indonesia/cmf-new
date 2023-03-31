@extends('layouts.back')
@section('title','Permissions - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Permissions</h5>
                        <a href="{{route('permissions.create')}}" class="btn btn-dark">Tambah Permission</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel permission</p>
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
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                        <td>
                                            <a href="{{ route('permissions.edit',['permission' => $permission->id]) }}" class="btn btn-warning">Edit</a>
                                            <form action="{{ route('permissions.destroy',['permission' => $permission->id]) }}" method="post">
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
