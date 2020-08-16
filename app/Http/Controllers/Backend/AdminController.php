<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;

class AdminController extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            // doanh thu ngày
            $moneyDay = Order::whereDay('updated_at', date('d'))
            ->where('status', Order::STATIC_DONE)
            ->sum('total');

// doanh thu tuần
            $dayAgo = 6;
            $dayToCheck = \Carbon\Carbon::now()->subDays($dayAgo);
            $timeNow = \Carbon\Carbon::now();
            $moneyWeek = Order::whereBetween('updated_at',[$dayToCheck,$timeNow])
            ->where('status', Order::STATIC_DONE)
            ->sum('total');

// doanh thu tháng
            $moneyMonth = Order::whereMonth('updated_at', date('m'))
            ->where('status', Order::STATIC_DONE)
            ->sum('total');
// doanh thu năm
            $moneyYear = Order::whereYear('updated_at', date('Y'))
            ->where('status', Order::STATIC_DONE)
            ->sum('total');
            $dataMoney = [
                [
                    'name' =>  "Ngày",
                    'y' =>  (int)$moneyDay,
                ],
                [
                    'name' =>  "Tuần",
                    'y' =>  (int)$moneyWeek,
                ],
                [
                  'name' =>  "Tháng",
                  'y' =>  (int)$moneyMonth,
              ],
              [
                  'name' =>  "Năm",
                  'y' =>  (int)$moneyYear,
              ]
          ];
          $viewData = [
            'dataMoney' => json_encode($dataMoney)
        ];
        return view('backend.index',$viewData);
    }
    else{
        return view('backend.login');
    }

}
}
