<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =['name','parent_id','status']; 
    
    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    //quan he 1-n
    public function products()
    {
        return $this->hasMany(Product::class,'category_id','id')->orderBy('created_at','DESC');
    }
    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    public function childrenCategories()
    {
        return $this->hasMany(Category::class, 'parent_id', 'id');
    }
    
    public function allChildrenCategories()
    {
        return $this->childrenCategories()->with('allChildrenCategories');
    }
    
    
  
}
