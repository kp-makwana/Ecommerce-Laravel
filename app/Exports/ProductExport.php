<?php

namespace App\Exports;

use App\Models\Product;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;

class ProductExport implements FromCollection, WithHeadings, WithTitle
{
    public function collection(): \Illuminate\Support\Collection
    {
        $products = Product::orderBy('name', 'asc')->get();
        return $products->map(function ($product) {
            return [
                'id'=>$product->id,
                'name'=>$product->name,
                'purchase_price'=>$product->purchase_price,
                'update_purchase_price'=>'',
                'sale_price'=>$product->sale_price,
                'update_sale_price'=>'',
                'quantity'=>$product->quantity,
            ];
        });
    }

    public function title(): string
    {
        return 'Products';
    }

    public function headings(): array
    {
        return [
                'Id',
                'Name',
                'Purchase Price',
                'Update Purchase Price',
                'Sale Price',
                'Update Sale Price',
                'Current Quantity',
                'Add Quantity',
        ];
    }
}
