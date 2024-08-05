<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $im = Photo::orderBy('id', 'DESC')->get();
        

        return view('admin.photo',compact('im'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.photo');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'photos' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        try {
            if ($request->hasFile("photos")) {
                $file = $request->file("photos");
                $imageName = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path("images"), $imageName);
                $image = new Photo([
                    "photos" => $imageName,
                ]);
                $image->save();
            }
            return redirect()->route('admin.photo')->with('success', 'Thêm mới thành công');
        } catch (\Exception $e) {
            Log::error('File upload error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Đã xảy ra lỗi, vui lòng thử lại sau.')->withInput();
        }
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
     //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   
    public function update(Request $request,$id)
    {
      //

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
