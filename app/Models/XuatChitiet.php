<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class XuatChitiet extends Model
{
    use HasFactory;
    protected $table = 'xuatchitiet';
    protected $fillable = ['product_id', 'xuat_id', 'price', 'total_price','quantity', 'ngaysx', 'hansd'];
    
    public function prouctid()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
    public function xuat()
    {
        return $this->belongsTo(Xuat::class);
    }
    public function xuats()
    {
        return $this->belongsTo(Xuat::class, 'xuat_id');
    }
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

}

