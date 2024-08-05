<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Xuat;
use Illuminate\Http\Request;

use App\Models\Product;
use App\Models\NhapChitiet;
use Carbon\Carbon;
use App\Models\Nhap;
class DashboardController extends Controller
{
    public function index()
    {
        // session()->flash('message', 'Hello');
        $products = Product::all();
        $count = $products->count();
        $don_nhap = Nhap::all();
        $count_don_nhap= $don_nhap->count();
        $don_xuat= Xuat::all();
        $count_don_xuat= $don_xuat->count();
        $count = $products->count();
        $demtongsp = Product::where('quantity', '>', 0)
            ->where('quantity', '<', 5)
            ->get();

        $demsp_het = Product::where('quantity', '=', 0)->get();

        $count_het = Product::where('quantity', '=', 0)->count();
        $count_het = $demsp_het->count();
        $count_saphet = $demtongsp->count();

       
        

        $soLuongSapHetHan = 0; // Initialize the counter
        $nhapList = NhapChitiet::whereNotNull('hansd')
                               ->orderBy('hansd', 'asc')
                               ->get();
        
        $hsdList = $nhapList->map(function ($item) use (&$soLuongSapHetHan) {
            $ngayHienTai = Carbon::now()->startOfDay(); // Get current date, start of day for consistency
            $ngaysx = Carbon::parse($item->hansd)->startOfDay(); // Parse and set to start of day
        
            // Calculate the difference in days directly
            $hansd = $ngaysx->diffInDays($ngayHienTai, true);
        
            // Ensure that if hansd is negative, we set it to 0
            
            
            // Update hansd with an additional day for display
            $item->hansd = $hansd ;
        
            // Flag for warning if expiration is within 7 days or less
            $item->canhbao = $hansd <= 6;
        
            // Count products nearing expiration
            if ($item->canhbao) {
                $soLuongSapHetHan++;
            }
        
            return $item;
        });




    $nhapList1 = NhapChitiet::whereNotNull('hansd')
    ->orderBy('hansd', 'asc')
    ->get();

$soLuongSapHetHanq = 0;
$hsdList1 = $nhapList1->map(function ($item) use (&$soLuongSapHetHanq) {
    $ngayHienTai1 = Carbon::now()->startOfDay();
    $ngaysx1 = Carbon::parse($item->hansd)->startOfDay();
    $hansd1 = $ngaysx1->diffInDays($ngayHienTai1, true);
    $item->hansd = $hansd1;
    $item->canhbao = $hansd1 <= 6;
    
    // Count products nearing expiration
    if ($item->canhbao) {
        $soLuongSapHetHanq++;
    }

    return $item;
})->filter(function ($item) {
    // Filter to show only items with expiration days <= 6
    return $item->hansd <= 6;
});
        
        $nhapchitiet = NhapChitiet::paginate(5);
        return view('admin.index', compact('count_don_nhap','count_don_xuat','hsdList1','soLuongSapHetHan','hsdList','count', 'products', 'nhapchitiet', 'demtongsp', 'demsp_het', 'count_het', 'count_saphet'));
    }
    
    // public function doc_excel() {
    //     $file = public_path('/files/Data1.csv'); 
    //     $csvdata = file_get_contents($file); 
    //     $rows = array_map("str_getcsv", explode("\n", $csvdata)); 
    //     $header = array_shift($rows); 
    //     return view('admin.index',compact('rows','header')); 
    // }


    // public function docexcel()
    // {
    //    $file = public_path('/public/Data.csv');
    //    $csvdata  = file_get_contents($file);
    //    $rows = array_map("str_getcsv", explode("\n",$csvdata));
    //    $header = array_shift($rows);
    //    dd($rows);
    //     return view('admin.index');
    // }


}


