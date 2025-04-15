<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DoanhThu extends Model
{
    protected $table = 'doanh_thu';

    protected $fillable = [
        'don_hang_id', 'tong_doanh_thu', 'trang_thai_thanh_toan', 'ngay_thanh_toan',
    ];

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id', 'id');
    }
}
