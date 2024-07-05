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
}
