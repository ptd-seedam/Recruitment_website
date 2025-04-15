<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietNhapHang extends Model
{
    protected $table = 'chi_tiet_nhap_hang';

    protected $fillable = [
        'nhap_hang_id',
        'san_pham_id',
        'so_luong',
        'gia',
    ];

    public function nhapHang()
    {
        return $this->belongsTo(Nhaphang::class, 'nhap_hang_id', 'id');
    }

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id', 'id');
    }
}
