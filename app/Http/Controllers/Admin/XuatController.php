<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Xuat;
use App\Models\XuatChitiet;
use App\Models\Product;
use App\Http\Requests\Xuat\StoreXuatRequest;
use Carbon\Carbon;

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
        return view('admin.xuat.index', compact('xuat', 'products'));
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

    public function dsxuat()
    {
        $nhap = Xuat::All();

        $xuatchitiet = XuatChitiet::orderBy('id', 'DESC')->get();
        // $products = Product::orderBy('id', 'DESC')->get();
        $products = Product::all();
        return view('admin.xuat.list', compact('nhap', 'products', 'xuatchitiet'));
    }





    // public function store(StoreXuatRequest $request)
    // {
    //     // Validate the form inputs
    //     $request->validate([
    //         'ma_xuat' => 'required|string|max:255',
    //         'noi_dung_xuat' => 'nullable|string',
    //         'ghi_chu' => 'nullable|string',
    //         'product_id' => 'required|array',
    //         'product_id.*' => 'required|exists:products,id',
    //         'quantity' => 'required|array',
    //         'quantity.*' => 'required|integer|min:1',
    //         'price' => 'required|array',
    //         'price.*' => 'required|in:sale_price,le_price,price',
    //         'total_price' => 'required|array',
    //         'total_price.*' => 'required|numeric',
    //         'ngaysx' => 'required|array',
    //         'ngaysx.*' => 'required|date',
    //         'hansd' => 'required|array',
    //         'hansd.*' => 'required|date',
    //     ]);
    //     //Check if quantity requested is not more than available quantity
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
    //         $xuat_id = $xuat->id;
    //         $products = $request->input('product_id');
    //         $quantities = $request->input('quantity');
    //         $price_types = $request->input('price');
    //         $total_prices = $request->input('total_price');
    //         $ngaysx = $request->input('ngaysx');
    //         $hansd = $request->input('hansd');

    //         $data = [];
    //         foreach ($products as $key => $productId) {
    //             $product = Product::find($productId);
    //             $priceType = $price_types[$key];
    //             $price = $product->$priceType; // Get the price based on the selected price type

    //             $data[] = [
    //                 'product_id' => $productId,
    //                 'xuat_id' => $xuat_id,
    //                 'price' => $price,
    //                 'total_price' => $total_prices[$key],
    //                 'quantity' => $quantities[$key],
    //                 'ngaysx' => $ngaysx[$key],
    //                 'hansd' => $hansd[$key],
    //             ];
    //         }

    //         // Insert the export details into the database
    //         XuatChitiet::insert($data);

    //         // Deduct the exported quantities from product inventory
    //         foreach ($products as $key => $productId) {
    //             $product = Product::find($productId);
    //             if ($product) {
    //                 $product->quantity -= $quantities[$key];
    //                 $product->save();
    //             }
    //         }

    //         return back()->with('success', 'Xuất hàng thành công.');
    //     } catch (\Exception $e) {
    //         return back()->withInput()->withErrors(['error' => 'Lỗi Lưu: ' . $e->getMessage()]);
    //     }
    // }
    public function store(StoreXuatRequest $request)
    {
        // The request has already been validated by StoreXuatRequest

        // Check if quantity requested is not more than available quantity
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
            $data = [];
            foreach ($request->product_id as $key => $productId) {
                $product = Product::find($productId);
                $priceType = $request->price[$key];
                $price = $product->$priceType; // Get the price based on the selected price type

                $data[] = [
                    'product_id' => $productId,
                    'xuat_id' => $xuat->id,
                    'price' => $price,
                    'total_price' => $request->total_price[$key],
                    'quantity' => $request->quantity[$key],
                    'ngaysx' => $request->ngaysx[$key],
                    'hansd' => $request->hansd[$key],
                ];
            }

            // Insert the export details into the database
            XuatChitiet::insert($data);

            // Deduct the exported quantities from product inventory
            foreach ($request->product_id as $key => $productId) {
                $product = Product::find($productId);
                if ($product) {
                    $product->quantity -= $request->quantity[$key];
                    $product->save();
                }
            }

            return back()->with('success', 'Xuất hàng thành công.');
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['error' => 'Lỗi Lưu: ' . $e->getMessage()]);
        }
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


}


