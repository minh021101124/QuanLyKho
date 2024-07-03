<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable=['name','price','sale_price','image','category_id','slug','description'];
  
    
/**
 * The category that belong to the Product
 * 
 * 
 * @return \\Illuminate\Database\Eloquent\Relations\BelongsTo
 */
public function category()
{
    return $this->belongsTo(Category::class);
}
public function images()
    {
        return $this->hasMany(ImgProduct::class);
    }
    
}