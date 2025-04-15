<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Nhaphang extends Model
{
    protected $table = 'nhap_hang';
    protected $fillable = [
        'tong_tien',
        'trang_thai',
        'trang_thai_thanh_toan',
        'nguoi_dung_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id', 'id');
    }

    public function chiTietNhapHangs()
    {
        return $this->hasMany(ChiTietNhapHang::class, 'nhap_hang_id', 'id');
    }
}
