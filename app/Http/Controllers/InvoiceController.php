<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\CreateInvoiceRequets;
use App\Jobs\BillJob;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Js;

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
            // $product1 = InvoiceDetails::join('products', 'invoice_details.id_product', 'products.id')
            // ->select('invoice_details.*', 'products.product_name', 'products.picture','products.quantity')
            // ->get();

            $product1 = DB::table('products')->select('product_name', 'picture')->get();
            $product2 = DB::table('invoice_details')->select('quantity', 'into_money')->get();

            foreach ($product1 as $item) {
                $product_name = $item->product_name;
                $picture = $item->picture;
                // Sử dụng $product_name và $picture theo nhu cầu
            }

            foreach ($product2 as $item) {
                $quantity = $item->quantity;
                $into_money = $item->into_money;
                // Sử dụng $quantity và $into_money theo nhu cầu
            }

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
            $invoice->invoice_code = 'CASTRO' . implode('', array_map(fn () => random_int(0, 9), range(1, 10)));;
            $invoice->save();

            //Gửi Mail
            $data['invoice_code'] = $invoice->invoice_code;
            $data['buy_date'] =  Carbon::now()->subDay()->format('d-m-Y H:i:s');
            $data['recipient_name'] = $invoice->recipient_name;
            $data['receiving_phone_number'] = $invoice->receiving_phone_number;
            $data['receiving_address'] = $invoice->receiving_address;
            $data['totalmoney'] = $invoice->total_money;

            $data['email'] = $customer->email;

            $data['picture'] = $picture;
            $data['product'] = $product_name;
            $data['quantity'] = $quantity;
            $data['intomoney'] = $into_money;

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
