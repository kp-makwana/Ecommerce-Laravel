<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Offer;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductRating;
use App\Models\State;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use PDF;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        #params
        $request = $request->all();

        // Default
        $queryBuilder = Product::with('productImage', 'category', 'brand');

        // Filter
        if (isset($request['category'])) {                  //category
            $queryBuilder->where('category_id', '=', $request['category']);
        }

        if (isset($request['brands'])) {   //brand sorting
            $queryBuilder->where('brand_id', '=', $request['brands']);
        }

        if (isset($request['rating'])) {          //rating sorting
            if ($request['rating'] == 'none') {
                $queryBuilder->where('avg_rating', '=', null);
            } else {
                $queryBuilder->where('avg_rating', '>=', $request['rating']);
            }
        }

        //Searching
        if (isset($request['search'])) {
            $query = $request['search'];

            if (ctype_digit($query)) {
                $queryBuilder->where('purchase_price', '=', $query)
                    ->orWhere('sale_price', '=', $query);
            } else {
                $queryBuilder->where('name', 'LIKE', '%' . $query . '%')
                    ->orWhereHas('category', function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    })
                    ->orWhereHas('brand', function ($q) use ($query) {
                        $q->where('name', 'LIKE', '%' . $query . '%');
                    });
            }
        }

        // Sorting
        if (isset($request['sorting'])) {
            if (in_array($request['sorting'], config('constants.orderBy'))) {    //orderBy
                if (isset($request['rating'])) {
                    $queryBuilder->orderBy('products.avg_rating', $request['sorting']);
                } else {
                    $queryBuilder->orderBy('products.id', $request['sorting']);
                }
            }

        } else {
            $queryBuilder->orderBy('products.id', 'desc');
        }

        // pagination
        if (isset($request['no_of_record'])) {
            if (in_array($request['no_of_record'], config('constants.num_of_raw'))) {
                $products = $queryBuilder->paginate($request['no_of_record']);
            } else {
                $products = $queryBuilder->paginate(10);
            }
        } else {
            $products = $queryBuilder->paginate(10);
        }
        return view('admin.product.product', ['products' => $products, 'request' => $request]);
    }

    public function add(Request $request)
    {
        return view('admin.product.add-product');
    }

    public function save(Request $request): \Illuminate\Http\RedirectResponse
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

    public function pdfCreate()
    {
        $pdf = PDF::loadview('test', ['test' => State::all()]);
        return $pdf->download('1.pdf');
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
        $ratings = ProductRating::where('product_id', $id)->paginate(10);
        return view('admin.product.editProduct', ['product' => $product, 'ratings' => $ratings]);
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

}
