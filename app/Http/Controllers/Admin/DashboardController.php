<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infor;
use App\Models\Invoice;
use App\Models\Category;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index() {
        $products = Product::all();
        $count = $products->count();
        return view('admin.index',compact('count', 'products'));
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