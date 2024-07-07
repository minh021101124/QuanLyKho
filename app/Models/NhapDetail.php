<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapDetail extends Model
{
    use HasFactory;

    protected $table = 'ct_nhap'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['nhap_id', 'product_id', 'quantity', 'price', 'total_price', 'ngaysx', 'hansd'];

    public function nhap()
    {
        return $this->belongsTo(Nhap::class);
    }
}
