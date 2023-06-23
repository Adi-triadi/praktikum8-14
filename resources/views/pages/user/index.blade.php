@extends('template.master')

@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">User</h1>
        <div class="d-flex justify-content-between mb-3">
            <ol class="breadcrumb">
                <li class="breadcrumb-item active">Data User</li>
            </ol>
            <a href="/user/create" class="btn btn-primary">Tambah Data</a>
        </div>
        <div class="card shadow">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>User</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($userData as $user)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>
                                        <a href="/user/edit/{{ $user->id }}" class="btn btn-warning">Edit</a>
                                        <a href="/user/delete/{{ $user->id }}" class="btn btn-danger">delete</a>
                                    </td>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
