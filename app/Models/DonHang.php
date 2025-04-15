<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonHang extends Model
{
    protected $table = 'don_hang';

    protected $fillable = [
        'khach_hang_id', 'tong_tien', 'trang_thai', 'trang_thai_thanh_toan','nguoi_dung_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'nguoi_dung_id', 'id');
    }
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id', 'id');
    }

    public function chiTietDonHangs()
    {
        return $this->hasMany(ChiTietDonHang::class, 'don_hang_id', 'id');
    }

    public function doanhThu()
    {
        return $this->hasOne(DoanhThu::class, 'don_hang_id', 'id');
    }
}
