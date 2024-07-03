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
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::all();
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
    public function store(Request $request)
    {
        try {
            // Check if a photo is uploaded
            if ($request->hasFile('photo')) {
                // Get the uploaded file
                $uploadedFile = $request->file('photo');
    
                // Generate a unique file name
                $fileName = $uploadedFile->getClientOriginalName();
                
                // Store the file
                $uploadedFile->storeAs('public/images', $fileName);
                
                // Assign the file name to the 'image' field in the request
                $request->merge(['image' => $fileName]);
            }
    
            // Create the product with the provided data
            $product = Product::create($request->all());
            
            // Check if additional photos are uploaded
            if ($product && $request->hasFile('photos')) {
                // Loop through each additional photo


                
                foreach ($request->file('photos') as $photo) {
                    $fileName = $photo->getClientOriginalName();
                    $photo->storeAs('public/images', $fileName);
                    
                    // Create a record in ImgProduct for each additional photo
                    ImgProduct::create([
                        'product_id' => $product->id,
                        'image' => $fileName
                    ]);
                }
            }
            return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
        } catch (\Throwable $th) {
            // Handle exceptions here
        }
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
        // public function update(Request $request, string $id)
        // {
        //     try{
        //         $product->update($request->all());
        //         return redirect()->route('product.index')->with('success','Cập nhật thành công');

        //     }catch(\Throwable $th){
        //         //throw $th
        //         return redirect()->back()->with('error','Thêm mới thất bại');
        //     }
        // }
        public function update(UpdateProductRequest $request, Product $product)
{

    
    try {
        // Kiểm tra nếu có ảnh sản phẩm mới được tải lên
        if ($request->hasFile('photo')) {
            // Lưu ảnh mới vào thư mục
            $fileName = $request->photo->getClientOriginalName();
            $request->photo->storeAs('public/images', $fileName);
            // Cập nhật đường dẫn ảnh mới vào cơ sở dữ liệu
            $product->update([
                'image' => $fileName
            ]);
        }

        // Kiểm tra nếu có ảnh mô tả mới được tải lên
        if ($request->hasFile('photos')) {
            // Xử lý và lưu ảnh mô tả mới vào thư mục
            foreach ($request->file('photos') as $photo) {
                $fileName = $photo->getClientOriginalName();
                $photo->storeAs('public/images', $fileName);
                // Thêm ảnh mô tả mới vào cơ sở dữ liệu
                $product->images()->create(['image' => $fileName]);
            }
        }

       

        // Cập nhật các trường dữ liệu khác của sản phẩm
        $product->update($request->except(['_token', 'photo', 'photos', 'removed_photos']));

        return redirect()->route('product.index')->with('success', 'Cập nhật thành công');
     } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Cập nhật thất bại: ' . $th->getMessage());
     }
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

