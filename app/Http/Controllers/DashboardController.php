<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Invoice;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function viewDashboard()
    {
        toastr()->success("Welcome to the Dashboard page");
        $end     = Carbon::now();
        $begin   = Carbon::create(date("Y-7-1", strtotime($end)));
        $data    = $this->calculateMoneyByMonth($begin, $end);
        $labels  = [];
        $data_js = [];
        foreach ($data as $key => $value) {
            array_push($labels, $value['month']);
            array_push($data_js, $value['total_money']);
        }
        return view('admin.pages.dashboard.index',compact('begin', 'end', 'labels', 'data_js'));
    }

    public function getTotalUser()
    {
        $data = Customer::select(DB::raw('count(id) as total_user'))->first();
        return response()->json([
            'data' => $data->total_user,
        ]);
    }

    public function getTotalOrder()
    {
        $end = Carbon::now();
        $begin = Carbon::create(date("Y-7-1", strtotime($end)));
        $data = Invoice::whereDate('updated_at', '>=', $begin)
            ->whereDate('updated_at', '<=', $end)
            ->select(DB::raw('count(id) as total_order'))->first();
        return response()->json([
            'data' => $data->total_order,
        ]);
    }

    public function calculateMoneyByMonth($begin, $end)
    {
        $data = Invoice::whereDate('updated_at', '>=', $begin)
            ->whereDate('updated_at', '<=', $end)
            ->select(DB::raw("DATE_FORMAT(updated_at, '%m-%Y') as month"),  DB::raw('sum(total_money) as total_money'))
            ->groupBy('month')
            ->get();
        $arr_month = [];
        $data_new = [];
        foreach ($data as $value) {
            array_push($arr_month, substr($value->month, 0, 2));
            array_push($data_new, ['month' => $value->month, 'total_money' => $value->total_money]);
        }
        for ($i = $begin->month; $i < ($end->month + 1); $i++) {
            if (!in_array($i, $arr_month)) {
                if ($i < 10) {
                    array_push($data_new, ['month' => '0' . ($i) . '-' . $end->year, 'total_money' => 0]);
                } else {
                    array_push($data_new, ['month' => ($i) . '-' . $end->year, 'total_money' => 0]);
                }
            }
        }
        asort($data_new);
        return $data_new;
    }
}
