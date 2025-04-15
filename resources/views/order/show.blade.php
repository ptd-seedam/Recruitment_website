@extends('layout')

@section('title')
    <title>{{ isset($order) ? 'Cập nhật Đơn hàng' : 'Thêm mới Đơn hàng' }}</title>
@endsection

@section('layout')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Thông tin đơn hàng</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Thông tin đơn hàng</li>
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
                    <form class="form-horizontal" method="POST" action="{{ isset($order) ? route('order.update', $order->id) : route('order.store') }}">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">{{ isset($order) ? 'Cập nhật' : 'Thêm mới' }}</h4>
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <!-- Chọn khách hàng -->
                            <div class="form-group row">
                                <label for="khach_hang_id" class="col-sm-3 text-end control-label col-form-label">Khách hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control gia" readonly value="{{ $order->khachHang->ten }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="khach_hang_id" class="col-sm-3 text-end control-label col-form-label">Trạng thái đơn hàng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control gia" readonly value="{{ $order->trang_thai }}">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="khach_hang_id" class="col-sm-3 text-end control-label col-form-label">Trạng thái thanh toán</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control gia" readonly value="{{ $order->trang_thai_thanh_toan }}">
                                </div>
                            </div>

                            <!-- Danh sách sản phẩm -->
                            <div id="product-list">
                                @if(isset($order) && $order->chiTietDonHangs)

                                    @foreach($order->chiTietDonHangs as $key => $chiTiet)
                                        <div class="product-item" data-index="{{ $key }}">
                                            <div class="form-group row">
                                                <label for="san_pham_id_{{ $key }}" class="col-sm-3 text-end control-label col-form-label">Sản phẩm</label>
                                                <div class="col-sm-6">
                                                   <input type="text" class="form-control gia" readonly value="{{ $chiTiet->sanPham->ten }}">
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control so-luong" name="so_luong[]" readonly id="so_luong_{{ $key }}" value="{{ $chiTiet->so_luong }}" oninput="updateTotal()" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="gia_{{ $key }}" class="col-sm-3 text-end control-label col-form-label">Giá sản phẩm</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control gia" id="gia_{{ $key }}" value="{{ number_format($chiTiet->sanPham->gia) }} VND" readonly />
                                                </div>
                                            </div>

                                            <hr />
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                            <!-- Tổng tiền -->
                            <div class="form-group row">
                                <label for="tong_tien" class="col-sm-3 text-end control-label col-form-label">Tổng tiền</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" value="{{ number_format($order->tong_tien) }} VNĐ" id="tong_tien" name="tong_tien" readonly />
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection
