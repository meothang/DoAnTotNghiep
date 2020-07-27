<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Order;
use App\Models\Bill;
use Carbon\Carbon;
class AdminOrderController extends Controller
{
    // danh sách sản phẩm
    public function getOrderApprove()
    {
        $orders = Order::where('status',1)->paginate(20);
        return view('backend.order.orderApprove',compact('orders'));
        // return view('backend.order.orderApprove');
    }
    public function reset($id)
    {
        $orders = Order::find($id);
        $orders->status = 1;
        $orders->save();
        // App\Models\Orders::where('id', $id)
        //       ->update(['status' => 1]);
        return redirect()->back();
    }
    // danh sách đơn hàng
    public function getOrderNotApprove()
    {
        $orders = Order::where('status',0)->paginate(20);
        return view('backend.order.orderNotApprove',compact('orders'));
    }

    // Kiểm tra và duyệt đợn hàng
    public function actionOrder($action, $id){
      $orders = Order::find($id);  

      if ($action) {
        switch ($action) {
            case 'status':
            $bills= Bill::where('order_id',$id)->get();
            if ($bills) {
                foreach ($bills as $bill) {
                    $product = Product::find($bill -> product_id);
                    $product -> pro_amount = $product -> pro_amount - $bill -> qty;
                    $product -> save();
                }
            }
            $orders -> status = 1;
            $orders -> updated_at = Carbon::now();
            $orders -> save();
            return redirect()->route('admin.get.list.order.not');

            break;
            case 'delete_app':
            if ($orders) {
                $bills = Bill::where('order_id', $id)-> get();
                foreach ($bills as $value) {
                    $bill = Bill::find($value -> id);
                    $bill -> delete();
                }
                $orders -> delete($id);
                return response()-> json(['success' => 'Xóa Thành Công']);

            }
            break;
            
            case 'delete_not':
            if ($orders) {
                $bills = Bill::where('order_id', $id)-> get();
                foreach ($bills as $value) {
                    $bill = Bill::find($value -> id);
                    $bill -> delete();
                }
                $orders -> delete($id);
                return response()-> json(['success' => 'Xóa Thành Công']);
            }
            break;
        }
    }
}


// Chi tiết Đơn hàng
public function showOrderDetail($id)
{
    $orders = Order::find($id);
    $bills = Bill::where('order_id', $id)->get();
    return view('backend.order.orderDetail',['orders' => $orders, 'bills' => $bills]);
}


}
