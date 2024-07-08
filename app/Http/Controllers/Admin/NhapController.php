<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Infor;
// use App\Models\Invoice;
// use App\Models\Category;
use App\Models\Nhap;
use App\Models\NhapChitiet;
use App\Models\Product;
use Carbon\Carbon;


class NhapController extends Controller
{
    public function index() {
       $nhap = Nhap::All();
    //    $products = Product::orderBy('id', 'DESC')->get();
    $products = Product::all();
        return view('admin.nhap.index', compact('nhap','products'));
    }
    // public function store(Request $request)
    // {
    //     // Lưu thông tin hóa đơn nhập hàng
    //     $nhap = new Nhap();
    //     $nhap->ma_don = $request->ma_don;
    //     $nhap->nguoi_nhap = $request->nguoi_nhap ?? 'admin';

    //     $nhap->ghi_chu = $request->ghi_chu;
    //     $nhap->noi_dung_nhap = $request->noi_dung_nhap;
    //     $nhap->save();
    
    //     // Lấy id của hóa đơn nhập hàng vừa lưu
    //     $nhap_id = $nhap->id;
    
    //     // Lưu chi tiết hóa đơn nhập hàng
    //     $validatedData = $request->validate([
    //         'product_id' => 'required|integer',
    //         'price' => 'required|numeric',
    //         'quantity' => 'required|integer',
    //     ]);
    
    //     $nhapChiTiet = new NhapChitiet();
    //     $nhapChiTiet->product_id = $validatedData['product_id'];
    //     $nhapChiTiet->nhap_id = $nhap_id; 
    //     $nhapChiTiet->price = $validatedData['price'];
    //     $nhapChiTiet->quantity = $validatedData['quantity'];
    //     $nhapChiTiet->save();
    
    //     // Cập nhật số lượng sản phẩm trong bảng products nếu cần thiết
    //     $product = Product::find($validatedData['product_id']);
    //     if ($product) {
    //         $product->quantity += $validatedData['quantity'];
    //         $product->save();
    //     }
    
    //    return redirect()->route('nhap.index')->with('success', 'Thêm mới thành công');
    // }


        public function store(Request $request)
{
    // Lưu thông tin hóa đơn nhập hàng
    $nhap = new Nhap();
    $nhap->ma_don = $request->ma_don;
    $nhap->nguoi_nhap = $request->nguoi_nhap ?? 'admin';
    $nhap->ghi_chu = $request->ghi_chu;
    $nhap->noi_dung_nhap = $request->noi_dung_nhap;

    // Kiểm tra và lưu `nhap` chỉ khi không có lỗi xảy ra
    try {
        $nhap->save();
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }

    // Lấy id của hóa đơn nhập hàng vừa lưu
    $nhap_id = $nhap->id;

    // Lưu chi tiết hóa đơn nhập hàng
    $validatedData = $request->validate([
        'product_id' => 'required|integer',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
    ]);

    $nhapChiTiet = new NhapChitiet();
    $nhapChiTiet->product_id = $validatedData['product_id'];
    $nhapChiTiet->nhap_id = $nhap_id;
    $nhapChiTiet->price = $validatedData['price'];
    $nhapChiTiet->quantity = $validatedData['quantity'];

    // Kiểm tra và lưu `nhapChiTiet` chỉ khi không có lỗi xảy ra
    try {
        $nhapChiTiet->save();
    } catch (\Exception $e) {
        // Nếu có lỗi, xóa hóa đơn `nhap` vừa tạo để không lưu vào cơ sở dữ liệu
        $nhap->delete();
        return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
    }

    // Cập nhật số lượng sản phẩm trong bảng products nếu cần thiết
    $product = Product::find($validatedData['product_id']);
    if ($product) {
        $product->quantity += $validatedData['quantity'];
        $product->save();
    }

    return redirect()->route('admin.nhap.index')->with('success', 'Thêm mới thành công');
}
//  // Phương thức để hiển thị form với nhap_id
//  public function showForm($nhap_id)
//  {
//      // Kiểm tra nhap_id
//      return view('admin.taodon', compact('nhap_id'));
//  }

//  // Phương thức để lưu dữ liệu
//  public function Luu(Request $request, $nhap_id)
//  {
//      // Validate dữ liệu
//      $validatedData = $request->validate([
//          'product_id' => 'required|integer|exists:san_pham,id',
//          'price' => 'required|numeric',
//          'quantity' => 'required|integer',
//      ]);

//      // Lưu chi tiết hóa đơn nhập hàng
//      $nhapChiTiet = new NhapChitiet();
//      $nhapChiTiet->nhap_id = $nhap_id;
//      $nhapChiTiet->product_id = $validatedData['product_id'];
//      $nhapChiTiet->price = $validatedData['price'];
//      $nhapChiTiet->quantity = $validatedData['quantity'];
//      $nhapChiTiet->save();

//      return redirect()->route('nhap.index')->with('success', 'Đã lưu đơn nhập thành công.');
//  }
public function add($id){
    // $nhap = Nhap::all();
    $products = Product::all();
   $duliu = NhapChitiet::All();
    $mado = Nhap::All();
    return view('admin.nhap.themsp',compact('duliu','mado','products'));
}
//  public function taodon($id){
//     // $nhap = Nhap::all();
//     // $products = Product::all();
//    $duli = NhapChitiet::All();
//     $madon = Nhap::All();
//     return view('admin.nhap.donhang',compact('duli','madon'));
// }
public function taodon($id)
    {
        // Lấy thông tin nhập và danh sách sản phẩm liên quan
        $nhap = Nhap::with('ctNhap')->find($id);

        if ($nhap) {
            // Trả về view cùng với dữ liệu nhập và sản phẩm
            return view('admin.nhap.donhang', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {
            // Trả về trang lỗi nếu không tìm thấy
            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
    }
public function fetch()
{
    // Fetch product information (you can modify this query based on your needs)
    $product = Nhap::find(1); // Example: Fetch product with ID 1

    // Return view with product information
    return view('admin.nhap.index', compact('product'));
}
    public function nhaphang(){
        // $nhap = Nhap::all();
        // $products = Product::all();
        $nhap = Nhap::orderBy('id', 'DESC')->get();
        return view('admin.nhap.index', compact('nhap'));
    }
    
    public function create()
    {
        $nhap = Nhap::all();
        $products = Product::all(); 
        return view('admin.nhap.add', compact('nhap','products'));
    }
    public function dsnhap(){
        return view('admin.nhap.list');
    }
    // public function xuat(){
    //     return view('admin.xuat.index');
    // }
    
    // public function create()
    // {
    //    $nhap = Nhap::orderBy('name','ASC')->get();
    //     return view('admin.nhap.add',compact('nhap'));
    // }
    // public function store(Request $request) {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'quantity' => 'required|integer',
    //         'type' => 'required|in:nhap,xuat',
    //         'hansudung' => 'nullable|date',
    //     ]);

    //     Nhap::create($validatedData);
    //     return redirect()->route('kho.index')->with('success', 'hoàn thành');
    // }
   
}


 