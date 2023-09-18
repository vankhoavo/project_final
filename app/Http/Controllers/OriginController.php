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
        $brand = Brand::get();
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
        $origin = Origin::get();
        return response()->json([
            'data'  => $origin,
        ]);
    }

    public function edit()
    {
        //
    }

    public function update()
    {
        //
    }

    public function destroy()
    {
        //
    }
}
