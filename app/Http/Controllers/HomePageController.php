<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('client.page.homepage');
    }

    public function getCategory()
    {
        $productype = ProductType::get();
        return response()->json([
            'data'    => $productype,
        ]);
    }
    public function getProduct(Request $request)
    {
        $product = Product::where('status', 1);
        if($request->name != ""){
            $product = $product->where("product_name","like","%".$request->name."%");
        }
        if($request->id_category != 0){
            $product = $product->where("id_product_type", $request->id_category);
        }
        $product = $product->get()->take(20);

        return response()->json([
            'data'    => $product,
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
}
