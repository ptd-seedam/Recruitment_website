<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChiTietNoCong extends Model
{
    protected $table = 'chi_tiet_no_cong';

    protected $fillable = [
        'no_cong_id', 'don_hang_id', 'so_tien_con_no',
    ];

    public function noCong()
    {
        return $this->belongsTo(NoCong::class, 'no_cong_id', 'id');
    }

    public function donHang()
    {
        return $this->belongsTo(DonHang::class, 'don_hang_id', 'id');
    }
}
