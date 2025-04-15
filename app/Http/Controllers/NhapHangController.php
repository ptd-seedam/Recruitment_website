<?php

namespace App\Http\Controllers;


use App\Models\ChiTietDonHang;
use App\Models\ChiTietNhapHang;
use App\Models\DonHang;
use App\Models\KhachHang;
use App\Models\KhoHang;
use App\Models\Nhaphang;
use Illuminate\Http\Request;
use App\Models\SanPham;
use Illuminate\Support\Facades\Auth;

class NhapHangController extends Controller
{

    public function index()
    {
        $donHangs = Nhaphang::all(); // Lấy tất cả đơn hàng và thông tin khách hàng liên quan
        return view('Nhap.list', [
            'donHangs' => $donHangs,
        ]);
    }



    // Hiển thị form thêm mới đơn hàng

    public function create_all()
    {
        $sanPhams = SanPham::all(); // Lấy tất cả sản phẩm // Lấy tất cả khách hàng
        return view('nhap.form', compact('sanPhams'));
    }
    // Lưu đơn hàng mới
    public function store(Request $request)
    {
        $request->validate([
            'san_pham_id' => 'required|array',
            'so_luong' => 'required|array',
            'trang_thai' => 'required',
            'trang_thai_thanh_toan' => 'required',
        ]);

        // Tạo đơn hàng mới
        $order = NhapHang::create([
            'trang_thai' => $request->trang_thai,
            'trang_thai_thanh_toan' => $request->trang_thai_thanh_toan,
            'tong_tien' => $this->tinhTongTien($request->san_pham_id, $request->so_luong),
            'nguoi_dung_id' => $request->user()->id, // Thêm dòng này để lưu ID người dùng
        ]);

        // Lưu chi tiết đơn hàng
        $this->luuChiTietDonHang($order->id, $request->san_pham_id, $request->so_luong);

        return redirect()->route('nhap.index')->with('message', 'Thêm đơn hàng thành công!');
    }


    // Hiển thị form chỉnh sửa đơn hàng
    public function edit($id)
    {
        $order = Nhaphang::with('chiTietNhapHangs.sanPham')->find($id); // Lấy đơn hàng với chi tiết
        $sanPhams = SanPham::all();
        return view('nhap.form', compact('order', 'sanPhams'));
    }
    public function show($id)
    {
        $order = NhapHang::with('chiTietNhapHangs.sanPham')->find($id); // Lấy đơn hàng với chi tiết
        $sanPhams = SanPham::all();
        return view('nhap.show', compact('order', 'sanPhams'));
    }

    // Cập nhật đơn hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'san_pham_id' => 'required|array',
            'so_luong' => 'required|array',
        ]);

        // Tìm đơn hàng
        $order = NhapHang::findOrFail($id);

        // Cập nhật thông tin đơn hàng
        $order->update([
            'trang_thai' => $request->trang_thai,
            'tong_tien' => $this->tinhTongTien($request->san_pham_id, $request->so_luong),
            'trang_thai_thanh_toan' => $request->trang_thai_thanh_toan,
        ]);

        // Xóa chi tiết cũ và lưu chi tiết mới
        ChiTietNhapHang::where('nhap_hang_id', $id)->delete();
        $this->luuChiTietDonHang($order->id, $request->san_pham_id, $request->so_luong);

        return redirect()->route('nhap.index')->with('message', 'Cập nhật đơn hàng thành công!');
    }

    // Xóa đơn hàng
    public function destroy($id)
    {
        $donHang = NhapHang::findOrFail($id);
        $chitietdonhangs = ChiTietNhapHang::where('nhap_hang_id', $id)->get();

        foreach ($chitietdonhangs as $chitiet) {
            $chitiet->delete();
        }

        $donHang->delete();
        return redirect()->route('nhap.index')->with('message', 'Xóa đơn hàng thành công!');
    }
    // Hàm tính tổng tiền của đơn hàng
    private function tinhTongTien($sanPhamIds, $soLuongs)
    {
        $tongTien = 0;

        foreach ($sanPhamIds as $index => $sanPhamId) {
            // Tìm sản phẩm
            $sanPham = SanPham::findOrFail($sanPhamId);

            // Tính tổng tiền cho sản phẩm hiện tại (giá * số lượng)
            $tongTien += $sanPham->gia * $soLuongs[$index];
        }

        return $tongTien;
    }
    // Hàm lưu chi tiết đơn hàng
    private function luuChiTietDonHang($orderId, $sanPhamIds, $soLuongs)
    {
        foreach ($sanPhamIds as $index => $sanPhamId) {
            // Lưu chi tiết đơn hàng
            ChiTietNhapHang::create([
                'nhap_hang_id' => $orderId,
                'san_pham_id' => $sanPhamId,
                'so_luong' => $soLuongs[$index],
                'gia' => SanPham::findOrFail($sanPhamId)->gia, // Lấy giá của sản phẩm
            ]);

            // Sửa lại đoạn này để tìm sản phẩm theo ID
            $sanPham = SanPham::findOrFail($sanPhamId);
            $sanPham->so_luong += $soLuongs[$index];
            $sanPham->save();
        }
    }
}
