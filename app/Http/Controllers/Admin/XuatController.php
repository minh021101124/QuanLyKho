<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Infor;
// use App\Models\Invoice;
// use App\Models\Category;
use App\Models\Xuat;
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
    public function dsxuat(){
        return view('admin.xuat.list');
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


 