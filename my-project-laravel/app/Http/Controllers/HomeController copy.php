<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public  function index(){
        $featureProducts= Product::all();
        dd($featureProducts);
        return view('fe.home');
    }
}
