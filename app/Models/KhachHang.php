<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khach_hang';

    protected $fillable = [
        'ten', 'email', 'sdt', 'dia_chi',
    ];

    public function donHangs()
    {
        return $this->hasMany(DonHang::class, 'khach_hang_id', 'id');
    }

    public function noCongs()
    {
        return $this->hasMany(NoCong::class, 'khach_hang_id', 'id');
    }
}
