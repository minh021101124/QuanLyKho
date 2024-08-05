<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\NhapChitiet;
use Illuminate\Http\Request;
use App\Imports\CustomerImport;
use Maatwebsite\Excel\Facades\Excel;


class CustomerController extends Controller
{
    public function index()
    {
        $customers = NhapChitiet::all();
        return view('customer.index', compact('customers'));
    }

    public function importExcelData(Request $request)
    {
        // Validate the file input
        $request->validate([
            'import_file' => [
                'required',
                'file',
                'mimes:xlsx,csv', // Ensure the file is either xlsx or csv
                'max:2048' // Optional: Max file size in kilobytes (2MB)
            ],
        ]);
    
        // Import the file using NhapChitietImport
        Excel::import(new CustomerImport, $request->file('import_file'));
    
        // Redirect back with success message
        return redirect()->back()->with('status', 'Imported Successfully');
    }
}