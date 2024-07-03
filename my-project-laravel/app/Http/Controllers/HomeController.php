<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Http\Controllers\Controller;

use App\Helper\Cart;
use App\Models\Category;


class HomeController extends Controller
{
    public  function index(){
        $featureProducts= Product::all();
       
        return view('fe.home',compact('featureProducts'));
    }
    private function getAllCate(Category $category)
    {
        $ids = collect([$category->id]);
        $children = $category->allChildrenCategories()->get();

        foreach ($children as $child) {
            $ids = $ids->merge($this->getAllCate($child));
        }

        return $ids;
    }
    public function detail($slug) { 
        $product= Product::where('slug',$slug)->first();
        $related = Product::where('category_id',$product->category_id)->where('id','!=',$product->id)->get();
        return view('fe.detail', compact('product','related'));

    }




  
    
    public function category(Category $cat, Cart $cart)
    {
        $categoryIds = $this->getAllCate($cat);
        $products = Product::whereIn('category_id', $categoryIds)->paginate(9);
        return view('fe.category_product', compact('cat', 'products', 'cart'));
    }

    
}
