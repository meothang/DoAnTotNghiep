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
        $orders = Order::where('status',0)->paginate(4);
        return view('backend.report.reportMonth',compact('orders'));
    }
    public function getReportDay()
    {
        $orders = Order::where('status',0)->paginate(4);
        return view('backend.report.reportDay',compact('orders'));
    }
}
