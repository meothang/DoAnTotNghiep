<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Bill;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    public function getReportMonth()
    {
        $month = '';
        $currentMonth = date("m");   
        $orders = Order::where('status',1)
                        ->whereMonth('created_at', $currentMonth)
                        ->orderBy('created_at','DESC')->paginate(20);

        return view('backend.report.reportMonth', [
            'month'=>$month,
            'orders' => $orders
        ]);
    }

    public function getReportMonthSearch(Request $request)
    {
        $month = $request->month;
        $orders = Order::where('status',1)
                        ->whereMonth('created_at', $month)
                        ->orderBy('created_at','DESC')->paginate(20);

        return view('backend.report.reportMonth', [
            'month'=>$month,
            'orders' => $orders
        ]);
    }


    public function getReportDaySearch(Request $request)
    {
        $date = date('Y-m-d ', strtotime($request->day)); 
        $orders = Order::where('status',1)
                        ->whereDate('created_at',$date)
                        ->orderBy('created_at','DESC')
                        ->paginate(20);

        return view('backend.report.reportDay', [
            'date'=>$date,
            'orders' => $orders
        ]);
    }


    public function getReportDay()
    {   
        $current_day = date("Y-m-d"); 
        $date='';
        $orders = Order::where('status',1)
                        ->whereDate('created_at', $current_day)
                        ->orderBy('created_at','DESC')
                        ->paginate(20);
        return view('backend.report.reportDay',[
            'date'=>$date,
            'orders' => $orders
        ]);
    }
}
