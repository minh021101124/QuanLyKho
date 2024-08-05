<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Ncc;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class NccController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$im = Avatar::orderBy('id', 'DESC')->get();
        $ncc=Ncc::orderBy('id', 'DESC')->get();

        return view('admin.ncc.index',compact('ncc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ncc=Ncc::orderBy('id', 'DESC')->get();
        return view('admin.ncc.add',compact('ncc'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'ten' => 'required|string|max:255',
            'sodt' => 'required|string|max:15',
            'diachi' => 'required|string|max:255',
        ]);

        // Tạo mới đối tượng Ncc và lưu trữ
        $ncc = Ncc::create([
            'ten' => $validatedData['ten'],
            'sodt' => $validatedData['sodt'],
            'diachi' => $validatedData['diachi'],
        ]);

        // Có thể trả về thông báo thành công hoặc chuyển hướng
        return back()->with('success', 'Thêm mới thành công');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ncc = Ncc::findOrFail($id);

        return view('admin.ncc.edit', compact('ncc'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    // Phương thức update
    public function update(Request $request, $id)
    {
        // Xác thực dữ liệu đầu vào
        $validatedData = $request->validate([
            'ten' => 'required|string|max:255',
            'sodt' => 'required|string|max:15',
            'diachi' => 'required|string|max:255',
        ]);

        // Tìm bản ghi theo id
        $ncc = Ncc::findOrFail($id);

        // Cập nhật dữ liệu
        $ncc->update([
            'ten' => $validatedData['ten'],
            'sodt' => $validatedData['sodt'],
            'diachi' => $validatedData['diachi'],
        ]);

        // Chuyển hướng và thông báo thành công
        return redirect()->route('nhacungcap.index')->with('success', 'Đã cập nhật!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
     public function destroy($id)
    {
        // Tìm kiếm và xóa bản ghi
        $ncc = Ncc::findOrFail($id);
        $ncc->delete();

        // Trả về thông báo thành công
        return back()->with('succes', 'Xóa thành công');
    }
    public function deleteimageavt($id){
        $image = Avatar::findOrFail($id);
        if (File::exists("imageavatar/" . $image->avatar)) {
            File::delete("imageavatar/" . $image->avatar);
        }
    
        $image->delete();
    
        return back()->with('success', 'Ảnh đã được xóa thành công');
    }
}
