<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'san_pham';

    protected $fillable = [
        'ten',
        'gia',
        'so_luong',
        'mo_ta',
        'hinh_sp'
    ];

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'san_pham_id', 'id');
    }
    public function chiTietNhapHangs()
    {
        return $this->hasMany(ChiTietNhapHang::class, 'san_pham_id', 'id');
    }

    public function loSanXuats()
    {
        return $this->hasMany(LoSanXuat::class, 'san_pham_id', 'id');
    }
}
