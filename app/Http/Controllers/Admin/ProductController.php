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
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\NhapChitiet;
use App\Models\XuatChitiet;
use App\Models\Xuat;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Product::orderBy('id', 'DESC')->get();
        $selectedCategoryId = session('selected_category_id') ?? request()->input('selected_category_id');
        $categories = Category::orderBy('name', 'ASC')->get();
        
        return view('admin.product.index', compact('posts','categories', 'selectedCategoryId'));
    }
    public function ctsanpham($slug)
    {
        $product = Product::where('slug', $slug)->first();
        $demtongsp = Product::All();
        return view('admin.product.sanpham', compact('product', 'demtongsp'));
    }
    public function getProductPrice($id)
    {
        $product = Product::find($id);
        if ($product) {
            return response()->json(['price' => $product->price]);
        }
        return response()->json(['price' => 0], 404);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectedCategoryId = session('selected_category_id') ?? request()->input('selected_category_id');
        $categories = Category::orderBy('name', 'ASC')->get();
        $posts = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.add', compact('categories', 'selectedCategoryId','posts'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function store(StoreProductRequest $request)
    {
        $validatedData = $request->validated();
        if ($request->input('sale_price') > $request->input('price')) {
            $validatedData['sale_price'] = null;
        }
        $post = new Product();
        if ($request->hasFile("photo")) {
            $file = $request->file("photo");
            $imageName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path("images/"), $imageName);
            $slug = Str::slug($request->name);
            $post->name = $request->name;
            $post->price = $request->price;
            $post->le_price = $request->le_price;
            $post->slug = $slug;
            $post->sale_price = $request->sale_price;
            $post->category_id = $request->category_id;
            $post->description = $request->description;
            $post->short_description = $request->short_description;
            $post->image = $imageName;
            $post->save();
        }
        if ($request->hasFile("photos")) {
            $files = $request->file("photos");
            foreach ($files as $file) {
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("images_many/"), $imageName);
                ImgProduct::create([
                    "product_id" => $post->id,
                    "image" => $imageName,
                ]);
            }
        }
        return back()->with('success', 'Thêm mới thành công');
        // return redirect()->route('product.index')->with('success', 'Thêm mới thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit(Product $product)
    {
        $products = Product::all();
        $posts = Product::findOrFail($product->id);
        $categories = Category::orderBy('name', 'ASC')->get();
        return view('admin.product.edit', compact('product', 'products', 'categories', 'posts'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        if ($request->hasFile("photo")) {
            $image = $request->file("photo");
            $imageName = 'product_' . $product->id . '.' . $image->getClientOriginalExtension();
            if (File::exists(public_path("images/" . $product->image))) {
                File::delete(public_path("images/" . $product->image));
            }
            $image->move(public_path("images/"), $imageName);
            $product->image = $imageName;
        }
        $product->name = $request->name;
        $product->slug = $request->slug;
        $product->price = $request->price;
        $product->le_price = $request->le_price;
        $product->sale_price = $request->sale_price;
        $product->category_id = $request->category_id;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->save();
        if ($request->hasFile("photos")) {
            foreach ($request->file("photos") as $file) {
                $randomString = uniqid();
                $imageName = 'product_' . $product->id . '_' . $randomString . '.' . $file->getClientOriginalExtension();
                $file->move(public_path("images_many/"), $imageName);
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        try {
            $product->delete();
            return back()->with('success', 'Xóa thành công');
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', 'Thất bại');
        }
    }
    public function trash()
    {
        $products = Product::onlyTrashed()->get();
        return view('admin.product.trash', compact('products'));
    }
    public function restore($id)
    {
        Product::withTrashed()->where('id', $id)->restore();
        return redirect()->route('product.index')->with('success', 'Khôi phục thành công');
    }
    public function forceDelete($id)
    {
        ImgProduct::where('product_id', $id)->delete();
        Product::withTrashed()->where('id', $id)->forceDelete();
        return redirect()->route('product.trash')->with('success', 'Xóa vĩnh viễn thành công');
    }
    public function search(Request $request, Cart $cart)
    {
        $query = $request->input('query');
        if ($query) {
            $products = Product::where('name', 'LIKE', "%$query%")->get();
        } else {
            return redirect()->route('empty');
        }
        return view('fe.search-results', compact('products', 'cart'));
    }
    public function deleteimagepro($id)
    {
        $image = ImgProduct::findOrFail($id);
        if (File::exists("images_many/" . $image->image)) {
            File::delete("images_many/" . $image->image);
        }
        $image->delete();
        return back()->with('success', 'Ảnh đã được xóa thành công');
    }
    public function forceDeleteSelected(Request $request)
    {
        $selectedIds = $request->input('product_ids', []);
        Product::whereIn('id', $selectedIds)->forceDelete();
        return redirect()->route('products.index')->with('success', 'Đã xóa các mục đã chọn vĩnh viễn.');
    }
    public function exportInvoice(Request $request)
    {
        $infor = Infor::latest()->first();

        $prod = Product::first();


        $address = $request->input('address');
        $email = $request->input('email');
        $phone = $request->input('phone');

        $productName = session('product_name');
        $productPrice = session('product_price');
        $totalAmount = session('total_amount');


        $product = Product::first();


        $data = [
            'invoice_number' => 'HD' . mt_rand(1000, 9999),
            'customer_name' => $infor->name,
            'address' => $infor->address,
            'phone' => $infor->phone,
            'email' => $infor->email,
            'prod_name' => $product->product_name,
            'pc' => $product->price,
            'total_amount' => '$100.00',

        ];

        // Khởi tạo Dompdf và cấu hình
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);
        $html = view('invoice', $data);
        $dompdf->loadHtml($html);
        $dompdf->render();

        // Xuất hóa đơn PDF
        return $dompdf->stream('Hoa_don_ban_hang.pdf')->back();
    }
    public function doanhthu()
    {
        $tongnhap = NhapChitiet::All();
        $tong = $tongnhap->sum('total_price');
        $tongxuat = XuatChitiet::All();
        $tongx = $tongxuat->sum('total_price');
        
        return view('admin.thongke.doanhthu', compact('tong', 'tongx'));
    }
    public function filter(Request $request)
    {

        $tongnhap = NhapChitiet::All();
        $tong = $tongnhap->sum('total_price');
        $tongxuat = XuatChitiet::All();
        $tongx = $tongxuat->sum('total_price');

        // Lấy dữ liệu từ form lọc
        $startDate = $request->input('start_date');
        $endDate = $request->input('end_date');
        $filterType = $request->input('filter_type');

        
        // Truy vấn bảng Xuat để lấy các record trong khoảng thời gian đã chọn
        $xuatIds = Xuat::whereBetween('created_at', [$startDate, $endDate])->pluck('id');

        // Truy vấn bảng XuatChitiet dựa trên các xuat_id đã lấy được
        $orders = XuatChitiet::whereIn('xuat_id', $xuatIds)->get();

        // Tính toán tổng doanh thu
        $totalRevenue = $orders->sum('total_price'); // Giả sử cột tổng giá trong bảng xuat_chitiets là total_price
        
       
        $xuatProduct=XuatChitiet::whereIn('xuat_id', $xuatIds)->get();
        // Trả về kết quả cho view
        return view('admin.thongke.doanhthu', compact('tong', 'tongx','orders', 'totalRevenue','startDate','endDate','xuatProduct'));
    }
}