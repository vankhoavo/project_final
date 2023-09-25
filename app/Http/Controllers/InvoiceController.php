<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\CreateInvoiceRequets;
use App\Jobs\BillJob;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function createbill(CreateInvoiceRequets $request)
    {
        $check = Auth::guard('client')->check();
        if ($check) {
            $customer = Auth::guard('client')->user();
            $invoice = Invoice::create([
                // 'invoice_code',  "Chưa có, vì lúc đó đã cho nó nullable rồi"
                'recipient_name'    => $request->recipient_name,
                'buyer_name'      =>  $customer->first_and_last_name,
                'email_name'      =>  $customer->email,
                'receiving_phone_number'    => $request->receiving_phone_number,
                'receiving_address'    => $request->receiving_address,
                // 'payment',       vì cho default = 0
                // 'total_money',   lúc ni chưa biết hoá đơn mấy tiền
            ]);

            // Khúc ni là đã có hoá đơn rồi nè.
            // ta sẽ lấy giỏ hàng (is_invoice = 0) của user đang login
            $cart = InvoiceDetails::where('is_invoice', 0)->where('id_customer', $customer->id)->get();
            $product = InvoiceDetails::join('products', 'invoice_details.id_product', 'products.id')
                ->select('invoice_details.*', 'products.product_name', 'products.picture')
                ->get();

            $totalmoneyinvoice = 0;
            foreach ($cart as $key => $value) {
                $value->is_invoice = 1;
                $value->id_invoice = $invoice->id;
                $value->save();
                $totalmoneyinvoice = $totalmoneyinvoice + $value->into_money;
            }
            $invoice->total_money = $totalmoneyinvoice;
            $randomNumbers = implode('', array_map(fn () => random_int(0, 9), range(1, 10)));
            $invoice->invoice_code = 'CASTRO' . $randomNumbers;
            $invoice->save();


            $data['invoice_code'] = $invoice->invoice_code;
            $data['buy_date'] = Carbon::now();
            $data['email'] = $customer->email;
            $data['recipient_name'] = $invoice->recipient_name;
            $data['receiving_phone_number'] = $invoice->receiving_phone_number;
            $data['receiving_address'] = $invoice->receiving_address;

            // $data['total_money'] = $invoice->total_money;

            BillJob::dispatch($customer->email, 'Order Confirmation', $data, 'mail.billmail');

            return response()->json([
                'status'    => true,
                'mess'      => "Invoice created successfully!",
            ]);
        } else {
            return response()->json([
                'status'    => 1,
                'mess'      => "Please log in first.",
            ]);
        }
    }
}
