<?php

namespace App\Http\Controllers;

use App\Http\Requests\brand\CheckIDBrandRequest;
use App\Http\Requests\brand\CheckSlugBrandRequest;
use App\Http\Requests\brand\CreateBrandRequest;
use App\Http\Requests\brand\UpdateBrandRequest;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index()
    {
        toastr()->success("Welcome to the Brand Management page");
        return view('admin.pages.brand.brand');
    }

    public function create(CreateBrandRequest $request)
    {
        Brand::create([
            'brand_name'   => $request->brand_name_new,
            'slug_brand'  => $request->slug_name_new,
        ]);

        return response()->json([
            'status' => true,
            'mess'   => "New brand added successfully!",
        ]);
    }

    public function getdata()
    {
        $brand = Brand::get();
        return response()->json([
            'data'  => $brand,
        ]);
    }

    public function checkslug(CheckSlugBrandRequest $request)
    {
        $brand = Brand::where('slug_brand', $request->slug)->first();
        if ($brand) {
            return response()->json([
                'status'    => 0,
                'mess'      => "The brand name already exists",
            ]);
        } else {
            return response()->json([
                'status'    => true,
                'mess'      => "Brand name may be used",
            ]);
        }
    }

    public function update(UpdateBrandRequest $request)
    {
        $brand = Brand::find($request->id_update);
        $brand->brand_name = $request->brand_name_update;
        $brand->slug_brand = $request->slug_brand_update;
        $brand->save();
        return response()->json([
            'status'    => true,
            'mess'      => "Brand updated successfully!",
        ]);
    }

    public function getupdate(CheckIDBrandRequest $request)
    {
        $brand = Brand::where('id', $request->id)->first();
        return response()->json([
            'data'  => $brand,
        ]);
    }

    public function destroy(CheckIDBrandRequest $request)
    {
        $brand = Brand::where('id', $request->id)->first();
        $brand->delete();

        return response()->json([
            'status'    => true,
            'mess'      => "Brand removed successfully!",
        ]);
    }
}
