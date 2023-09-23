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
        $productype = ProductType::get()->take(8);
        $product = Product::where('status', 1)->get()->take(12);
        return view('client.page.homepage', compact('product', 'productype'));
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

    public function card()
    {
        return view('client.page.card');
    }
}
