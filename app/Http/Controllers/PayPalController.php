<?php

namespace App\Http\Controllers;

use App\Jobs\sendMailJob;
use App\Models\Invoice;
use App\Models\InvoiceDetails;
use Illuminate\Http\Request;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

class PayPalController extends Controller
{
    public function createTransaction(Request $request)
    {
        if ($request->status) {
            $invoice = Invoice::where('id', $request->id_invoice)->first();
            if ($invoice) {
                $invoice->total_money = $request->price;
                $invoice->payment = 1;
                $invoice->save();

                $data['carts'] = InvoiceDetails::where('is_invoice', 1)->where('id_invoice', $request->id_invoice)
                    ->join('products', 'invoice_details.id_product', 'products.id')
                    ->select("invoice_details.*", "products.picture", "products.product_name")
                    ->get();
                $data['invoice_code'] = $invoice->invoice_code;
                $data['email_name'] = $invoice->email_name;
                $data['buyer_name'] = $invoice->buyer_name;
                $data['receiving_phone_number'] = $invoice->receiving_phone_number;
                $data['receiving_address'] = $invoice->receiving_address;
                $data['updated_at'] = $invoice->updated_at;
                $data['link'] = env('APP_URL') . "/myinvoice";
                $data['total_money'] = $invoice->total_money;
                sendMailJob::dispatch($invoice->email_name, 'Thank you for purchasing our products. This is your order confirmation message.', $data, 'mail.billmail');
                return view("client.page.view-success");
            }
        }
        return view("client.page.view-cancel");
    }

    public function processTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction', ['id_invoice' => $request->id_invoice, 'price' => $request->price]),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $request->price
                    ]
                ]
            ]
        ]);
        // dd($response);
        // <>
        if (isset($response['id']) && $response['id'] != null) {

            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    // return redirect()->away($links['href']);
                    return response()->json([
                        'status' => true,
                        'link' => $links['href'],
                    ]);
                }
            }

            return redirect()
                ->route('createTransaction', ['status' => 0]);
        } else {
            return redirect()
                ->route('createTransaction', ['status' => 0]);
        }
    }

    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();

        $response = $provider->capturePaymentOrder($request['token']);
        // dd($response);

        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
            return redirect()
                ->route('createTransaction', ['status' => 1, 'price' => $request->price, 'id_invoice' => $request->id_invoice]);
        } else {
            return redirect()
                ->route('createTransaction', ['status' => 0]);
        }
    }

    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction', ['status' => 0]);
    }
}
