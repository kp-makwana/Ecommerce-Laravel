<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ProductExport;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductController as Product_Controller;
use App\Imports\ProductDataImport;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductRating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{
    public function gridView(Request $request)
    {
        $result = (new Product_Controller)->index($request);
        return view('admin.product.product-grid', ['products' => $result['products'], 'request' => $result['request']]);
    }

    public function listview(Request $request)
    {
        $result = (new Product_Controller)->index($request);
        return view('admin.product.product-list', ['products' => $result['products'], 'request' => $result['request']]);
    }

    public function add(Request $request)
    {
        return view('admin.product.add-product');
    }

    public function save_update(Request $request, $id = null): \Illuminate\Http\RedirectResponse
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
        $upload_files[] = $request->file('upload_file');
        $deleting_img = $request->input('img');

        if (empty($id)) {
            $product = new Product();
        } else {
            $product = Product::findOrFail($id);
        }

        //add product
        $product->name = $product_name;
        $product->purchase_price = $purchase_price;
        $product->sale_price = $sale_price;
        $product->brand_id = $brands;
        $product->category_id = $category;
        $product->product_type_id = $product_type;
        $product->quantity = $quantity;
        $product->description = $description;
        $product->save();
        if ($request->hasFile('upload_file')) {
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
        }

        //Deleting File
        if ($deleting_img) {
            foreach ($deleting_img as $key => $value) {
                ProductImage::find($key)->delete();
                unlink(public_path('/storage/ProductImages/' . $value));
            }
        }

        return redirect()->route('admin.product.productDetail', $product->id);
    }

    public function bulkProductUpload()
    {
        return view('admin.product.bulkProductUpload');
    }

    public function productStockUpdate(Request $request): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'productUpdate' => 'required|mimes:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,application/vnd.ms-excel.sheet.binary.macroEnabled.12,application/vnd.ms-excel,application/vnd.ms-excel.sheet.macroEnabled.12,xlsx,text/csv,text/plain,application/csv,application/json']);
        Excel::import(new ProductDataImport(), $request->file('productUpdate'));
        return redirect()->back();

    }

    public function demoSheetDownload(): \Symfony\Component\HttpFoundation\BinaryFileResponse
    {
        return Excel::download(new ProductExport(), 'product_bulk_upload_demo.xlsx');
    }

    public function delete_product(Request $request): \Illuminate\Http\RedirectResponse
    {
        Product::find($request->input('id'))->delete();
        return redirect()->route('admin.product.listview');
    }

    public function deleted_Product(Request $request)
    {
        $queryBuilder = Product::query();
        $queryBuilder->onlyTrashed();

        $result = (new Product_Controller())->index($request, $queryBuilder);
        return view('admin.product.trashBin', ['products' => $result['products'], 'request' => $result['request']]);
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

    public function show(Request $request, $id)
    {
        $product = Product::with('offers')->where('id', $id)->first();
        $ratings = ProductRating::where('product_id', $id)->paginate(10);
        return view('admin.product.showProduct', ['product' => $product, 'ratings' => $ratings]);

    }

    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.product.editProduct', ['product' => $product]);
    }

    public function offer_add_update(Request $request, $id = null): \Illuminate\Http\RedirectResponse
    {
        #params
        $product_id = $request->input('product_id');
        $offer_name = $request->input('offer_name');
        $offer_price = $request->input('offer_price');
        $percentage = $request->input('percentage');
        $flat_discount = $request->input('flat_discount');
        $description = $request->input('description');
        $status = $request->input('status');
        $start_date = $request->input('start_date');
        $end_date = $request->input('end_date');

        if (empty($id)) {
            $offer = new Offer();
        } else {
            $offer = Offer::findOrFail($id);
        }
        $offer->product_id = $product_id;
        $offer->offer_name = $offer_name;
        $offer->offer_price = $offer_price;
        $offer->percentage = $percentage;

        $offer->flat_discount = $flat_discount;
        $offer->description = $description;
        $offer->status = $status;
        $offer->start_date = $start_date;
        $offer->end_date = $end_date;
        $offer->save();
        return redirect()->back();
    }

    public function delete_offer(Request $request): \Illuminate\Http\RedirectResponse
    {
        $id = $request->input('deleted_id');
        Offer::find($id)->delete();
        return redirect()->back();
    }
}
