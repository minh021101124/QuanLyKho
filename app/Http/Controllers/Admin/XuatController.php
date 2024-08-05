<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xuat;
use App\Models\XuatChitiet;
use App\Models\NhapChitiet;
use App\Models\Product;
use App\Http\Requests\Xuat\StoreXuatRequest;
use Carbon\Carbon;
use Dompdf\Dompdf;
use Dompdf\Options;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Mpdf\Mpdf;
class XuatController extends Controller
{
    public function index()
    {
        $xuat = Xuat::All();
        //    $products = Product::orderBy('id', 'DESC')->get();
        $products = Product::all();
        return view('admin.xuat.index', compact('xuat', 'products'));
    }
    public function xuathang()
    {
        $xuat = Xuat::all();
        $products = Product::all();
        $product_xuat = Product::where('quantity', '>', 0)->get();

        return view('admin.xuat.index', compact('xuat', 'products','product_xuat'));
    }
    public function barcode()
    {
        $xuat = Xuat::all();
        $products = Product::all();
        return view('admin.xuat.barcode', compact('xuat', 'products'));
    }


    public function create()
    {
        $xuat = Xuat::all(); // Lấy tất cả các dữ liệu từ bảng Xuat
        $products = Product::all(); // Lấy tất cả các sản phẩm từ bảng Product

        // Lấy tất cả giá của từng sản phẩm
        $prices = Product::pluck('price', 'id')->all();
        $sale_prices = Product::pluck('sale_price', 'id')->all();
        $le_prices = Product::pluck('le_price', 'id')->all();
        return view('admin.xuat.add', compact('xuat', 'products', 'prices', 'sale_prices', 'le_prices'));
    }
    public function taodon($id)
    {

        $nhap = Xuat::with('ctNhap')->find($id);

        if ($nhap) {

            return view('admin.xuat.donhang', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {

            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
    }

    public function dsxuat()
    {
        $nhap = Xuat::All();

        $xuatchitiet = XuatChitiet::orderBy('id', 'DESC')->get();
        // $products = Product::orderBy('id', 'DESC')->get();
        $products = Product::all();
        return view('admin.xuat.list', compact('nhap', 'products', 'xuatchitiet'));
    }
    public function dsxuatin($id)
    {
        $nhap = Xuat::with('ctNhap')->find($id); 
        

        if ($nhap) {

            return view('admin.xuat.in', ['nhap' => $nhap, 'ctNhaps' => $nhap->ctNhap]);
        } else {

            return redirect()->back()->with('error', 'Nhập không tồn tại');
        }
       
    }




    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'ma_xuat' => 'required|string|max:255',
            'noi_dung_xuat' => 'nullable|string',
            'ghi_chu' => 'nullable|string',
            'product_id' => 'required|array',
            'product_id.*' => 'required|exists:products,id',
            
            'total_price' => 'required|array',
            'total_price.*' => 'required|numeric',
            'ngaysx' => 'required|array',
            'ngaysx.*' => 'required|date',
            'hansd' => 'required|array',
            'hansd.*' => 'required|date',
        ]);
        //Check if quantity requested is not more than available quantity
        foreach ($request->product_id as $key => $productId) {
            $product = Product::findOrFail($productId);
            $requestedQuantity = $request->quantity[$key];

            if ($requestedQuantity > $product->quantity) {
                return redirect()->back()->withInput()->withErrors(['error' => 'Số lượng xuất của sản phẩm ' . $product->name . ' không được lớn hơn số lượng hiện có (' . $product->quantity . ')']);
            }
        }
        try {
            // Save the export record
            $xuat = new Xuat();
            $xuat->ma_xuat = $request->ma_xuat;
            $xuat->noi_dung_xuat = $request->noi_dung_xuat ?? 'Hóa đơn xuất hàng';
            $xuat->ghi_chu = $request->ghi_chu;
            $xuat->save();

            // Prepare data for the export details
            $xuat_id = $xuat->id;
            $products = $request->input('product_id');
            $quantities = $request->input('quantity');
            $price_types = $request->input('price');
            $total_prices = $request->input('total_price');
            $ngaysx = $request->input('ngaysx');
            $hansd = $request->input('hansd');

            $data = [];
            foreach ($products as $key => $productId) {
                $product = Product::find($productId);
                $priceType = $price_types[$key];
                $price = $product->$priceType; // Get the price based on the selected price type

                $data[] = [
                    'product_id' => $productId,
                    'xuat_id' => $xuat_id,
                    'price' => $price,
                    'total_price' => $total_prices[$key],
                    'quantity' => $quantities[$key],
                    'ngaysx' => $ngaysx[$key],
                    'hansd' => $hansd[$key],
                ];
            }

            // Insert the export details into the database
            XuatChitiet::insert($data);

            // Deduct the exported quantities from product inventory
            foreach ($products as $key => $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $product->quantity -= $quantities[$key];
                    $product->save();
                }
            }
            // dd($data);
            return back()->with('success', 'Xuất thành công.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Lỗi Lưu: ' . $e->getMessage()]);
        }
    }
    // public function store(Request $request)
    // {
       

    //     // Check if quantity requested is not more than available quantity
    //     foreach ($request->product_id as $key => $productId) {
    //         $product = Product::findOrFail($productId);
    //         $requestedQuantity = $request->quantity[$key];

    //         if ($requestedQuantity > $product->quantity) {
    //             return redirect()->back()->withInput()->withErrors(['error' => 'Số lượng xuất của sản phẩm ' . $product->name . ' không được lớn hơn số lượng hiện có (' . $product->quantity . ')']);
    //         }
    //     }

    //     try {
    //         // Save the export record
    //         $xuat = new Xuat();
    //         $xuat->ma_xuat = $request->ma_xuat;
    //         $xuat->noi_dung_xuat = $request->noi_dung_xuat ?? 'Hóa đơn xuất hàng';
    //         $xuat->ghi_chu = $request->ghi_chu;
    //         $xuat->save();

    //         // Prepare data for the export details
    //         $data = [];
    //         foreach ($request->product_id as $key => $productId) {
    //             $product = Product::find($productId);
    //             $priceType = $request->price[$key];
    //             $price = $product->$priceType; // Get the price based on the selected price type

    //             $data[] = [
    //                 'product_id' => $productId,
    //                 'xuat_id' => $xuat->id,
    //                 'price' => $price,
    //                 'total_price' => $request->total_price[$key],
    //                 'quantity' => $request->quantity[$key],
    //                 'ngaysx' => $request->ngaysx[$key],
    //                 'hansd' => $request->hansd[$key],
    //             ];
    //         }

    //         // Insert the export details into the database
    //         XuatChitiet::insert($data);

    //         // Deduct the exported quantities from product inventory
    //         foreach ($request->product_id as $key => $productId) {
    //             $product = Product::find($productId);
    //             if ($product) {
    //                 $product->quantity -= $request->quantity[$key];
    //                 $product->save();
    //             }
    //         }
    //         dd($data);
    //         return back()->with('success', 'Xuất hàng thành công.');
    //     } catch (\Exception $e) {
    //         return back()->withInput()->withErrors(['error' => 'Lỗi Lưu: ' . $e->getMessage()]);
    //     }
    // }



    public function exportInvoice(Request $request)
    {
      
        $ctNhaps = XuatChitiet::with('product')->get(); 
        $total = $ctNhaps->sum('total_price'); 
    
        $data = [
            'ctNhaps' => $ctNhaps,
            'total' => $total,
            'invoice_number' => 'HD' . mt_rand(1000, 9999),
          
          
        ];
    
        
        $dompdf = new Dompdf();
        $options = new Options();
        $options->set('isHtml5ParserEnabled', true);
        $options->set('isPhpEnabled', true);
        $dompdf->setOptions($options);
    
        
        $html = view('admin.xuat.in', $data)->render();
        $dompdf->loadHtml($html);
        $dompdf->render();
    
        
        return $dompdf->stream('Hoa_don_ban_hang.pdf');
    }

    public function export(Request $request)
    {
        $productId = $request->input('product_id');
        $quantityToExport = $request->input('quantity');
        
        // Validate inputs
        if ($quantityToExport <= 0) {
            return response()->json(['error' => 'Invalid quantity'], 400);
        }

        DB::transaction(function() use ($productId, $quantityToExport) {
            $items = Nhapchitiet::where('product_id', $productId)
                ->where('quantity', '>', 0)
                ->orderBy('hansd', 'ASC') // FIFO based on expiration date
                ->orderBy('ngaysx', 'ASC') // FIFO based on production date if expiration dates are the same
                ->get();

            $remainingQuantity = $quantityToExport;

            foreach ($items as $item) {
                if ($remainingQuantity <= 0) break;

                if ($item->quantity <= $remainingQuantity) {
                    // Record transaction
                    $this->createTransaction($productId, $item->quantity);

                    // Update inventory
                    $item->quantity = 0;
                    $item->save();

                    $remainingQuantity -= $item->quantity;
                } else {
                    // Partial quantity
                    $this->createTransaction($productId, $remainingQuantity);

                    // Update inventory
                    $item->quantity -= $remainingQuantity;
                    $item->save();

                    $remainingQuantity = 0;
                }
            }

            if ($remainingQuantity > 0) {
                throw new \Exception('Not enough inventory to fulfill the request');
            }
        });

        return response()->json(['success' => 'Export successful']);
    }

    private function createTransaction($productId, $quantity)
    {
        DB::table('transactions')->insert([
            'product_id' => $productId,
            'quantity' => $quantity,
            'transaction_type' => 'out',
            'transaction_date' => now()->toDateString(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

}


