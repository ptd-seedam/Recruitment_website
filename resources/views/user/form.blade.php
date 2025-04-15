@extends('layout')

@section('title')
    <title>{{ isset($user) ? 'Cập nhật user' : 'Thêm mới user' }}</title>
@endsection

@section('layout')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">{{ isset($user) ? 'Cập nhật user' : 'Thêm user' }}</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ isset($user) ? 'Cập nhật User' : 'Thêm User' }}</li>
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
                        <form class="form-horizontal" method="POST" enctype="multipart/form-data"
                            action="{{ isset($user) ? route('user.update', $user->id) : route('user.store') }}">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</h4>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                <div class="form-group row">
                                    <label for="ten" class="col-sm-3 text-end control-label col-form-label">Tên
                                        user</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten" name="ten"
                                            value="{{ old('ten', $user->ten ?? '') }}" placeholder="Nhập tên user" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="gia" class="col-sm-3 text-end control-label col-form-label">Mật
                                        khẩu</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="gia" name="matkhau"
                                            value="{{ old('mat_khau', $user->mat_khau ?? '') }}"
                                            placeholder="Nhập giá Mật khẩu" />
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="so_luong"
                                        class="col-sm-3 text-end control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            value="{{ old('email', $user->email ?? '') }}" placeholder="Nhập Email" />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="so_luong" class="col-sm-3 text-end control-label col-form-label">Vai
                                        trò</label>
                                    <select name="vaitro" class="col-sm-9">
                                        @php
                                            $role;
                                            if ($user->vai_tro == 2) {
                                                $role = 'Admin';
                                            } else {
                                                $role = 'Customer';
                                            }
                                        @endphp

                                        <option value="{{ $user->vai_tro }}">{{ $role }}</option>
                                        <optgroup label="Chọn quyền">
                                            <option value="2">Admin</option>
                                            <option value="1">Customer</option>
                                        </optgroup>
                                    </select>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($user) ? 'Cập nhật' : 'Thêm mới' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove-image').forEach(function(button) {
                button.addEventListener('click', function() {
                    this.closest('.input-group').remove();
                });
            });
        });
    </script>
@endsection
