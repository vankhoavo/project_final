<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\CreateInvoiceRequets;
use App\Models\InvoiceDetails;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function viewcheckout()
    {
        return view('client.page.checkout');
    }

    public function getdata()
    {
        $data = InvoiceDetails::join('products', 'invoice_details.id_product', 'products.id')
            ->select('invoice_details.*', 'products.product_name', 'products.picture')
            ->get();
        $total = $data->sum('into_money');
        return response()->json([
            'data'  => $data,
            'totaldetailmoney'    => $total,
        ]);
    }
}
