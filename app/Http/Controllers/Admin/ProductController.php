<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Product;
use App\Models\ImgProduct;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Requests\Product\StoreProductRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; 
use Illuminate\Support\Facades\File;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product =Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.add',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(StoreProductRequest $request)
{
   
    $validatedData = $request->validated();
    if ($request->input('sale_price') > $request->input('price')) {
        $validatedData['sale_price'] = null;
    }
    $product = new Product();
    if($request->hasFile("photo")){
        $file = $request->file("photo");
        $imageName = $file->getClientOriginalName();
        $file->move(public_path("hinh_anh/"), $imageName);
        $slug = Str::slug($request->name);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->slug = $slug;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        // $product->stock = $request->stock;
        $product->image = $imageName;
        $product->save();
    }
    
    if($request->hasFile("photos")){
        $files = $request->file("photos");
        foreach($files as $file){
            $imageName = $file->getClientOriginalName();
            $file->move(public_path("hinh_anh_mo_ta/"), $imageName);
            ImgProduct::create([
                "product_id" => $product->id, 
                "image" => $imageName,
            ]);
        }
    }
    return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
}
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories= Category::all();
        $products = Product::all();
        return view('admin.product.edit',compact('product','categories','products'));
    }

    /**
     * Update the specified resource in storage.
     */
 
        public function update(Request $request, $id)
     {
         $product = Product::findOrFail($id);
         if ($request->hasFile("photo")) {
             $image = $request->file("photo");
             $imageName =  $image->getClientOriginalExtension();
             if (File::exists(public_path("hinh_anh/" . $product->image))) {
                 File::delete(public_path("hinh_anh/" . $product->image));
             }
             $image->move(public_path("hinh_anh/"), $imageName);
             $product->image = $imageName;
         }
         $product->name = $request->name;
         $product->slug = $request->slug;
         $product->price = $request->price;
         $product->sale_price = $request->sale_price;
         $product->category_id = $request->category_id;
         $product->description = $request->description;
         $product->save();
     
         if ($request->hasFile("photos")) {
           
            $oldImages = ImgProduct::where('product_id', $id)->get();
            foreach ($oldImages as $oldImage) {
                $oldImagePath = public_path("hinh_anh_mo_ta/" . $oldImage->image);
                if (File::exists($oldImagePath)) {
                    File::delete($oldImagePath);
                }
            }
            ImgProduct::where('product_id', $id)->delete();
            foreach ($request->file("photos") as $file) {
                $imageName =  $file->getClientOriginalExtension();
                $file->move(public_path("hinh_anh_mo_ta/"), $imageName);
                ImgProduct::create([
                    "product_id" => $id,
                    "image" => $imageName,
                ]);
            }
        }
         return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
     }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(string $id)
    // {
    //     try{
    //         $product->delete();
    //         return redirect()->route('product.index')->with('success','Xóa thành công');

    //     }catch(\Throwable $th){
    //         //throw $th
    //         return redirect()->back()->with('error','Thất bại');
    //     }
    // }
    // public function trash(){
    //     $product= Product::onlyTrashed()->get();
        
    //     return view('admin.product.trash',compact('product'));
    // }
    // public function restore($id){
    //     Product::withTrashed()->where('id',$id)->restore();
    //     return redirect()->route('product.index')->with('success','Khôi phục thành công');
    // }
    // public function forceDelete($id){
    //     Product::withTrashed()->where('id',$id)->forceDelete();
    //     return redirect()->route('product.trash')->with('success','Thành công');
    // }



    public function destroy(Product $product)
    {
        try{
            ImgProduct::where('product_id', $product->id)->delete();
            $product->delete();
            return redirect() ->route('product.index')->with('success','Xóa thành công');
        }
        catch(\Throwable $th){
            return redirect()->back()->with('error','Thất bại');
        }
    }
    public function trash() {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash',compact('products'));
    }
    public function restore($id){
        Product::withTrashed()->where('id',$id)->restore();
        return redirect() ->route('product.index')->with('success','Khôi phục thành công');
    }
    public function forceDelete($id){
        Product::withTrashed()->where('id',$id)->forceDelete();
       
        return redirect() ->route('product.trash')->with('success','Thành công');
    }
   
}

