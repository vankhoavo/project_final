<?php

namespace App\Http\Controllers;

use App\Http\Requests\admin\CreateAdminRequest;
use App\Http\Requests\admin\UpdateAdminRequest;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        toastr()->success("Welcome to the Admin page");
        return view('admin.pages.admin.admin');
    }

    public function create(CreateAdminRequest $request)
    {
        if ($request->rule_id == 1) {
            return response()->json([
                'status' => 0,
                'mess' => "You cannot create an account with Admin Master rights!",
            ]);
        }
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        Admin::create($data);
        return response()->json([
            'status' => true,
            'mess' => "Added admin account successfully!",
        ]);
    }

    public function getdata()
    {
        $admin = Admin::get();
        return response()->json([
            'data' => $admin,
        ]);
    }

    public function changestatus(Request $request)
    {
        $admin = Admin::find($request->id);
        if ($admin) {
            $admin->is_block = !$admin->is_block;
            $admin->save();
            return response()->json([
                'status' => true,
                'mess' => "Status changed successfully! " . $admin->first_and_last_name,
            ]);
        } else {
            return response()->json([
                'status' => 1,
                'mess' => "Cannot change status!",
            ]);
        }
    }

    public function update(UpdateAdminRequest $request)
    {
        $admin = Admin::where('id', $request->id)->first();
        if ($request->rule_id == 1) {
            return response()->json([
                'status' => 0,
                'mess' => "You cannot create an account with Admin Master rights!",
            ]);
        }
        $admin->update($request->all());
        return response()->json([
            'status' => true,
            'mess' => "The admin account has been updated successfully!",
        ]);
    }

    public function viewlogin()
    {
        return view('admin.pages.login.login');
    }

    public function actionlogin(Request $request)
    {
        $data = $request->all();
        $check = Auth::guard('admin')->attempt($data);
        if ($check) {
            return response()->json([
                'status' => true,
                'mess' => "Signed in successfully!",
            ]);
        } else {
            return response()->json([
                'status' => 0,
                'mess' => "Incorrect account or password!",
            ]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        toastr()->success("Logout successfully");
        return redirect('/adminlte/login');

    }

    public function viewUser()
    {
        return view('admin.pages.customer.index');
    }

    public function getdataUser()
    {
        $user = Customer::get();
        return response()->json([
            'data' => $user,
        ]);
    }

    public function destroyUser($id)
    {
        $user = Customer::find($id);
        if ($user) {
            $user->delete();
            return response()->json([
                'status' => true,
            ]);
        }
        return response()->json([
            'status' => false,
        ]);
    }
}
