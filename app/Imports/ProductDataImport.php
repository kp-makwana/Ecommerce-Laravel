<?php

namespace App\Imports;

use App\Models\Product;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithStartRow;


class ProductDataImport implements ToCollection, WithStartRow
{
    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            $product = Product::FindOrFail($row[0]);
            if ($product) {
                $product->purchase_price = $row[3] ?? $product->purchase_price;
                $product->sale_price = $row[5] ?? $product->sale_price;
                $product->quantity = (!empty($row[7])) ? ($product->quantity + $row[7]) : $product->quantity;
                $product->save();
            }
        }
    }

    public function startRow(): int
    {
        return 2;
    }

}
