<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index()
    {
        return view('client.master');
    }

    public function viewlogin()
    {
        return view('client.page.login');
    }

    public function viewregister()
    {
        return view('client.page.register');
    }
}
