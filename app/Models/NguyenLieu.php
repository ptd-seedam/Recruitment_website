<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NguyenLieu extends Model
{
    protected $table = 'nguyen_lieu';

    protected $fillable = [
        'ten', 'don_vi', 'gia', 'so_luong_ton',
    ];

    public function loSanXuats()
    {
        return $this->hasMany(LoSanXuat::class, 'nguyen_lieu_id', 'id');
    }
}
