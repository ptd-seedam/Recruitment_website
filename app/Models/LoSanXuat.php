<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoSanXuat extends Model
{
    protected $table = 'lo_san_xuat';

    protected $fillable = [
        'san_pham_id', 'nguyen_lieu_id', 'so_luong', 'ngay_san_xuat',
    ];

    public function sanPham()
    {
        return $this->belongsTo(SanPham::class, 'san_pham_id', 'id');
    }

    public function nguyenLieu()
    {
        return $this->belongsTo(NguyenLieu::class, 'nguyen_lieu_id', 'id');
    }
}
