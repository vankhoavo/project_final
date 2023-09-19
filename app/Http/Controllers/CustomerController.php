<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\CreateRegisterRequest;
use App\Http\Requests\customer\LoginCustomerRequest;
use App\Jobs\RegisterJob;
use App\Mail\RegisterMail;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustomerController extends Controller
{
    public function actionregister(CreateRegisterRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $data['hash_active'] = Str::uuid();
            $data['password'] = bcrypt($request->password);
            $data['ip'] = $request->ip();

            Customer::create($data);

            $data['fullname'] = $request->first_and_last_name;
            $data['link'] = env('APP_URL') . '/active/' . $data['hash_active'];
            // Mail::to($request->email)->send(new RegisterMail(
            //     'Thank you for registering for our castro shop account!',
            //     $data,
            //     'mail.register',
            // ));
            RegisterJob::dispatch($request->email, 'Thank you for registering for our castro shop account!', $data, 'mail.register');
            DB::commit();
            return response()->json([
                'status'    => true,
                'mess'      => "Successfully registered account!",
            ]);
        } catch (Exception $e) {
            DB::rollBack();
        }
    }

    public function actionlogin(LoginCustomerRequest $request)
    {
        $login = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($login) {
            $customer = Auth::guard('client')->user();
            if ($customer->is_active) {
                toastr()->success('Logged in successfully!');
                return redirect('/');
            } else {
                toastr()->error('Please confirm email!');
                return redirect()->back();
            }
        } else {
            toastr()->error('Incorrect account or password!');
            return redirect()->back();
        }
    }

    public function active($hash)
    {
        $active = Customer::where('hash_active', $hash)->first();
        if ($active) {
            if ($active->is_active) {
                toastr()->warning('Your account has been previously activated!');
                return redirect('/');
            } else {
                $active->is_active = 1;
                $active->save();
                toastr()->success('Your account has been successfully activated!');
                return redirect('/');
            }
        } else {
            toastr()->error("Link does not exist!");
            return redirect('/login');
        }
    }
}
