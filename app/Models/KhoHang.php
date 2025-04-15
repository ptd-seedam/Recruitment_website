<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhoHang extends Model
{
    protected $table = 'kho_hang';

    protected $fillable = [
        'ten', 'dia_chi',
    ];

    public function quanLyKhos()
    {
        return $this->hasMany(QuanLyKho::class, 'kho_hang_id', 'id');
    }
}
