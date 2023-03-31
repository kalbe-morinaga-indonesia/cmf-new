@extends('layouts.back')
@section('title','User - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar User</h5>
                        <a href="{{route('users.create')}}" class="btn btn-dark">Tambah User</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel user</p>
                </div>
                <div class="card-body">
                    @if (session()->has('messages'))
                        <div class="alert alert-success mb-4">{{ session()->get('messages') }}</div>
                    @endif
                        <div class="table-responsive">
                            <table class="table table-striped" id="data-table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nik</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Tanda Tangan</th>
                                    <th>Avatar</th>
                                    <th>Departemen</th>
                                    <th>Sub Departemen</th>
                                    <th>Created at</th>
                                    <th>Aksi</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$user->nik}}</td>
                                        <td>{{$user->name}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            <img src="{{asset('storage/uploads/signature/'.$user->signature)}}" class="img-fluid img-thumbnail" alt="{{$user->name}}">
                                        </td>
                                        <td>
                                            <img src="{{asset('storage/uploads/users/'.$user->avatar)}}" class="img-fluid img-thumbnail" alt="{{$user->name}}">
                                        </td>
                                        <td>{{$user->department->txtNamaDept ?? 'n/a'}}</td>
                                        <td>{{$user->subdepartment->txtNamaSubDept ?? 'n/a'}}</td>
                                        <td>{{$user->created_at->format('d M Y')}}</td>
                                        <td>

                                                <a href="{{route('users.edit',['user' => $user->id])}}" class="btn btn-dark mb-3">Edit</a>
                                                <form action="{{route('users.destroy',['user' => $user->id])}}" method="post">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
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
