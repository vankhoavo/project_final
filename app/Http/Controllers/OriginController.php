<?php

namespace App\Http\Controllers;

use App\Http\Requests\origin\CreateOriginRequest;
use App\Models\Brand;
use App\Models\Origin;
use Illuminate\Http\Request;

class OriginController extends Controller
{
    public function index()
    {
        $brand = Brand::select('id', 'brand_name')->get();
        toastr()->success("Welcome to the Origin Management page");
        return view('admin.pages.origin.origin', compact('brand'));
    }

    public function store(CreateOriginRequest $request)
    {
        Origin::create($request->all());
        return response()->json([
            'status'    => true,
            'mess'      => "New origin successfully added!",
        ]);
    }

    public function getdata()
    {
        $origin = Origin::join('brands', 'brands.id', 'origins.id_brand_name')
            ->select('origins.*', 'brands.brand_name')
            ->get();
        return response()->json([
            'data'  => $origin,
        ]);
    }
}
