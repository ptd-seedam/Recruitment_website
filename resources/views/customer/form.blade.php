@extends('layout')

@section('title')
<title>{{ isset($khachHang) ? 'Cập nhật Khách hàng' : 'Thêm mới Khách hàng' }}</title>
@endsection
@section('layout')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">{{ isset($khachHang) ? 'Cập nhật Khách hàng' : 'Thêm Khách hàng' }}</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ isset($khachHang) ? 'Cập nhật Khách hàng' : 'Thêm Khách hàng' }}</li>
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
                            <h4 class="card-title">{{ isset($khachHang) ? 'Chỉnh sửa khách hàng' : 'Thêm khách hàng mới' }}
                            </h4>
                            <hr>

                            <form
                                action="{{ isset($khachHang) ? route('customer.update', $khachHang->id) : route('customer.store') }}"
                                method="POST" class="form-horizontal">
                                @csrf
                                @if (isset($khachHang))
                                    @method('POST')
                                @endif

                                <div class="form-group row">
                                    <label for="ten" class="col-sm-3 text-end control-label col-form-label">Tên khách
                                        hàng</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="ten" name="ten"
                                            placeholder="Nhập tên khách hàng"
                                            value="{{ isset($khachHang) ? $khachHang->ten : old('ten') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email"
                                        class="col-sm-3 text-end control-label col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Nhập email"
                                            value="{{ isset($khachHang) ? $khachHang->email : old('email') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="sdt" class="col-sm-3 text-end control-label col-form-label">Số điện
                                        thoại</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="sdt" name="sdt"
                                            placeholder="Nhập số điện thoại"
                                            value="{{ isset($khachHang) ? $khachHang->sdt : old('sdt') }}" required>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="dia_chi" class="col-sm-3 text-end control-label col-form-label">Địa
                                        chỉ</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="dia_chi" name="dia_chi"
                                            placeholder="Nhập địa chỉ"
                                            value="{{ isset($khachHang) ? $khachHang->dia_chi : old('dia_chi') }}" required>
                                    </div>
                                </div>

                                <div class="border-top">
                                    <div class="card-body">
                                        <button type="submit"
                                            class="btn btn-primary">{{ isset($khachHang) ? 'Cập nhật' : 'Thêm mới' }}</button>
                                        <a href="{{ route('customer.list') }}" class="btn btn-secondary">Quay lại</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 @endsection
