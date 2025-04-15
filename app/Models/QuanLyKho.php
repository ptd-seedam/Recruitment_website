<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuanLyKho extends Model
{
    protected $table = 'quan_ly_kho';

    protected $fillable = [
        'kho_hang_id',
        'san_pham_id',
        'loai_chuyen_dong',
        'so_luong',
    ];

    public function khoHang()
    {
        return $this->belongsTo(KhoHang::class, 'kho_hang_id', 'id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id', 'id');
    }
}
