@extends('layout')

@section('title')
    <title>Thống kê</title>
@endsection
@section('layout')
    <div class="page-wrapper">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Library
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Container fluid  -->
        <!-- ============================================================== -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-3">

                                    <div class="col-lg-9 mt-4">
                                        <form method="POST" action="{{ route('revenue') }}">
                                            @csrf
                                            <div class="form-group">
                                                <label for="month-picker">Chọn tháng để xem doanh thu:</label>
                                                <select id="month-picker" name="month" class="form-control" required>
                                                    <option value="">-- Chọn tháng --</option>
                                                    @for ($i = 1; $i <= 12; $i++)
                                                        <option value="{{ str_pad($i, 2, '0', STR_PAD_LEFT) }}">
                                                            {{ 'Tháng ' . $i }}</option>
                                                    @endfor
                                                </select>
                                                <select id="year-picker" name="year" class="form-control mt-2" required>
                                                    <option value="">-- Chọn năm --</option>
                                                    @for ($year = date('Y'); $year >= date('Y') - 10; $year--)
                                                        <option value="{{ $year }}">{{ $year }}</option>
                                                    @endfor
                                                </select>
                                                <button type="submit" class="btn btn-primary mt-2">Hiển thị doanh
                                                    thu</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-lg-9 mt-4">
                                        <!-- Hiển thị doanh thu nếu đã tính toán -->
                                        @if (isset($totalRevenue))
                                            <div class="row mt-4">
                                                <div class="col-12">
                                                    <div class="bg-success p-10 text-white text-center">
                                                        <h5 class="mb-0 mt-1">Doanh số tháng
                                                            {{ $month }}/{{ $year }}:</h5>
                                                        <h4>Danh số nhập: {{ $totalNhap }}</h4>
                                                        <h4>Doanh số bán: {{ $totalOrder }}</h4>
                                                        <h5 class="mb-0 mt-1">Doanh thu:</h5>
                                                        <h3 class="font-weight-bold">
                                                            {{ number_format($totalRevenue, 0, ',', '.') }} VNĐ</h3>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
