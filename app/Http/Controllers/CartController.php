<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Cart;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, $id){
        $product = Product::select('id', 'pro_name', 'pro_image', 'pro_price', 'pro_sale', 'pro_amount')->find($id);
        if(!$product) return redirect('/');

        if ($product -> pro_sale > 0) {
            $price = $product -> pro_price*(100-$product-> pro_sale)/100;
        }
        else {
            $price = $product -> pro_price;
        }
        if ($product -> pro_amount == 0) {
            return redirect() -> back()-> with(['flash_level' => 'danger', 'flash_message' => 'Xin Lỗi Bạn! Sản Phẩm Này Của Chúng Tôi Tạm Hết Hàng']);
        }

        \Cart::add([
            'id'=> $id, 
            'name' => $product-> pro_name,
            'qty' => 1,
            'price' => $price,
            'options' => ['avatar' => $product -> pro_image, 'sale' => $product ->pro_sale, 'price_old' => $product ->pro_price]
        ]   );
        $content = Cart::content();
        return redirect()->back()-> with(['thongbao' => 'Mua Hàng Thành Công! Click Vô Đây Để Đến ->  <a href="/shopping/list" title="">Giỏ Hàng</a> ']);;
    }


    public function listProduct(){
        $content = Cart::content();
        $total = Cart::subTotal(0, ',', '.');
        $viewData = [
            'content' => $content,
            'total' => $total
        ];
        return view('frontend.cart', $viewData);
    }


    public function getFormPay(){
        $content = Cart::content();
        return view('frontend.checkout', compact('content'));
    }

    //    Lưu Thông Tin Thanh Toán
    
    public function saveInfoCart(Request $request){
        $totalMoney = str_replace(',', '', \Cart::subTotal(0,3));
        $orderId = Order::insertGetId([
            'user_id' => Auth::user()->id,
            'nameguest' => $request -> name,
            'emailguest' => $request -> email,
            'phone' => $request -> phone, 
            'note' => $request -> note,
            'total' =>(int) $totalMoney,
            'address' => $request -> address,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        if ($orderId) {
            $content = \Cart::content();
            foreach ($content as $item) {
                Bill::insert([
                    'order_id' => $orderId,
                    'product_id' => $item -> id,
                    'qty' => $item -> qty,
                    'price_sale' => $item -> price,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now()
                ]);
            }
        }
        \Cart::destroy();
        return redirect('/')->with(['flash_level' => 'success', 'flash_message' => "Thanh Toán Thành Công"]);;
    }

   
}
