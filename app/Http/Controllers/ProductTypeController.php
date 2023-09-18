<?php

namespace App\Http\Controllers;

use App\Http\Requests\producttype\CheckIDProductTypeRequest;
use App\Http\Requests\producttype\CheckSlugProductTypeRequest;
use App\Http\Requests\producttype\CreateProductTypeRequest;
use App\Http\Requests\producttype\UpdateProductTypeRequest;
use App\Models\ProductType;

class ProductTypeController extends Controller
{
    public function index()
    {
        toastr()->success("Welcome to the Product Category Management page");
        return view('admin.pages.producttype.producttype');
    }

    public function create(CreateProductTypeRequest $request)
    {
        ProductType::create([
            'product_type_name' =>  $request->product_type_name_new,
            'slug_product_type_name'    =>  $request->slug_product_type_new,
        ]);
        return response()->json([
            'status'    => true,
            'mess'      => "Product type added successfully!",
        ]);
    }

    public function checkslug(CheckSlugProductTypeRequest $request)
    {
        $producttype = ProductType::where('slug_product_type_name', $request->slug)->first();
        if ($producttype) {
            return response()->json([
                'status'    => 0,
                'mess'      => "The product type name already exists!",
            ]);
        } else {
            return response()->json([
                'status'    => true,
                'mess'      => "Name of product type that can be used!",
            ]);
        }
    }

    public function getdata()
    {
        $producttype = ProductType::get();
        return response()->json([
            'data'  => $producttype,
        ]);
    }

    public function destroy(CheckIDProductTypeRequest $request)
    {
        $producttype = ProductType::where('id', $request->id)->first();
        $producttype->delete();
        return response()->json([
            'status'    => true,
            'mess'      => "Product type has been successfully deleted!",
        ]);
    }

    public function getupdate(CheckIDProductTypeRequest $request)
    {
        $producttype = ProductType::where('id', $request->id)->first();
        return response()->json([
            'data'  => $producttype,
        ]);
    }

    public function update(UpdateProductTypeRequest $request)
    {
        $producttype = ProductType::find($request->id_update);
        $producttype->product_type_name = $request->product_type_name_update;
        $producttype->slug_product_type_name = $request->slug_product_type_update;
        $producttype->save();
        return response()->json([
            'status'    => true,
            'mess'      => "Product type updated successfully!",
        ]);
    }
}
