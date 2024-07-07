<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhapChitiet extends Model
{
    use HasFactory;
    protected $table = 'nhapchitiet';
    protected $fillable = ['product_id','nhap_id',	'price','quantity','ngaysx','hansd'];
}
