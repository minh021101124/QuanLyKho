<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kho extends Model
{
    use HasFactory;
     // Tên bảng trong database
     protected $table = 'khos';

     // Các trường có thể fillable
     protected $fillable = [
         'name',
         'quantity',
         'type',
         'hansudung',
     ];
}
