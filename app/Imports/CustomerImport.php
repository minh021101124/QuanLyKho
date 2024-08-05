<?php

namespace App\Imports;

use App\Models\Customer;
use App\Models\NhapChitiet;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Carbon\Carbon;

class CustomerImport implements ToCollection, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
  
    public function collection(Collection $rows)
    {
        // Skip the first row if it contains column headings
        $rows->shift();

        foreach ($rows as $row)
        {
            // Ensure required data is present
            if (!isset($row[0], $row[1], $row[2], $row[3], $row[4], $row[5], $row[6])) {
                continue;
            }

            // Prepare data array
            $data = [
                'product_id' => $row[0],
                'nhap_id' => $row[1],
                'price' => $row[2],
                'total_price' => $row[3],
                'quantity' => $row[4],
                'ngaysx' => Carbon::parse($row[5]),
                'hansd' => Carbon::parse($row[6])
            ];

            // Insert or update the record
            NhapChitiet::updateOrCreate(
                [
                    'product_id' => $row[0],
                    'nhap_id' => $row[1]
                ],
                $data
            );
        }
    }

    // public function collection(Collection $rows)
    // {foreach ($rows as $row) {
    //     if ( !isset($row['name'])) {
    //         // Skip rows that do not have the required data
    //         continue;
    //     }
    
    //     $customer = Product::where('name', $row['name'])->first();
    //     if ($customer) {
    //         $customer->update([
                
    //             'product_id' => $row['product_id'] ?? null,
    //             'nhap_id' => $row['nhap_id'] ?? null,
    //             'price' => $row['price'] ?? null,
    //             'total_price' => $row['total_price'] ?? null,
    //             'quantity' => $row['quantity'] ?? null,
    //             'ngaysx' => $row['ngaysx'] ?? null,
    //             'hansd' => $row['hansd'] ?? null,
    //         ]);
    //     } else {
    //         Customer::create([
    //             'name' => $row['name'],
                
    //             // Add other attributes if necessary
    //             'product_id' => $row['product_id'] ?? null,
    //             'nhap_id' => $row['nhap_id'] ?? null,
    //             'price' => $row['price'] ?? null,
    //             'total_price' => $row['total_price'] ?? null,
    //             'quantity' => $row['quantity'] ?? null,
    //             'ngaysx' => $row['ngaysx'] ?? null,
    //             'hansd' => $row['hansd'] ?? null,
    //         ]);
    //     }
    // }
    
    // }
    
}