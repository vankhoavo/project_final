<?php

namespace App\Http\Controllers;

use App\Http\Requests\product\CheckIDProductRequest;
use App\Http\Requests\product\CheckSlugProductRequest;
use App\Http\Requests\product\CreateProductRequest;
use App\Http\Requests\product\UpdateProductRequest;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function showdetailproduct($slug)
    {
        $search = strpos($slug, 'post');
        $id = Str::substr($slug, $search + 4);

        $product = Product::join('product_types', 'product_types.id', 'products.id_product_type')
            ->select('products.*', 'product_types.product_type_name')
            ->where('products.id', $id)
            ->get();

        $product2 = Product::get();

        return view('client.page.productdetail', compact('product', 'product2'));
    }

    public function index()
    {
        $producttype = ProductType::get();
        $brand = Brand::get();
        toastr()->success("Welcome to the Product Management page");
        return view('admin.pages.product.product', compact('producttype', 'brand'));
    }

    public function create(CreateProductRequest $request)
    {
        Product::create([
            'product_name'  => $request->product_name_new,
            'slug_product' => $request->slug_product_name_new,
            'picture'  => $request->image_new,
            'short_description'    => $request->short_description_new,
            'detailed_description'    => $request->detailed_description_new,
            'status'    => $request->status_new,
            'price_sell'   => $request->price_sell_new,
            'price_discount'    => $request->price_discount_new,
            'id_product_type'  => $request->product_type_name_new,
            'id_brand'    => $request->brand_name_new,
        ]);

        return response()->json([
            'status'    => true,
            'mess'      => "Product added successfully!",
        ]);
    }

    public function changestatus(CheckIDProductRequest $request)
    {
        $product = Product::where('id', $request->id)->first();
        if ($product->status == 1) {
            $product->status = 0;
        } else {
            $product->status = 1;
        }
        $product->save();
        return response()->json([
            'status'    => true,
            'mess'      => "Status changed successfully!",
        ]);
    }

    public function getdata()
    {
        $product = Product::get();
        return response()->json([
            'data'  => $product,
        ]);
    }

    public function getupdate(CheckIDProductRequest $request)
    {
        $product = Product::where('id', $request->id)->first();
        return response()->json([
            'data'  => $product,
        ]);
    }

    public function update(UpdateProductRequest $request)
    {
        $product = Product::find($request->id_update);
        $product->product_name = $request->product_name_update;
        $product->slug_product = $request->slug_product_name_update;
        $product->picture = $request->image_update;
        $product->short_description = $request->short_description_update;
        $product->detailed_description = $request->detailed_description_update;
        $product->status = $request->status_update;
        $product->price_sell = $request->price_sell_update;
        $product->price_discount = $request->price_discount_update;
        $product->id_product_type = $request->product_type_name_update;
        $product->id_brand = $request->brand_name_update;

        $product->save();

        return response()->json([
            'status'    => true,
            'mess'      => "Product updated successfully!",
        ]);
    }

    public function destroy(CheckIDProductRequest $request)
    {
        $product = Product::where('id', $request->id)->first();
        $product->delete();
        return response()->json([
            'status'    => true,
            'mess'      => "Product deleted successfully!",
        ]);
    }

    public function checkslug(CheckSlugProductRequest $request)
    {
        $product = Product::where('slug_product', $request->slug)->first();
        if ($product) {
            return response()->json([
                'status'    => 0,
                'mess'      => "Product name already exists!",
            ]);
        } else {
            return response()->json([
                'status'    => true,
                'mess'      => "Product name can be used!",
            ]);
        }
    }
}
