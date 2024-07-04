<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\Infor;
// use App\Models\Invoice;
// use App\Models\Category;
use App\Models\Kho;
use Carbon\Carbon;

class KhoController extends Controller
{
    public function index() {
        $kho = Kho::all();
         // Lấy các sản phẩm gần hết hạn
         $now = Carbon::now();
         $hethan = Kho::where('hansudung', '<=', $now->addDays(7))
                                      ->where('hansudung', '>=', $now)
                                      ->get();
        return view('admin.nhap.index', compact('kho','hethan'));
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


 