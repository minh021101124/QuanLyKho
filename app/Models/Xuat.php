<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Xuat extends Model
{
    use HasFactory;

    protected $table = 'xuat';
    protected $fillable = [
        'ma_xuat',
        'nguoi_xuat',
        'ghi_chu',
        'noi_dung_xuat',
    ];
    protected $attributes = [
        'ghi_chu' => 'Không có ghi chú',
        'nguoi_xuat' => 'Admin',
    ];
    public function setNguoiNhapAttribute($value)
    {
        $this->attributes['nguoi_xuat'] = $value ?? 'admin';
    }
    

    public function ctNhap()
    {
        return $this->hasMany(XuatChitiet::class);
    }
    public function xuatChitiets()
    {
        return $this->hasMany(XuatChitiet::class, 'xuat_id');
    }
}
