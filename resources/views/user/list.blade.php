@extends('layout')
@section('title')
    <title>Danh sách user</title>
@endsection
@section('layout')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Danh sách User</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Danh sách User</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách User</h5>
                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <div class="table-responsive">
                                <table id="zero_config" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Tên user</th>
                                            <th>Email</th>
                                            <th>Vai Trò</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->ten }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->vai_tro }}</td>
                                                <td class="action-buttons">
                                                    <a class="edit-button"
                                                        href="{{ route('user.edit', ['id' => $user->id]) }}">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a type="submit" href="{{ route('user.delete', ['id' => $user->id]) }}"
                                                        class="btn btn-danger">
                                                        <i class="fa fa-times" aria-hidden="true"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Tên user</th>
                                            <th>Email</th>
                                            <th>Vai Trò</th>
                                            <th>Hành động</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
