<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Infor;
use App\Models\Invoice;
use App\Models\Category;


class KhoController extends Controller
{
    
    public function xuat(){
        return view('admin.xuat.index');
    }
    public function nhap(){
        return view('admin.nhap.index');
    }
   
}


 