<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NoCong extends Model
{
    protected $table = 'no_cong';

    protected $fillable = [
        'khach_hang_id', 'tong_no', 'han_thanh_toan', 'trang_thai',
    ];

    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'khach_hang_id', 'id');
    }

    public function chiTietNoCongs()
    {
        return $this->hasMany(ChiTietNoCong::class, 'no_cong_id', 'id');
    }
}
