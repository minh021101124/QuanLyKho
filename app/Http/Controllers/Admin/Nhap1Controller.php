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
     // $products = Product::orderBy('id', 'DESC')->get();
        $products = Product::all();
        return view('admin.nhap.index', compact('nhap','products'));
    }
    public function dsnhap() {
        $nhap = Nhap::All();
        
        $nhapchitiet = NhapChitiet::All();
      // $products = Product::orderBy('id', 'DESC')->get();
         $products = Product::all();
         return view('admin.nhap.list', compact('nhap','products','nhapchitiet'));
     }
    public function store(Request $request)
    {
        $request->validate([
            'ma_don' => 'required|string|max:255',
            'nguoi_nhap' => 'nullable|string|max:255',
            'ghi_chu' => 'nullable|string',
            'noi_dung_nhap' => 'nullable|string',
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
    
      
        $nhap = new Nhap();
        $nhap->ma_don = $request->ma_don;
        $nhap->nguoi_nhap = $request->nguoi_nhap ?? 'admin';
        $nhap->ghi_chu = $request->ghi_chu;
        $nhap->noi_dung_nhap = $request->noi_dung_nhap;
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
                'nhap_id' => $nhap_id,
                'price' => $prices[$key],
                'total_price' => $total_prices[$key],
                'quantity' => $quantities[$key],
                'ngaysx' => $ngaysanxuat[$key],
                'hansd' => $ngayhethan[$key],
            ];
        }
    
        try {
            NhapChitiet::insert($data);
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => 'Lỗi Lưu ' . $e->getMessage()]);
        }
        foreach ($masp as $key => $productId) {
            $product = Product::find($productId);
            if ($product) {
                $product->quantity += $quantities[$key];
                $product->save();
            }
        }
    
        return redirect()->route('nhap.index')->with('success', 'Nhập hàng thành công.');
    }
    
    
    


//  
public function add($id){
    // $nhap = Nhap::all();
    $products = Product::all();
   $duliu = NhapChitiet::All();
    $mado = Nhap::All();
    return view('admin.nhap.themsp',compact('duliu','mado','products'));
}

public function taodon($id)
    {
       
        $nhap = Nhap::with('ctNhap')->find($id);

        if ($nhap) {
            
            return view('admin.nhap.donhang', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {
         
            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
    }
    public function dshang($id)
    {
       
        $nhap = NhapChitiet::with('ctNhap')->find($id);

        if ($nhap) {
            
            return view('admin.nhap.list', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {
         
            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
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
    
   
}


 