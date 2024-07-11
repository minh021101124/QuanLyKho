<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Infor;
// use App\Models\Invoice;
// use App\Models\Category;
use App\Models\Kho;
use App\Models\NhapChitiet;
use App\Models\Product;
use Carbon\Carbon;

class KhoController extends Controller
{
    public function index() {
        $kho = Kho::all();
       
        $now = Carbon::now();
        $nhapchitiet = NhapChitiet::paginate(5);

        $products = Product::all();
        $count = $products->count(); 
        
        
      
        
        $demtongton = Product::sum('quantity');
       
        
        


        $demtongsp = Product::All();
        
        $hethan = Kho::whereBetween('hansudung', [$now, $now->copy()->addDays(7)])->get();
        return view('admin.khohang.index', compact('kho', 'hethan','nhapchitiet','demtongsp','demtongton'));
    }
   
    
    public function xuat(){
        return view('admin.xuat.index');
    }
    public function nhap(){
        $kho = Kho::all();

        return view('admin.nhap.index', compact('kho'));
    }
    public function create()
    {
       $nhap = Kho::orderBy('name','ASC')->get();
       
        return view('admin.nhap.add',compact('nhap'));
    }
    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer',
            'type' => 'required|in:nhap,xuat',
            'hansudung' => 'nullable|date',
        ]);

        Kho::create($validatedData);
        return redirect()->route('kho.index')->with('success', 'hoàn thành');
    }
   
}


 