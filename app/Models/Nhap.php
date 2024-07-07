<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nhap extends Model
{
    use HasFactory;

    protected $fillable = [
        'ma_don',
        'nguoi_nhap',
        'ghi_chu',
        'noi_dung_nhap',
    ];
    protected $attributes = [
        'ghi_chu' => 'Không có ghi chú',
        'nguoi_nhap' => 'Admin',
    ];
    public function setNguoiNhapAttribute($value)
    {
        $this->attributes['nguoi_nhap'] = $value ?? 'admin';
    }
    
}
