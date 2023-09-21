<?php

namespace App\Http\Controllers;

use App\Models\ProductType;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        $producttype = ProductType::get('product_type_name');
        return view('client.page.homepage', compact('producttype'));
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
}
