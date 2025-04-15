@extends('layout')

@section('title')
    <title>{{ isset($order) ? 'Cập nhật Đơn hàng' : 'Thêm mới Đơn hàng' }}</title>
@endsection

@section('layout')
    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-12 d-flex no-block align-items-center">
                    <h4 class="page-title">{{ isset($order) ? 'Cập nhật Đơn nhập hàng' : 'Thêm Đơn nhập hàng' }}</h4>
                    <div class="ms-auto text-end">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    {{ isset($order) ? 'Cập nhật Đơn nhập hàng' : 'Thêm Đơn nhập hàng' }}</li>
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
                        <form class="form-horizontal" method="POST"
                            action="{{ isset($order) ? route('nhap.update', $order->id) : route('nhap.store') }}">
                            @csrf
                            <div class="card-body">
                                <h4 class="card-title">{{ isset($order) ? 'Cập nhật' : 'Thêm mới' }}</h4>
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        {{ session('message') }}
                                    </div>
                                @endif

                                @if (isset($order))
                                    <div class="form-group row">
                                        <label for="khach_hang_id"
                                            class="col-sm-3 text-end control-label col-form-label">Trạng thái đơn
                                            hàng</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="khach_hang_id" name="trang_thai" required>
                                                <option value="">Chọn trạng thái đơn nhập hàng</option>)
                                                <option value="Đang xữ lý"
                                                    {{ $order->trang_thai == 'Đang xữ lý' ? 'selected' : '' }}>Đang xữ lý
                                                </option>
                                                <option value="Đang giao hàng"
                                                    {{ $order->trang_thai == 'Đang giao hàng' ? 'selected' : '' }}>Đang giao
                                                    hàng</option>
                                                <option value="Đã hoàn thành"
                                                    {{ $order->trang_thai == 'Đã hoàn thành' ? 'selected' : '' }}>Đã hoàn
                                                    thành</option>
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label for="khach_hang_id"
                                            class="col-sm-3 text-end control-label col-form-label">Trạng thái đơn
                                            hàng</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="khach_hang_id" name="trang_thai" required>
                                                <option value="">Chọn trạng thái đơn hàng</option>)
                                                <option value="Đang xữ lý">Đang xữ lý</option>
                                                <option value="Đang giao hàng">Đang giao hàng</option>
                                                <option value="Đã hoàn thành">Đã hoàn thành</option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                @if (isset($order))
                                    <div class="form-group row">
                                        <label for="khach_hang_id"
                                            class="col-sm-3 text-end control-label col-form-label">Trạng thái thanh
                                            toán</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="khach_hang_id" name="trang_thai_thanh_toan"
                                                required>
                                                <option value="">Chọn trạng thái thanh toán đơn hàng</option>)
                                                <option value="Chưa thanh toán"
                                                    {{ $order->trang_thai_thanh_toan == 'Chưa thanh toán' ? 'selected' : '' }}>
                                                    Chưa thanh toán</option>
                                                <option value="Đã thanh toán qua ngân hàng"
                                                    {{ $order->trang_thai_thanh_toan == 'Đã thanh toán qua ngân hàng' ? 'selected' : '' }}>
                                                    Đã thanh toán qua ngân hàng</option>
                                                <option value="Đã thanh toán bằng tiền mặt"
                                                    {{ $order->trang_thai_thanh_toan == 'Đã thanh toán bằng tiền mặt' ? 'selected' : '' }}>
                                                    Đã thanh toán bằng tiền mặt</option>
                                            </select>
                                        </div>
                                    </div>
                                @else
                                    <div class="form-group row">
                                        <label for="khach_hang_id"
                                            class="col-sm-3 text-end control-label col-form-label">Trạng thái thanh
                                            toán</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" id="khach_hang_id" name="trang_thai_thanh_toan"
                                                required>
                                                <option value="">Chọn trạng thái thanh toán đơn hàng</option>)
                                                <option value="Chưa thanh toán">Chưa thanh toán</option>
                                                <option value="Đã thanh toán qua ngân hàng">Đã thanh toán qua ngân hàng
                                                </option>
                                                <option value="Đã thanh toán bằng tiền mặt">Đã thanh toán bằng tiền mặt
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                @endif
                                <!-- Danh sách sản phẩm -->
                                <div id="product-list">
                                    @if (isset($order) && $order->chiTietNhapHangs)
                                        @foreach ($order->chiTietDonHangs as $key => $chiTiet)
                                            <div class="product-item" data-index="{{ $key }}">
                                                <div class="form-group row">
                                                    <label for="san_pham_id_{{ $key }}"
                                                        class="col-sm-3 text-end control-label col-form-label">Sản
                                                        phẩm</label>
                                                    <div class="col-sm-6">
                                                        <select class="form-control san-pham"
                                                            id="san_pham_id_{{ $key }}" name="san_pham_id[]"
                                                            onchange="updatePrice(this, {{ $key }})">
                                                            <option value="">Chọn sản phẩm</option>
                                                            @foreach ($sanPhams as $sanPham)
                                                                <option value="{{ $sanPham->id }}"
                                                                    data-price="{{ $sanPham->gia }}"
                                                                    {{ $chiTiet->san_pham_id == $sanPham->id ? 'selected' : '' }}>
                                                                    {{ $sanPham->ten }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <input type="number" class="form-control so-luong"
                                                            name="so_luong[]" id="so_luong_{{ $key }}"
                                                            value="{{ $chiTiet->so_luong }}" oninput="updateTotal()" />
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="gia_{{ $key }}"
                                                        class="col-sm-3 text-end control-label col-form-label">Giá sản
                                                        phẩm</label>
                                                    <div class="col-sm-6">
                                                        <input type="text" class="form-control gia"
                                                            id="gia_{{ $key }}"
                                                            value="{{ number_format($chiTiet->sanPham->gia) }} VND"
                                                            readonly />
                                                    </div>
                                                </div>

                                                <hr />
                                            </div>
                                        @endforeach
                                    @else
                                        <div class="product-item" data-index="0">
                                            <div class="form-group row">
                                                <label for="san_pham_id_0"
                                                    class="col-sm-3 text-end control-label col-form-label">Sản phẩm</label>
                                                <div class="col-sm-6">
                                                    <select class="form-control san-pham" id="san_pham_id_0"
                                                        name="san_pham_id[]" onchange="updatePrice(this, 0)">
                                                        <option value="">Chọn sản phẩm</option>
                                                        @foreach ($sanPhams as $sanPham)
                                                            <option value="{{ $sanPham->id }}"
                                                                data-price="{{ $sanPham->gia }}">{{ $sanPham->ten }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-3">
                                                    <input type="number" class="form-control so-luong" name="so_luong[]"
                                                        id="so_luong_0" value="1" oninput="updateTotal()" />
                                                </div>
                                            </div>

                                            <div class="form-group row">
                                                <label for="gia_0"
                                                    class="col-sm-3 text-end control-label col-form-label">Giá sản
                                                    phẩm</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control gia" id="gia_0"
                                                        readonly />
                                                </div>
                                            </div>

                                            <hr />
                                        </div>
                                    @endif
                                </div>

                                <button type="button" class="btn btn-success" onclick="addProduct()">Thêm sản
                                    phẩm</button>
                                <button type="button" class="btn btn-danger" onclick="removeProduct()">Xóa sản
                                    phẩm</button>

                                <!-- Tổng tiền -->
                                <div class="form-group row">
                                    <label for="tong_tien" class="col-sm-3 text-end control-label col-form-label">Tổng
                                        tiền</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="tong_tien" name="tong_tien"
                                            readonly />
                                    </div>
                                </div>
                            </div>

                            <div class="border-top">
                                <div class="card-body">
                                    <button type="submit"
                                        class="btn btn-primary">{{ isset($order) ? 'Cập nhật' : 'Thêm mới' }}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .page-wrapper {
            background: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
        }

        .card {
            border: none;
            border-radius: 8px;
        }

        .card-title {
            font-weight: bold;
        }

        .form-control {
            border-radius: 5px;
        }

        .btn {
            border-radius: 5px;
            font-weight: bold;
        }

        .product-item {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 10px;
            background: #ffffff;
        }
    </style>

    <script>
        // Cập nhật giá sản phẩm khi chọn sản phẩm
        function updatePrice(selectElement, index) {
            const selectedOption = selectElement.options[selectElement.selectedIndex];
            const price = selectedOption.getAttribute('data-price');
            document.getElementById('gia_' + index).value = price ? new Intl.NumberFormat().format(price) + ' VND' : '';
            updateTotal();
        }

        // Cập nhật tổng tiền
        function updateTotal() {
            let total = 0;
            document.querySelectorAll('.product-item').forEach(item => {
                const price = parseFloat(item.querySelector('.san-pham').selectedOptions[0].getAttribute(
                    'data-price')) || 0;
                const quantity = parseFloat(item.querySelector('.so-luong').value) || 0;
                total += price * quantity;
            });
            document.getElementById('tong_tien').value = new Intl.NumberFormat().format(total) + ' VND';
        }

        // Thêm sản phẩm mới vào form
        function addProduct() {
            const productList = document.getElementById('product-list');
            const newIndex = productList.querySelectorAll('.product-item').length;
            const newProduct = document.querySelector('.product-item').cloneNode(true);

            // Cập nhật chỉ số cho sản phẩm mới
            newProduct.setAttribute('data-index', newIndex);
            newProduct.querySelectorAll('select, input').forEach(input => {
                input.id = input.id.replace(/_\d+/, `_${newIndex}`);
                input.value = ''; // Xóa giá trị của input mới
                if (input.classList.contains('so-luong')) {
                    input.value = '1'; // Đặt mặc định số lượng là 1
                }
                if (input.classList.contains('gia')) {
                    input.value = ''; // Xóa giá sản phẩm
                }
            });

            // Thêm sự kiện onchange cho select mới
            newProduct.querySelector('.san-pham').setAttribute('onchange', `updatePrice(this, ${newIndex})`);

            productList.appendChild(newProduct);
        }

        // Xóa sản phẩm
        function removeProduct() {
            const productItems = document.querySelectorAll('.product-item');
            if (productItems.length > 1) {
                productItems[productItems.length - 1].remove();
                updateTotal();
            }
        }

        // Tự động cập nhật tổng tiền khi tải trang
        document.addEventListener('DOMContentLoaded', updateTotal);
    </script>


@endsection
