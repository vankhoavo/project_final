<?php

namespace App\Http\Controllers;

use App\Http\Requests\invoice\DeleteCartRequest;
use App\Models\Customer;
use App\Models\InvoiceDetails;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoiceDetailController extends Controller
{
    public function addtocart(Request $request)
    {
        $product = Product::where('id', $request->id_product)->first();
        $customer = Auth::guard('client')->user();
        if ($product && $customer) {
            $check = InvoiceDetails::where('is_invoice', 0)
                ->where('id_customer', $customer->id)
                ->where('id_product', $request->id_product)
                ->first();
            if ($check) {
                $check->quantity = $check->quantity + 1;
                $check->into_money = $check->unit_price * $check->quantity;
                $check->save();
            } else {
                $price = $product->price_discount != null ? $product->price_discount : $product->price_sell;
                InvoiceDetails::create([
                    'id_product'    => $request->id_product,
                    'id_customer'   => $customer->id,
                    'unit_price'    => $price,
                    'quantity'      => 1,
                    'into_money'    => $price * 1,
                ]);
            }
            return response()->json([
                'status'    => true,
                'mess'  => "Product invoice added successfully!",
            ]);
        } else {
            return response()->json([
                'status'    => 1,
                'mess'  => "The product does not exist or the customer is not logged in!",
            ]);
        }
    }

    public function data(Request $request)
    {
        $check = Auth::guard('client')->user();
        if ($check) {
            $customer = Auth::guard('client')->user();
            $invoicedetail = InvoiceDetails::join('products', 'invoice_details.id_product', 'products.id')
                ->where('is_invoice', 0)
                ->where('id_customer', $customer->id)
                ->select('invoice_details.*', 'products.picture', 'products.product_name', 'products.price_sell')
                ->get();
        }
        $total = $invoicedetail->sum('into_money');
        return response()->json([
            'data'  => $invoicedetail,
            'totaldetailmoney'    => $total,
        ]);
    }

    public function updatecard(Request $request)
    {
        $check = Auth::guard('client')->check();
        if ($check) {
            $customer = Auth::guard('client')->user();
            $invoicedetail = InvoiceDetails::where('id', $request->id)->where('id_customer', $customer->id)->first();
            if ($invoicedetail) {
                $invoicedetail->quantity = $request->quantity;
                $invoicedetail->into_money = $invoicedetail->quantity * $invoicedetail->unit_price;
                $invoicedetail->save();
                return response()->json([
                    'status'  =>   true,
                ]);
            }
        }
    }

    public function addtocartByQuantity(Request $request)
    {
        $product = Product::where('id', $request->id_product)->first();
        $customer = Auth::guard('client')->user();
        if ($product && $customer) {
            $check = InvoiceDetails::where('is_invoice', 0)
                ->where('id_customer', $customer->id)
                ->where('id_product', $request->id_product)
                ->first();
            if ($check) {
                $check->quantity = $check->quantity + $request->quantity;
                $check->into_money = $check->unit_price * $check->quantity;
                $check->save();
            } else {
                $price = $product->price_discount != null ? $product->price_discount : $product->price_sell;
                InvoiceDetails::create([
                    'id_product'    => $request->id_product,
                    'id_customer'   => $customer->id,
                    'unit_price'    => $price,
                    'quantity'      => $request->quantity,
                    'into_money'    => $price * 1,
                ]);
            }
            return response()->json([
                'status'    => true,
                'mess'  => "Product invoice added successfully!",
            ]);
        } else {
            return response()->json([
                'status'    => 1,
                'mess'  => "The product does not exist or the customer is not logged in!",
            ]);
        }
    }

    public function deleteCart(DeleteCartRequest $request)
    {
        $check = Auth::guard('client')->check();
        if($check) {
            $customer = Auth::guard('client')->user();
            InvoiceDetails::where('is_invoice', $request->is_invoice)
                ->where('id_customer', $customer->id) // thằng đang login yêu cầu xóa của nó
//                ->where('is_invoice', 0)   // nó là giỏ hàng
                ->first()
                ->delete();
            return response()->json(['status' => 1, 'mess' => 'Đã cập nhật giỏ hàng thành công!']);
        }
    }
}
