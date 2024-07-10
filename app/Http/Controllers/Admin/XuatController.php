<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xuat;
use App\Models\XuatChitiet;
use App\Models\Product;
use Carbon\Carbon;

class XuatController extends Controller
{
    public function index() {
       $xuat = Xuat::All();
    //    $products = Product::orderBy('id', 'DESC')->get();
    $products = Product::all();
        return view('admin.xuat.index', compact('xuat','products'));
    }
    public function xuathang(){
        $xuat = Xuat::all();
        $products = Product::all();
        return view('admin.xuat.index', compact('xuat','products'));
    }
    public function create()
    {
        $xuat = Xuat::all();
        $products = Product::all(); 
        return view('admin.xuat.add', compact('xuat','products'));
    }
    public function dsxuat() {
        $nhap = Xuat::All();
        
        $xuatchitiet = XuatChitiet::orderBy('id', 'DESC')->get();
      // $products = Product::orderBy('id', 'DESC')->get();
         $products = Product::all();
         return view('admin.xuat.list', compact('nhap','products','xuatchitiet'));
     }
    // public function xuat(){
    //     return view('admin.xuat.index');
    // }
    
    // public function create()
    // {
    //    $nhap = Nhap::orderBy('name','ASC')->get();
    //     return view('admin.nhap.add',compact('xuat'));
    // }
    // public function store(Request $request) {
    //     $validatedData = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'quantity' => 'required|integer',
    //         'type' => 'required|in:xuat,xuat',
    //         'hansudung' => 'nullable|date',
    //     ]);

    //     xuat::create($validatedData);
    //     return redirect()->route('kho.index')->with('success', 'hoàn thành');
    // }
    

    public function store(Request $request)
{
    $request->validate([
        'ma_xuat' => 'required|string|max:255',
        'nguoi_xuat' => 'nullable|string|max:255',
        'ghi_chu' => 'nullable|string',
        'noi_dung_xuat' => 'nullable|string',
        'product_id' => 'required|array',
        'product_id.*' => 'required|exists:products,id',
        'quantity' => 'required|array',
        'quantity.*' => 'required|integer|min:1|max:100',
        'price' => 'required|array',
        'price.*' => 'required|numeric',
        'total_price' => 'required|array',
        'total_price.*' => 'required|numeric',
        'ngaysx' => 'required',
        'hansd' => 'required',
    ]);

    // Check if quantity requested is not more than available quantity
    foreach ($request->product_id as $key => $productId) {
        $product = Product::findOrFail($productId);
        $requestedQuantity = $request->quantity[$key];

        if ($requestedQuantity > $product->quantity) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Số lượng xuất của sản phẩm ' . $product->name . ' không được lớn hơn số lượng hiện có (' . $product->quantity . ')']);
        }
    }

    // Proceed to save the export record
    $nhap = new Xuat();
    $nhap->ma_xuat = $request->ma_xuat;
    $nhap->nguoi_xuat = $request->nguoi_xuat ?? 'admin';
    $nhap->ghi_chu = $request->ghi_chu;
    $nhap->noi_dung_xuat = $request->noi_dung_xuat;
    $nhap->save();

    $nhap_id = $nhap->id;
    $masp = $request->input('product_id');
    $quantities = $request->input('quantity');
    $prices = $request->input('price');
    $total_prices = $request->input('total_price');
    $ngaysanxuat = $request->input('ngaysx');
    $ngayhethan = $request->input('hansd');
    $data = [];
    foreach ($masp as $key => $productId) {
        $data[] = [
            'product_id' => $productId,
            'xuat_id' => $nhap_id,
            'price' => $prices[$key],
            'total_price' => $total_prices[$key],
            'quantity' => $quantities[$key],
            'ngaysx' => $ngaysanxuat[$key],
            'hansd' => $ngayhethan[$key],
        ];
    }

    try {
        XuatChitiet::insert($data);
    } catch (\Exception $e) {
        return redirect()->back()->withInput()->withErrors(['error' => 'Lỗi Lưu ' . $e->getMessage()]);
    }

    // Deduct the exported quantities from product inventory
    foreach ($masp as $key => $productId) {
        $product = Product::find($productId);
        if ($product) {
            $product->quantity -= $quantities[$key];
            $product->save();
        }
    }

    return back()->with('success', 'Xuất hàng thành công.');
}

    

    public function taodon($id)
    {
       
        $nhap = Xuat::with('ctNhap')->find($id);

        if ($nhap) {
            
            return view('admin.xuat.donhang', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {
         
            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
    }
}


 