<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\CreateRegisterRequest;
use App\Http\Requests\customer\LoginCustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function actionregister(CreateRegisterRequest $request)
    {
        $data = $request->all();
        $data['hash_active'] = Str::uuid();
        $data['password'] = bcrypt($request->password);
        $data['ip'] = $request->ip();

        Customer::create($data);
        return response()->json([
            'status'    => true,
            'mess'      => "Successfully registered account!",
        ]);
    }

    public function actionlogin(LoginCustomerRequest $request)
    {
        $check = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($check) {
            toastr()->success('Bạn đã login thành công!');
            return redirect('/');
        } else {
            toastr()->error('Incorrect account or password!');
            return redirect()->back();
        }
    }
}
