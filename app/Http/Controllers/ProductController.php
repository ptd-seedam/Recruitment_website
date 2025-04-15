<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function list(){
        $products = SanPham::all();
        return view('product.list',
    [
        'products' => $products,
    ]);
    }
    public function add(){
        return view('product.form');
    }
    public function edit($id){
        $product = SanPham::find($id);
        return view('product.form',
        [
            'sanPham' => $product,
        ]);
    }
        // Hàm xử lý thêm mới sản phẩm
    public function store(Request $request)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'ten' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'so_luong' => 'required|integer',
            'mo_ta' => 'nullable|string',
            'hinh_sp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Xử lý upload hình ảnh
        if ($request->hasFile('hinh_sp')) {
            $imagePath = $request->file('hinh_sp')->store('images', 'public');
            $validated['hinh_sp'] = $imagePath;
        }

        // Tạo sản phẩm mới
        SanPham::create($validated);

        return redirect()->route('product.list')->with('message', 'Thêm sản phẩm thành công!');
    }

    // Hàm xử lý cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        // Validate dữ liệu
        $validated = $request->validate([
            'ten' => 'required|string|max:255',
            'gia' => 'required|numeric',
            'so_luong' => 'required|integer',
            'mo_ta' => 'nullable|string',
            'hinh_sp' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // Tìm sản phẩm theo ID
        $sanPham = SanPham::findOrFail($id);

        // Xử lý upload hình ảnh mới nếu có
        if ($request->hasFile('hinh_sp')) {
            // Xóa hình ảnh cũ nếu có
            if ($sanPham->hinh_sp && Storage::disk('public')->exists($sanPham->hinh_sp)) {
                Storage::disk('public')->delete($sanPham->hinh_sp);
            }

            // Lưu hình ảnh mới
            $imagePath = $request->file('hinh_sp')->store('images', 'public');
            $validated['hinh_sp'] = $imagePath;
        }

        // Cập nhật sản phẩm
        $sanPham->update($validated);

        return redirect()->route('product.list')->with('message', 'Cập nhật sản phẩm thành công!');
    }
    public function delete($id){
        $product = SanPham::find($id);
        $product->delete();
        return redirect()->back()->with('message', 'Đã xóa thành công sản phẩm');
    }
}
