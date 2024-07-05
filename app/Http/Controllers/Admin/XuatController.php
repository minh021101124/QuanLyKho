<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Infor;
// use App\Models\Invoice;
// use App\Models\Category;
use App\Models\Nhap;
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
    public function nhaphang(){
        $nhap = Nhap::all();
        $products = Product::all();
        return view('admin.nhap.index', compact('nhap','products'));
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


 