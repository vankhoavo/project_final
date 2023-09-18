<?php

namespace App\Http\Controllers;

use App\Http\Requests\warehouse\CheckIDWareHouseRequest;
use App\Http\Requests\warehouse\CreateWareHouseRequest;
use App\Http\Requests\warehouse\DetailWareHouseRequest;
use App\Http\Requests\warehouse\UpdateWareHouseRequest;
use App\Models\Warehouse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class WarehouseController extends Controller
{
    public function index()
    {
        toastr()->success("Welcome to the Warehouse Management page");
        return view('admin.pages.warehouse.warehouse');
    }

    public function searchproduct(Request $request)
    {
        $product = Product::where('product_name', 'like', '%' . $request->product_name . '%')->get();
        return response()->json([
            'findname'  =>  $product,
        ]);
    }

    public function store(CreateWareHouseRequest $request)
    {
        $product = Product::where('id', $request->id)->first();
        $warehouse = Warehouse::where('id_product', $request->id)->where('is_warehouse', 0)->first();

        if ($warehouse) {
            $warehouse->input_quantity++;
            $warehouse->save();
        } else {
            Warehouse::create([
                'id_product'   => $request->id,
                'product_name'  => $product->product_name,
                'input_quantity' => 1,
            ]);
        }
        return response()->json([
            'status'    => true,
            'mess'      => "Product warehouse has been successfully imported!",
        ]);
    }

    public function getdata()
    {
        //is_warehouse ni là view is_warehouse (right table)
        $warehouse = Warehouse::where('is_warehouse', 0)->get();
        return response()->json([
            'list'  => $warehouse,
        ]);
    }

    public function update(UpdateWareHouseRequest $request)
    {
        $warehouse = Warehouse::where('id', $request->id)->where('is_warehouse', 0)->first();
        if (isset($request->input_quantity)) {
            $warehouse->input_quantity = $request->input_quantity;
        }
        if (isset($request->input_unit_price)) {
            $warehouse->input_unit_price = $request->input_unit_price;
        }

        $warehouse->save();

        return response()->json([
            'status'    => true,
        ]);
    }

    public function destroy(CheckIDWareHouseRequest $request)
    {
        $warehouse = Warehouse::where('id', $request->id)->where('is_warehouse', 0)->first();
        $warehouse->delete();
        return response()->json([
            'status'    => true,
            'mess'      => "Product removed from inventory successfully!",
        ]);
    }

    public function storewarehouse()
    {
        $importtimes = Warehouse::max('entry_warehouse');

        if ($importtimes) {
            $importtimes = $importtimes + 1;
        } else {
            $importtimes = 1;
        }

        $listwarehouse = Warehouse::where('is_warehouse', 0)->get();

        foreach ($listwarehouse as $key => $value) {
            $value->entry_warehouse = $importtimes;
            $value->is_warehouse = 1;
            $product = Product::where('id', $value->id_product)->first();
            if ($product) {
                $product->quantity += $value->input_quantity;
                $product->save();

                $value->product_name = $product->product_name;
                $value->save();
            } else {
                $value->delete();
            }
        }

        return response()->json([
            'status'    => true,
            'mess'      => "Warehouse imported successfully!",
        ]);
    }

    public function listwarehouse()
    {
        toastr()->success("Welcome to the Product Inventory Detailed List Management page!");
        $times = Warehouse::select('entry_warehouse', DB::raw('DATE_FORMAT(created_at, "%d-%m-%Y") as date'))
            ->groupBy('entry_warehouse', 'date')
            ->get();
        return view('admin.pages.warehouse.listwarehouse', compact('times'));
    }

    public function detailwarehouse(DetailWareHouseRequest $request)
    {
        $listwarehouse = Warehouse::where('entry_warehouse', $request->entrywarehouserequest)
            ->where('is_warehouse', 1)
            ->get();

        return response()->json([
            'status'    => true,
            'list'      => $listwarehouse,
            'mess'      => "Inventory data displayed!",
        ]);
    }
}
