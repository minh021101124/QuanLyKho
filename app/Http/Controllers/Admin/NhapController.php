<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Nhap;
use App\Models\NhapChitiet;
use App\Models\Ncc;
use App\Models\Product;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use App\Models\XuatChitiet;

class NhapController extends Controller
{
    
    // public function index($id) {
    //     $nhaps = Nhap::simplePaginate(5);
    //     //    $products = Product::orderBy('id', 'DESC')->get();
    //     $products = Product::all();
    //     $nhap = Nhap::with('ctNhap')->find($id);
    //     return view('admin.nhap.index', compact('nhap','products','nhaps'));
    // }

//     public function show($id)
// {
//     $nhap = Nhap::with('ctNhap')->find($id); // Lấy đơn nhập và các chi tiết nhập hàng liên quan

//     if (!$nhap) {
//         return response()->json(['error' => 'Không tìm thấy đơn nhập'], 404); // Trả về lỗi nếu không tìm thấy đơn nhập
//     }

//     // Trả về đối tượng nhap dưới dạng JSON
//     return response()->json($nhap);
// }
    // public function show($id)
    // {
    //     $nha = Nhap::find($id);
    //     return response()->json( $nha);
    // }
    public function dsnhap() {
        $nhap = Nhap::all();
        $nhapchitiet = NhapChitiet::orderBy('id', 'DESC')->paginate(7);
        $products = Product::all();
        return view('admin.nhap.list', compact('nhap', 'products', 'nhapchitiet'));
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
        $nhacung = $request->input('ncc_id');
        
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
                'ncc_id' => $nhacung[$key],
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
        // dd($data);
        return redirect()->route('nhap.index')->with('success', 'Nhập thành công!');
        // return back()->with('message', 'Nhập hàng thành công.');
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
   
    
    public function nhaphang(){
        $nhap = Nhap::orderBy('id', 'DESC')->paginate(6); 
        //$nhap = Nhap::All(); 
        // $nhap = Nhap::simplePaginate(6);
        $products = Product::all();
        
        return view('admin.nhap.index', compact('nhap','products'));
    }
    public function create()
    {
        $nhap = Nhap::all();
        $nhacungcap= Ncc::all();
        $products = Product::all(); 
        return view('admin.nhap.add', compact('nhap','products','nhacungcap'));
    }
    public function index()
    {        
        $users = Nhap::with('ctNhap')->simplePaginate(5);
       
        return view('users', compact('users'));
    }
     
    public function show($id)
    {
        $user = Nhap::with('ctNhap')->find($id);
       
        return response()->json($user);
    }
    
//     public function exportInvoice(Request $request)
// {
//     $ctNhaps = NhapChitiet::with('product')->get(); // Fetch all invoice details
//     $total = 0;

//     foreach ($ctNhaps as $ctNhap) {
//         $total += $ctNhap->total_price; // Accumulate total
//     }

//     // Prepare data for the invoice
//     $data = [
//         'invoice_number' => 'HD' . mt_rand(1000, 9999),
//         'created_at' => now(),
//         'ctNhaps' => $ctNhaps,
//         'total' => $total,
//     ];

//     // Load the PDF library (Dompdf)
//     $dompdf = new Dompdf();
//     $options = new Options();
//     $options->set('isHtml5ParserEnabled', true);
//     $options->set('isPhpEnabled', true);
//     $dompdf->setOptions($options);

//     // Render the HTML for the invoice
//     $html = view('admin.nhap.in', $data)->render();
//     $dompdf->loadHtml($html);
//     $dompdf->render();

//     // Output the generated PDF (stream or download)
//     return $dompdf->stream('Hoa_don_nhap_kho.pdf');
// }

public function exportInvoice(Request $request)
{
    $ctNhaps = NhapChitiet::with('product')->get(); // Fetch all invoice details
    $total = 0;

    foreach ($ctNhaps as $ctNhap) {
        $total += $ctNhap->total_price; // Accumulate total
    }

    // Prepare data for the invoice
    $data = [
        'invoice_number' => 'HD' . mt_rand(1000, 9999),
        'created_at' => now(),
        'ctNhaps' => $ctNhaps,
        'total' => $total,
    ];

    // Load the PDF library (Dompdf)
    $dompdf = new Dompdf();
    $options = new Options();
    $options->set('isHtml5ParserEnabled', true);
    $options->set('isPhpEnabled', true);
    $dompdf->setOptions($options);

    // Render the HTML for the invoice
    $html = view('admin.nhap.in', $data)->render();
    $dompdf->loadHtml($html);
    $dompdf->render();

    // Output the generated PDF (stream or download)
    return $dompdf->stream('Hoa_don_xuat_kho.pdf');
}
}


 
