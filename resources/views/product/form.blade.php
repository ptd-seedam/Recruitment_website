@extends('layout')

@section('title')
<title>{{ isset($sanPham) ? 'Cập nhật Sản phẩm' : 'Thêm mới Sản phẩm' }}</title>
@endsection

@section('layout')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">{{ isset($sanPham) ? 'Cập nhật Sản phẩm' : 'Thêm Sản phẩm' }}</h4>
                <div class="ms-auto text-end">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Admin</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ isset($sanPham) ? 'Cập nhật sản phẩm' : 'Thêm sản phẩm' }}</li>
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
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="{{ isset($sanPham) ? route('product.update', $sanPham->id) : route('product.store') }}">
                        @csrf
                        <div class="card-body">
                            <h4 class="card-title">{{ isset($sanPham) ? 'Cập nhật' : 'Thêm mới' }}</h4>
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="ten" class="col-sm-3 text-end control-label col-form-label">Tên sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="ten" name="ten" value="{{ old('ten', $sanPham->ten ?? '') }}" placeholder="Nhập tên sản phẩm" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="mo_ta" class="col-sm-3 text-end control-label col-form-label">Mô tả</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control" id="mo_ta" name="mo_ta" placeholder="Nhập mô tả sản phẩm">{{ old('mo_ta', $sanPham->mo_ta ?? '') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="gia" class="col-sm-3 text-end control-label col-form-label">Giá</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="gia" name="gia" value="{{ old('gia', $sanPham->gia ?? '') }}" placeholder="Nhập giá sản phẩm" />
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="so_luong" class="col-sm-3 text-end control-label col-form-label">Số lượng</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="so_luong" name="so_luong" value="{{ old('so_luong', $sanPham->so_luong ?? '') }}" placeholder="Nhập số lượng sản phẩm" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="so_luong" class="col-sm-3 text-end control-label col-form-label">Hình ảnh sản phẩm</label>
                                <div class="col-sm-9">
                                    <input type="file" class="form-control" id="so_luong" name="hinh_sp" value="{{ old('hinh_sp', $sanPham->hinh_sp ?? '') }}" placeholder="Nhập hình" />
                                </div>
                            </div>


                        </div>

                        <div class="border-top">
                            <div class="card-body">
                                <button type="submit" class="btn btn-primary">{{ isset($sanPham) ? 'Cập nhật' : 'Thêm mới' }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        document.querySelectorAll('.remove-image').forEach(function(button) {
            button.addEventListener('click', function () {
                this.closest('.input-group').remove();
            });
        });
    });
</script>

@endsection
