<?php

namespace App\Http\Controllers;

use App\Http\Requests\customer\ChangePasswordRequest;
use App\Http\Requests\customer\CheckMailResetPasswordRequest;
use App\Http\Requests\customer\CreateRegisterRequest;
use App\Http\Requests\customer\LoginCustomerRequest;
use App\Jobs\sendMailJob;
use App\Models\Customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

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
            DB::commit();

            $data['fullname'] = $request->first_and_last_name;
            $data['link'] = env('APP_URL') . '/active/' . $data['hash_active'];
            // Mail::to($request->email)->send(new RegisterMail(
            //     'Thank you for registering for our castro shop account!',
            //     $data,
            //     'mail.register',
            // ));
            sendMailJob::dispatch($request->email, 'Thank you for registering for our castro shop account!', $data, 'mail.registermail');
            return response()->json([
                'status' => true,
                'mess' => "Successfully registered account! Please email to activate email before log in!",
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

    public function viewforgotpassword()
    {
        return view('client.page.forgotpassword');
    }

    public function actionforgotpassword(CheckMailResetPasswordRequest $request)
    {
        $customer = Customer::where('email', $request->email)->first();
        if ($customer) {
            $customer->hash_reset = Str::uuid();
            $customer->save();

            $data['email'] = $customer->email;
            $data['fullname'] = $customer->first_and_last_name;
            $data['link'] = env('APP_URL') . '/changepassword/' . $customer->hash_reset;

            sendMailJob::dispatch($customer->email, 'Password Recovery', $data, 'mail.forgotpasswordmail');

            return response()->json([
                'status' => true,
                'mess' => "Please enter your email to change your password!",
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'mess' => "Invalid email or never used account registration email!",
            ]);
        }
    }

    public function viewchangepassword($hash)
    {
        $hash_reset = $hash;
        $customer = Customer::where('hash_reset', $hash)->first();

        if ($customer) {
            return view('client.page.changepassword', compact('hash_reset'));
        } else {
            toastr()->error("The password reset link is incorrect. Please try again!");
            return redirect('/forgotpassword');
        }
    }

    public function actionchangepassword(ChangePasswordRequest $request)
    {
        $customer = Customer::where('hash_reset', $request->hash_reset)->first();
        if ($customer) {
            $customer->hash_reset = null;
            $customer->password = bcrypt($request->password);
            $customer->save();
            return response()->json([
                'status' => true,
                'mess' => "Your password has been changed successfully!",
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'mess' => "Your password change information is incorrect or the password does not match. Please re-enter!",
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        toastr()->success("Signed out successfully!");
        return redirect('/');
    }

    public function see_customer()
    {
        return view('admin.pages.customer.index');
    }

    public function getGoogleSignInUrl()
    {
        try {
            $url = Socialite::driver('google')->stateless()
                ->redirect()->getTargetUrl();
            return redirect($url);
        } catch (\Exception $exception) {
            return $exception;
        }
    }

    public function googleCallback(Request $request)
    {
        try {
            $state = $request->input('state');

            parse_str($state, $result);
            $googleUser = Socialite::driver('google')->stateless()->user();
            $finduser = Customer::where('email', $googleUser->email)->first();
            if ($finduser && $finduser->google_id == null) {
                return redirect("/login")->withErrors('Google sign in email existed');
            }
            if ($finduser == null) {
                $finduser = Customer::create([
                    'first_and_last_name' => $googleUser->name,
                    'email' => $googleUser->email,
                    'google_id' => $googleUser->id,
                    'password' => bcrypt('123456dummy'),
                    'hash_active' => Str::uuid(),
                    'ip' => "127.0.0.1",
                    'phone_number' => "0905955162",
                    'is_active' => "1",

                ]);
            }
            // Auth::login($finduser);
            Auth::guard('client')->attempt(['email' => $googleUser->email, 'password' => "123456dummy"]);
            return redirect("/");
        } catch (\Exception $exception) {
            return redirect("/login")->withErrors('Login with google failed');
        }
    }
}
