@extends('layouts.back')
@section('title','Assign Users - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Assign Users</h5>
                        <a href="{{route('assign-users.create')}}" class="btn btn-dark">Assign User</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel assign user</p>
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
                                    <td>Roles</td>
                                    <td>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            @foreach($user->getRoleNames() as $item)
                                                <button class="btn btn-primary btn-sm">{{$item}}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('assign-users.edit',['assign_user' => $user->id]) }}" class="btn btn-warning">Sync</a>
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
