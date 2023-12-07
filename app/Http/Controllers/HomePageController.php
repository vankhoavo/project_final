<?php

namespace App\Http\Controllers;

use App\Http\Requests\Customer\UpdateProfileRequest;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $producttypefooter = ProductType::get();
        return view('client.page.homepage', compact('producttypefooter'));
    }

    public function getCategory()
    {
        $productype = ProductType::get();
        return response()->json([
            'data' => $productype,
        ]);
    }

    public function getProduct(Request $request)
    {
        $product = Product::where('status', 1);
        if ($request->name != "") {
            $product = $product->where("product_name", "like", "%" . $request->name . "%");
        }
        if ($request->id_category != 0) {
            $product = $product->where("id_product_type", $request->id_category);
        }
        $product = $product->get()->take(20);

        return response()->json([
            'data' => $product,
        ]);
    }

    public function viewlogin()
    {
        return view('client.page.login');
    }

    public function viewregister()
    {
        return view('client.page.register');
    }

    public function shoppage1()
    {
        return view('client.page.shoppage1');
    }

    public function cart()
    {
        return view('client.page.cart');
    }

    public function viewprofile()
    {
        return view('client.page.view-profile');
    }

    public function getUser()
    {
        $user = Auth::guard('client')->user();
        return response()->json([
            'data' => $user,
        ]);
    }

    public function updateviewprofile(UpdateProfileRequest $request)
    {
        $user = Auth::guard('client')->user();
        $data = Customer::find($user->id);
        if ($data) {
            $data->first_and_last_name = $request->first_and_last_name;
            $data->email = $request->email;
            $data->phone_number = $request->phone_number;
            $data->save();
            return response()->json([
                'status' => true,
            ]);
        }
        return response()->json([
            'status' => false,
        ]);
    }
}
