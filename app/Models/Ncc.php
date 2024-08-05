<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ncc extends Model
{
    use HasFactory;
    protected $table = 'ncc';
    protected $fillable = ['id', 'ten', 'sodt', 'diachi'];

}