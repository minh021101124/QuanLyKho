<?php
namespace App\Imports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\Importable;

class ProductsImport implements ToModel, WithHeadingRow
{
    use Importable;

    public function model(array $row)
    {
        return new Product([
            'name'         => $row['name'],
            'price'        => $row['price'],
            'quantity'     => $row['quantity'],
            'slug'         => $row['slug'],
            'category_id'  => $row['category_id'],
             'image'  => $row['image'],
        ]);
    }
}
