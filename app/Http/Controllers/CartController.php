<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Bill;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Cart;
use Mail;
use Carbon\Carbon;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addProduct(Request $request, $id){
      $product = Product::with('categories')->find($id);
      if(!$product) return redirect('/');

      if ($product -> pro_sale > 0) {
        $price = $product -> pro_price*(100-$product-> pro_sale)/100;
      }
      else {
        $price = $product -> pro_price;
      }
      if ($product -> pro_amount == 0) {
        return redirect() -> back()-> with(['flash_level' => 'danger', 'flash_message' => 'Sản phẩm này hiện đang hết hàng']);
      }

      \Cart::add([
        'id'=> $id, 
        'name' => $product-> pro_name,
        'qty' => 1,
        'price' => $price,
        'options' => ['avatar' => $product -> pro_image, 'pro_cate' => $product -> categories -> name ,'sale' => $product ->pro_sale, 'price_old' => $product ->pro_price]
      ]   );
      $content = Cart::content();
      return redirect()->back()-> with(['flash_level' => 'success', 'flash_message' => 'Thêm vào giỏ hàng thành công! Click vào đây để đến <a href="list-cart" title="">Giỏ Hàng</a> ']);;
    }
    // update số lượng sản phẩm trong giỏ hàng
    public function updateProduct(Request $request){
      if ($request -> id ){
        $number = Product::find($request -> id);
      // kiểm tra số lượng sản phẩm
        if ($number -> pro_amount > 0 && $request -> qty <= $number -> pro_amount) {
          \Cart::update($request -> rowId, $request -> qty);
          return redirect()->back()-> with(['flash_level' => 'success', 'flash_message' => 'Cập nhật giỏ hàng thành công.']);
        }
        return redirect()->back()-> with(['flash_level' => 'danger', 'flash_message' => 'Cập nhật giỏ hàng không thành công. Tạm hết hàng']);
        
      } 
      return redirect()->back()-> with(['flash_level' => 'danger', 'flash_message' => 'Cập nhật giỏ hàng không thành công. Tạm hết hàng']);
    }

    public function listProduct(){
      $content = Cart::content();
      $total = Cart::subTotal(0, ',' , '.');
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
      $url =  route('get.receive.user', ['user_id' => Auth::user() -> id,'order_id' => $orderId ]);
      $email = $request -> email;
      $data =[
        'route' => $url
      ];
      // gửi mail xác nhận giao hàng
      Mail::send('mail.shopping',array('data' => $data['route'], 'name' => $request -> name, 'bills' => $content, 'totalMoney'=> $totalMoney), function ($message) use ($email, $data) {
        $message->to($email, 'User')->subject('Xác Nhận Giao Hàng');
      });
      \Cart::destroy();
      return redirect()->route('admin.frontend')->with(['flash_level' => 'success', 'flash_message' => 'Đặt hàng thành công. Vui lòng vào mail xác nhận đã giao hàng ->  <a target="_blank" href="https://mail.google.com/" title="">Gmail</a> ']);
    }
    // check giao giao thanh công
    public function verifyOrderReceive(Request $request){
      if ($request -> user_id) {
        $user_id = $request -> user_id;
        $orderId = $request -> order_id;
        $checkUser = Order::where(['user_id' => $user_id, 'id' => $orderId])-> first();
        if ($checkUser -> status == 0) {
         return redirect()->route('admin.frontend')->with(['flash_level' => 'danger', 'flash_message' => 'Đơn Hàng Của Bạn Đang Được Duyệt. Vui Lòng Đợi Rồi Xác Nhận Lại.']);
       }
       elseif (!$checkUser) {
        return redirect()->route('admin.frontend')->with(['flash_level' => 'danger', 'flash_message' => 'Xác Nhận Giao Hàng Không Thành Công. Cảm Ơn Bạn.']);
      }
      else {
        $checkUser -> receive = 1;
        $checkUser ->save();
        return redirect()->route('admin.frontend')->with(['flash_level' => 'success', 'flash_message' => 'Bạn Đã Xác Nhận Giao Hàng Thành Công. Cảm Ơn Bạn.']);
      }
      
    }
  }
  public function deleteProduct($id){
    Cart::remove($id);
      return redirect()->back()-> with(['flash_level' => 'success', 'flash_message' => 'Xóa sản phẩm trong giỏ hàng thành công.']);
  }


}
