<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function list()
    {
        $khachHangs = KhachHang::all();
        return view('customer.list', compact('khachHangs'));
    }

    // Hiển thị form thêm mới khách hàng
    public function create()
    {
        return view('customer.form'); // form thêm khách hàng
    }

    // Lưu khách hàng mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        // Validate dữ liệu
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:khach_hang,email',
            'sdt' => 'required|string|max:20',
            'dia_chi' => 'required|string|max:255',
        ]);

        // Tạo mới khách hàng
        KhachHang::create($request->all());

        return redirect()->route('customer.list')->with('success', 'Khách hàng đã được thêm thành công.');
    }

    // Hiển thị form chỉnh sửa khách hàng
    public function edit($id)
    {
        $khachHang = KhachHang::findOrFail($id);
        return view('customer.form', compact('khachHang'));
    }

    // Cập nhật thông tin khách hàng
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $request->validate([
            'ten' => 'required|string|max:255',
            'email' => 'required|email|unique:khach_hang,email,' . $id,
            'sdt' => 'required|string|max:20',
            'dia_chi' => 'required|string|max:255',
        ]);

        // Tìm và cập nhật khách hàng
        $khachHang = KhachHang::findOrFail($id);
        $khachHang->update($request->all());

        return redirect()->route('customer.list')->with('success', 'Thông tin khách hàng đã được cập nhật.');
    }

    // Xóa khách hàng
    public function delete($id)
    {
        $khachHang = KhachHang::findOrFail($id);
        $khachHang->delete();

        return redirect()->route('customer.list')->with('success', 'Khách hàng đã được xóa thành công.');
    }
}
