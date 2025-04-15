@extends('layout')

@section('title')
    <title>Danh sách đơn nhập hàng</title>
@endsection

@section('layout')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Danh sách đơn Nhập hàng</h4>
                    <div class="ms-auto text-end">
                        <a href="{{ route('nhap.create') }}" class="btn btn-primary">Thêm Đơn Nhâp Hàng</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Danh sách đơn hàng</h5>

                            @if (session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="table-responsive">
                                <table id="zero_config" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Nhập Hàng</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Trạng Thái Thanh Toán</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($donHangs as $donHang)
                                            <tr>
                                                <td>{{ $donHang->id }}</td>
                                                <td>{{ number_format($donHang->tong_tien) }} VND</td>
                                                <td>
                                                    {{ $donHang->trang_thai }}

                                                </td>
                                                <td>
                                                    {{ $donHang->trang_thai_thanh_toan }}
                                                </td>
                                                <td>
                                                    <a href="{{ route('nhap.show', $donHang->id) }}"
                                                        class="btn btn-info btn-sm">Xem</a>
                                                    <a href="{{ route('nhap.edit', $donHang->id) }}"
                                                        class="btn btn-warning btn-sm">Sửa</a>
                                                    <a href="{{ route('nhap.delete', $donHang->id) }}"
                                                        class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Xóa</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <thead>
                                        <tr>
                                            <th>Mã Đơn Hàng</th>
                                            <th>Tổng Tiền</th>
                                            <th>Trạng Thái</th>
                                            <th>Trạng Thái Thanh Toán</th>
                                            <th>Hành Động</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
