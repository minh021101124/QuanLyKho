<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infor;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Product;
use App\Models\NhapChitiet;
use Carbon\Carbon;
class DashboardController extends Controller
{
    public function index() {
        $products = Product::all();
        $count = $products->count();
        $demtongsp = Product::where('quantity', '>', 0)
                            ->where('quantity', '<', 5)
                            ->get();
              
        $demsp_het = Product::where('quantity', '=', 0)->get();

        $count_het = Product::where('quantity', '=', 0)->count();
        $count_het = $demsp_het->count();
        $count_saphet = $demtongsp->count();

       
       
        $nhapchitiet = NhapChitiet::paginate(5);
        return view('admin.index',compact('count', 'products','nhapchitiet','demtongsp','demsp_het','count_het','count_saphet'));
    }
   
    public function statistic() {
        $Tong = Invoice::sum('total_amount');
      $records = Infor::with('invoices')
                ->orderBy('created_at', 'desc')
                ->get();

        return view('admin.statistic.thongke', compact('records', 'Tong'));
    }
   
}


 // public function statistic()
    // {
    //     $Tong = Invoice::sum('total_amount');
    //     $rec = Infor::join('invoices', 'infors.id', '=', 'invoices.id') ->get();
    //     return view('admin.statistic.thongke', compact('rec','Tong'));
    // }