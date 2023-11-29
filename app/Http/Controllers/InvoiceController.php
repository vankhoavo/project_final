<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\CreateInvoiceRequets;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function createbill(CreateInvoiceRequets $request)
    {
        $check = Auth::guard('client')->check();
        if ($check) {
            $customer = Auth::guard('client')->user();
            $invoice = Invoice::create([
                // 'invoice_code',  "Chưa có, vì lúc đó đã cho nó nullable rồi"
                'recipient_name' => $request->recipient_name,
                'buyer_name' => $customer->first_and_last_name,
                'email_name' => $customer->email,
                'receiving_phone_number' => $request->receiving_phone_number,
                'receiving_address' => $request->receiving_address,
                // 'payment',       vì cho default = 0
                // 'total_money',   lúc ni chưa biết hoá đơn mấy tiền
            ]);

            // Khúc ni là đã có hoá đơn rồi nè.
            // ta sẽ lấy giỏ hàng (is_invoice = 0) của user đang login
            $cart = InvoiceDetails::where('is_invoice', 0)->where('id_customer', $customer->id)->get();

            if (count($cart) <= 0) {
                $invoice->delete();
                return response()->json(['status' => 0, 'mess' => 'The shopping cart is empty!']);
            }

            $totalmoneyinvoice = 0;
            foreach ($cart as $key => $value) {
                $value->is_invoice = 1;
                $value->id_invoice = $invoice->id;
                $value->save();
                $totalmoneyinvoice = $totalmoneyinvoice + $value->into_money;
            }

            $invoice->total_money = $totalmoneyinvoice;
            $invoice->invoice_code = 'CASTRO' . implode('', array_map(fn() => random_int(0, 9), range(1, 10)));;
            $invoice->save();

            return response()->json([
                'status' => true,
                'id' => $invoice->id,
                'mess' => "Invoice created successfully!",
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'mess' => "Please log in first.",
            ]);
        }
    }

    public function myinvoice()
    {
        return view('client.page.myinvoice');
    }

    public function getdata()
    {
        $check = Auth::guard('client')->check();
        if ($check) {
            $customer = Auth::guard('client')->user();
            $invoice = Invoice::where('email_name', $customer->email)
                ->get();
            return response()->json([
                'dataleft' => $invoice,
            ]);
        }
    }

    public function getdatamodal($id)
    {
        $check = Auth::guard('client')->user();

        if ($check) {

            $result = InvoiceDetails::join('products', 'invoice_details.id_product', 'products.id')
                ->join('invoices', 'invoices.id', 'invoice_details.id_invoice')
                ->select('invoice_details.*', 'invoices.*', 'products.product_name')
                ->where('id_invoice', $id)
                ->get();

            return response()->json([
                'datamodal' => $result,
            ]);
        }
    }

    public function see_order()
    {
        return view('admin.pages.order.index');
    }
}
