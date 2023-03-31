@extends('layouts.back')
@section('title','Assign Permission - Change Management Form')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header">
                    <div class="d-flex justify-content-between">
                        <h5>Daftar Assign Permission</h5>
                        <a href="{{route('assign-permissions.create')}}" class="btn btn-dark">Assign Permission</a>
                    </div>
                    <p>Berikut di bawah ini merupakan tabel assign permission</p>
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
                                    <td>Permission</td>
                                    <td>Aksi</td>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach($role->getPermissionNames() as $item)
                                                <button class="btn btn-primary btn-sm">{{$item}}</button>
                                            @endforeach
                                        </td>
                                        <td>
                                            <a href="{{ route('assign-permissions.edit',['assign_permission' => $role->id]) }}" class="btn btn-warning">Sync</a>
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
