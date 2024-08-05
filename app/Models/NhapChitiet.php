<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapChitiet extends Model
{
    use HasFactory;
    protected $table = 'nhapchitiet';
    protected $fillable = ['product_id', 'nhap_id', 'price', 'total_price', 'quantity', 'ngaysx', 'hansd'];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function nhap()
    {
        return $this->belongsTo(Nhap::class);
    }
    public function ncc()
    {
        return $this->belongsTo(Ncc::class, 'ncc_id');
    }


}
