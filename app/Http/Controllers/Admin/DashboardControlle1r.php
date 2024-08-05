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
use App\Models\Nhap;
class DashboardController extends Controller
{
    public function index()
    {
        $products = Product::all();
        $count = $products->count();
        $demtongsp = Product::where('quantity', '>', 0)
            ->where('quantity', '<', 5)
            ->get();

        $demsp_het = Product::where('quantity', '=', 0)->get();

        $count_het = Product::where('quantity', '=', 0)->count();
        $count_het = $demsp_het->count();
        $count_saphet = $demtongsp->count();

       
        $nhapList = NhapChitiet::whereNotNull('hansd')
                       ->orderBy('hansd', 'asc')
                       ->get();


        $hsdList = $nhapList->map(function ($item) use (&$soLuongSapHetHan) {
            $ngayHienTai = Carbon::now();
            $ngaysx = Carbon::parse($item->hansd);
            $hansd = $ngaysx->diffInDays($ngayHienTai);
            
            // Thêm 1 ngày để tính toán chính xác
            $item->hansd = $hansd + 1;

            // Cảnh báo nếu còn 7 ngày hoặc ít hơn
            $item->canhbao = $hansd <= 6;

            // Đếm sản phẩm sắp hết hạn
            if ($item->canhbao) {
                $soLuongSapHetHan++;
            }

            return $item;
        });




        $nhapList1 = NhapChitiet::whereNotNull('hansd')
        ->orderBy('hansd', 'asc')
        ->get();

                    // Initialize the variable to count the products nearing expiry
                    $soLuongSapHetHan = 0;

                    // Map and filter the list
                    $hsdList1 = $nhapList1->map(function ($item) use (&$soLuongSapHetHan) {
                    $ngayHienTai1 = Carbon::now();
                    $ngaysx1 = Carbon::parse($item->hansd);
                    $hansd1 = $ngaysx1->diffInDays($ngayHienTai1);

                    // Thêm 1 ngày để tính toán chính xác
                    $item->hansd = $hansd1 + 1;

                    // Cảnh báo nếu còn 7 ngày hoặc ít hơn
                    $item->canhbao = $hansd1 <= 6;

                    // Đếm sản phẩm sắp hết hạn
                    if ($item->canhbao) {
                    $soLuongSapHetHan++;
                    }

                    return $item;
                    })->filter(function ($item) {
                    // Filter to include only those with 'hansd' <= 6 days
                    return $item->canhbao;
                    });
        
        $nhapchitiet = NhapChitiet::paginate(5);
        return view('admin.index', compact('hsdList1','soLuongSapHetHan','hsdList','count', 'products', 'nhapchitiet', 'demtongsp', 'demsp_het', 'count_het', 'count_saphet'));
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


