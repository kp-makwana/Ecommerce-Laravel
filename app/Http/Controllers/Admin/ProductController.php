<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use PDF;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('productImage')->orderBy('id', 'DESC')->get();
        return view('admin.product', ['products' => $products]);
    }

    public function add(Request $request)
    {
        return view('admin.add-product');
    }

    public function save(Request $request)
    {
        #parmas
        $product_name = $request->input('product_name');
        $purchase_price = $request->input('purchase_price');
        $sale_price = $request->input('sale_price');
        $brands = $request->input('brands');
        $category = $request->input('category');
        $product_type = $request->input('product_type');
        $quantity = $request->input('quantity');
        $description = $request->input('description');
        $upload_files = $request->file('upload_file');

        //add product
        $product = new Product;
        $product->name = $product_name;
        $product->purchase_price = $purchase_price;
        $product->sale_price = $sale_price;
        $product->brand_id = $brands;
        $product->category_id = $category;
        $product->product_type_id = $product_type;
        $product->quantity = $quantity;
        $product->description = $description;
        $product->save();

        foreach ($request->file('upload_file') as $file) {
            #resize
            $image_resize = Image::make($file->getRealPath());
            $image_resize->resize(400, 400, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            });
            $rand = $this->generateRandomString();
            $image_name = time() . '_' . $rand . '.' . $file->extension();

            #upload image
            $storagePath = storage_path('app/public/ProductImages/' . $image_name);
            $image_resize->save($storagePath);

            #save data
            $img = new ProductImage;
            $img->product_id = $product->id;
            $img->name = $image_name;
            $img->original_name = $file->getClientOriginalName();
            $img->mime_type = $file->getMimeType();
            $img->size = number_format(File::size($storagePath) / 1000, 2);
            $img->save();
        }

        return redirect()->route('admin.product.index');
    }

    public function pdfCreate()
    {
        $pdf = PDF::loadview('test', ['test' => State::all()]);
        return $pdf->download('1.pdf');
    }

    private function generateRandomString(): string
    {
        $characters = '0123456789abcdefghilkmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < 10; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
